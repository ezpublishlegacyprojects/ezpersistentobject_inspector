<?php
/**
 * Script used to parse the eZP documentation for Persistent Objects (i.e. html
 * pages, hand written), Views and Fetches and generate a machine-parseable
 * version of the definition of such things
 *
 * @version $Id$
 * @author G. Giunta
 * @copyright Copyright (C) 2010 G. Giunta
 * @license code licensed under the GNU GPL 2.0: see README
 */

include( 'autoload.php' );

$isQuiet = false;

$cli = eZCLI::instance();
/// @todo get from command line list of item types to do
$script = eZScript::instance( array( 'use-modules' => true, 'use-extensions' => true ));
$script->startup();
$options = $script->getOptions();
$script->initialize();

$todo = array( 'pobjs', 'views', 'fetches' );

$ini = eZINI::instance( 'ezpo_inspector.ini' );
$docroot = $ini->variable( 'GeneralSettings', 'DocRoot' );
$pagesuffix = $ini->variable( 'GeneralSettings', 'PageSuffix' );

if ( in_array( 'pobjs', $todo ) )
{

    // Persistent Objects
    ezPODocScanner::setDocRoot( $docroot['objects'], $pagesuffix );

    // doc parsing phase
    if ( $script->verboseOutputLevel() > 0 )
    {
        $cli->output( "Parsing for PO definitions: " . $docroot['objects'] );
    }
    $descriptions = array();
    foreach( ezPODocScanner::scanIndexPageForClasses() as $obj => $desc )
    {
        $descriptions[$obj] = $desc;
        $descriptions[$obj]['attributes'] = ezPODocScanner::scanPageForClass( $obj );
    }

    // validation phase
    foreach( $descriptions as $obj => $description )
    {
        // load actual class and use its definition() method
        $classname = ezPODocScanner::findClassNameGivenLowerCaseName( $obj );
        if ( !$classname )
        {
            $cli->output( "Actual class could not be loaded for $obj" );
            continue;
        }
        if ( method_exists( $classname, 'definition' ) )
        {
            if ( !$description['persistent'] )
            {
                $cli->output( "Class $obj has description() method but is not declared persistent" );
            }
            $actual = $classname::definition();
            $description['keys'] = $actual['keys'];
        }
        else
        {
            if ( $description['persistent'] )
            {
                $cli->output( "Class $obj has no description() method but is declared persistent" );
            }
            $actual = false;
        }

        foreach( $description['attributes'] as $attr => $desc )
        {
            // checks:

            // non-scalar static attributes
            /*if ( !ezPODocScanner::isscalar( $desc['type'] ) && $desc['static'] )
            {
                $cli->output( "Found a static non scalar attribute: $obj/$attr ({$desc['type']})" );
            }
            // attributes of non-standard types
            if ( !ezPODocScanner::isscalar( $desc['type'] ) && !preg_match( '#^(array|object)#', $desc['type'] ) )
            {
                $cli->output( "Found a non array, non object, non scalar attribute: $obj/$attr ({$desc['type']})" );
            }*/
            // non-scalar attributes whose type is not a known object
            if ( $desc['type'] == 'array' || $desc['type'] == 'object' )
            {
                 $cli->output( "Not found obj type for $obj/$attr ({$desc['desc']})" );
            }

            if ( $description['persistent'] && $actual )
            {
                // check if types are consistent with actual def
                if ( !isset( $actual['fields'][$attr] ) && !isset( $actual['function_attributes'][$attr] ) )
                {
                    $cli->output( "Attribute not found in actual class def for $obj/$attr ({$desc['desc']})" );
                }
                else
                {
                    // do a mnimum checking on type matching. NB: within doc, almost all scalar fields are declared as string...
                    if ( isset( $actual['fields'][$attr] ) && $actual['fields'][$attr]['datatype'] != $desc['type'] && ( $desc['type'] != 'string' || !ezPODocScanner::isscalar( $desc['type'] ) ) )
                    {
                        $cli->output( "Attribute type not matching actual class def for $obj/$attr ({$desc['desc']}) : {$desc['type']} vs {$actual['fields'][$attr]['datatype']}" );
                    }
                }
            }
        }

        // check for attributes not in the docs but in the actual class definition
        if ( $description['persistent'] && $actual )
        {
            foreach( $actual['fields'] as $attr => $desc )
            {
                if ( !isset( $description['attributes'][$attr] ) )
                {
                    $cli->output( "Attribute found in actual class def but not in doc: $obj/$attr. Type: {$desc['datatype']}" );
                    /// @todo add a chance to fixup these types by a known-types array
                    if ( $desc['datatype'] == 'text' )
                    {
                        $desc['datatype'] = 'string';
                    }
                    $description['attributes'][$attr] = array( 'type' => $desc['datatype'], 'static' => true, 'desc' => '' );
                }
            }
            if ( isset( $actual['function_attributes'] ) )
            {
                foreach( $actual['function_attributes'] as $attr => $func )
                {
                    if ( !isset( $description['attributes'][$attr] ) )
                    {
                        $cli->output( "Dynamic attribute found in actual class def but not in doc: $obj/$attr" );
                        /// @todo add a chance to fixup these types too by a known-types array
                        $description['attributes'][$attr] = array( 'type' => 'unknown', 'static' => false, 'desc' => '' );
                    }
                }
            }
        }

        file_put_contents( ezPODocScanner::$storagedir."$obj.php", "<?php\n\$ezpodesc = " . var_export( $description, true ) . ";\n?>" );
    }

    if ( !$isQuiet )
    {
        $cli->output( 'Parsed ' . count( $descriptions ) . ' Persistent Object classes' );
    }

}

