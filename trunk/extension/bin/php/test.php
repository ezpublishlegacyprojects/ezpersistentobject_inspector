<?php
/**
 *
 *
 * @version $Id$
 * @copyright 2010
 */

include( 'autoload.php' );

//$cli = eZCLI::instance();
/// @todo get filename from command line
$script = eZScript::instance( array(
    'description' => ( '...' ),
    'use-session' => false,
    'use-modules' => false,
    'use-extensions' => true ) );
$script->startup();
$script->initialize();

//$node =  eZContentObjectTreeNode::fetch( 2 );
//var_dump( eZDebugOperators::objInspect( $node ) );

//var_dump( ezdebugJSCFunctions::inspect( array( 'ezcontentobjecttreenode', 2, 'data_map' ) ) );

var_dump( ezdebugJSCFunctions::inspect( array( 'ezcontentobjecttreenode', 2, 'data_map', 'name', 'contentclass_attribute' ) ) );

$script->shutdown();

?>