if ( in_array( 'fetches', $todo ) )
{

    // Fetches
    if ( $script->verboseOutputLevel() > 0 )
    {
        $cli->output( "Parsing for Fecth Function definitions: " . $docroot['fetches'] );
    }
    ezFetchDocScanner::setDocRoot( $docroot['fetches'], $pagesuffix );

    // doc parsing phase
    $descriptions = array();
    foreach( ezFetchDocScanner::scanIndexPageForModules() as $module => $mdesc )
    {
        foreach( ezFetchDocScanner::scanModulePageForFetches( $module ) as $fetch => $desc )
        {
            $descriptions["$module/$fetch"] = ezFetchDocScanner::scanPageForFetch( $module, $fetch );
            $descriptions["$module/$fetch"]['desc'] = $desc['desc'];
        }
    }

    // validation phase
    foreach( $descriptions as $fetch => $description )
    {
        list( $modulename, $fetch ) = explode( '/', $fetch );

        $module = eZModule::exists( $modulename );
        if ( !( $module instanceof eZModule ) )
        {
            $cli->output( "Documented module $modulename could not be found" );
            continue;
        }
        $functions = eZFunctionHandler::moduleFunctionInfo( $modulename );
        $functions = $functions->FunctionList;
        if ( !array_key_exists( $fetch, $functions ) )
        {
            $cli->output( "Documented fetch function $fetch could not be found in actual module $modulename" );
            continue;
        }

        $paramsdesc = isset( $description['params'] ) ? $description['params'] : array();
        $matched = array();
        foreach( $functions[$fetch]['parameters'] as $realparamdesc )
        {
            // checks:
            $pname = $realparamdesc['name'];
            // param in actual spec but not in docs
            if ( !array_key_exists( $pname, $paramsdesc ) )
            {
                $cli->output( "Parameter found in actual fetch but not in doc: $pname ($modulename/$fetch)" );
                continue;
            }
            // types differ
            if ( !isset( $realparamdesc['type'] ) )
            {
                $cli->output( "Parameter type not matching actual fetch def: $pname ($modulename/$fetch): mismatching types '(unknown)' vs '{$paramsdesc[$pname]['type']}'" );
            }
            else
            if ( preg_replace( '/^bool$/', 'boolean', @$realparamdesc['type'] ) != $paramsdesc[$pname]['type'] )
            {
                $cli->output( "Parameter type not matching actual fetch def: $pname ($modulename/$fetch): mismatching types '{$realparamdesc['type']}' vs '{$paramsdesc[$pname]['type']}'" );
            }
            // required differs
            if ( @$realparamdesc['required'] != $paramsdesc[$pname]['required'] )
            {
                $cli->output( "Parameter obligatoriness not matching actual fetch def: $pname ($modulename/$fetch)" );
            }
            $matched[] = $pname;
        }

        if ( count( $matched ) != count( $paramsdesc ) )
        {
            $missing = array_diff( array_keys( $paramsdesc ), $matched );
            $cli->output( "Parameter(s) found in doc but not in actual fetch: " . implode( $missing, ', ' ) . " ($modulename/$fetch)" );
        }

        if ( !is_dir( ezFetchDocScanner::$storagedir."/$modulename" ) )
        {
            mkdir( ezFetchDocScanner::$storagedir."/$modulename" );
        }
        file_put_contents( ezFetchDocScanner::$storagedir."$modulename/$fetch.php", "<?php\n\$fetchdesc = " . var_export( $description, true ) . ";\n?>" );
    }

    if ( !$isQuiet )
    {
        $cli->output( 'Parsed ' . count( $descriptions ) . ' Fetch definitions' );
    }

}

if ( in_array( 'views', $todo ) )
{

    ezViewDocScanner::setDocRoot( $docroot['fetches'], $pagesuffix );

    // Views
    if ( $script->verboseOutputLevel() > 0 )
    {
        $cli->output( "Parsing for Module View definitions: " . $docroot['fetches'] );
    }

    // doc parsing phase
    $descriptions = array();
    foreach( ezViewDocScanner::scanIndexPageForModules() as $module => $mdesc )
    {
        foreach( ezViewDocScanner::scanModulePageForViews( $module ) as $view => $desc )
        {
            $descriptions["$module/$view"]['desc'] = $desc['desc'];
        }
    }

    // validation phase
    foreach( $descriptions as $view => $description )
    {
        list( $modulename, $view ) = explode( '/', $view );

        $module = eZModule::exists( $modulename );
        if ( !( $module instanceof eZModule ) )
        {
            $cli->output( "Documented module $modulename could not be found" );
            continue;
        }
        // not a lot to match here, only view name
        $views = $module->attribute( 'views' );
        if ( !array_key_exists( $view, $views ) )
        {
            $cli->output( "Documented view $view could not be found in actual module $modulename" );
            continue;
        }

        if ( !is_dir( ezViewDocScanner::$storagedir."/$modulename" ) )
        {
            mkdir( ezViewDocScanner::$storagedir."/$modulename" );
        }
        file_put_contents( ezViewDocScanner::$storagedir."$modulename/$view.php", "<?php\n\$viewdesc = " . var_export( $description, true ) . ";\n?>" );
    }

    if ( !$isQuiet )
    {
        $cli->output( 'Parsed ' . count( $descriptions ) . ' View definitions' );
    }

}

$script->shutdown();

?>