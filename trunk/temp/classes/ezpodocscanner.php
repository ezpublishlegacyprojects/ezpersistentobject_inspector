<?php
/**
* @author Gaetano Giunta
* @version $Id$
* @copyright (c) 2010 G. Giunta
* @license code licensed under the GNU GPL 2.0: see README
*/

class ezPODocScanner
{
    static $docroot = 'http://localhost/manuals/ezp_4_0_tech_manual/4_0/reference/objects';
    static $pagesuffix = '.html';
    static $docbegin = '<h4>Attributes</h4>'; //'<table cellspacing="0" cellpadding="2" class="renderedtable">';
    static $docend = '* Indicates whether the attribute provides a pre-fetched value or if it needs to be computed upon request.';
    static $docbegin2 = '<h1>Objects</h1>';
    static $docend2 = '<div';
    static $scalartypes = array( 'string', 'integer', 'boolean', 'float', 'double', 'null' );
    /// @todo use correct function to get extension root dir
    static $storagedir = 'extension/ezpersistentobject_inspector/classes/podefs/';

    static protected $defs = array();

    /// attribute types that cannot be easily parsed from the doc
    /// @todo move to an ini file ?
    static protected $known_types = array(
        'ezcontentclass' => array(
            'ingroup_list' => 'array [ezcontentclassclassgroup]',
            'ingroup_id_list' => 'array [ezcontentclassgroup]',
            'match_ingroup_id_list' => 'array [ezcontentclassgroup]',
            'group_list' => 'array [ezcontentclassclassgroup]',
        ),
    );

    /**
    * Given the 'objects' page in the manual's reference section, return an array with a list of obj names
    */
    static function scanIndexPageForClasses( )
    {
        $out = array();

        $page = file_get_contents( self::$docroot . self::$pagesuffix );
        $begin = strpos( $page, self::$docbegin2 );
        $end = strpos( $page, self::$docend2, $begin + strlen( self::$docbegin2 ) );
        if ( $begin !== false && $end !== false )
        {
            $page = trim( substr( $page, $begin + strlen( self::$docbegin2 ), $end - $begin - strlen( self::$docbegin2 ) ) );
            $begin = false;
            $end = false;
            while( ( $begin = strpos( $page, '<tr>', $end ) ) !== false )
            {
                $end = strpos( $page, '</tr>', $begin );
                $desc = trim( substr( $page, $begin + 4, $end - $begin - 1 ) );
                // small bug in the html: td is not closed...
                if ( preg_match( '#<td>(.*)</td>.*<td>(.*)</td>.*<td>(.*)</t#Us', $desc, $matches ) )
                {
                    $out[strtolower( trim( strip_tags( $matches[1] ), " \r\n\t" ) )] = array(
                        'desc' => trim( strip_tags( $matches[2] ) ),
                        'persistent' => ( trim( $matches[3] ) == 'Yes.' )
                        );
                }
            }
        }
        return $out;
    }

    /**
    * Given an object description page in the manual's reference section, return an array with a list of its attributes and attr. description
    * @todo parse page for persistent Yes / No
    * @todo are there still newlines in attr. names?
    */
    static function scanPageForClass( $classname, $fix=true )
    {
        $out = array();
        $trads = array( 'hashes' => 'array', 'strings' => 'string', 'ID numbers' => 'integer' );

        /// @todo use curl if allow_url_fopen does not work...
        $page = file_get_contents( self::$docroot . "/$classname" . self::$pagesuffix );

        $begin = strpos( $page, self::$docbegin );
        $end = strpos( $page, self::$docend, $begin + strlen( self::$docbegin ) );
        if ( $begin !== false && $end !== false )
        {
            $page = trim( substr( $page, $begin + strlen( self::$docbegin ), $end - $begin - strlen( self::$docbegin ) ) );
            $begin = false;
            $end = false;
            while( ( $begin = strpos( $page, '<tr>', $end ) ) !== false )
            {
                $end = strpos( $page, '</tr>', $begin );
                $desc = trim( substr( $page, $begin + 4, $end - $begin - 4 ) );
                if ( preg_match( '#<td valign="top">.*<p>(.*)</p>.*</td>.*<td valign="top">.*<p>(.*)</p>.*</td>.*<td valign="top">.*<p>(.*)</p>.*</td>.*<td valign="top">.*<p>(.*)</p>#Us', $desc, $matches ) )
                {
                    $attrname = strtolower( trim( strip_tags( $matches[1] ), " \r\n\t" ) );
                    $attrtype = strtolower( trim( $matches[2] ) );
                    $desc = trim( $matches[4] );
                    if ( $fix )
                    {
                        if ( isset( self::$known_types[$classname][$attrname] ) )
                        {
                            $attrtype = self::$known_types[$classname][$attrname];
                        }
                        elseif ( !self::isscalar( $attrtype ) )
                        {
                            /// @todo look for descriptions that have 2 links, or a link that is not a declaration of type
                            if ( preg_match( '#<a href="[^"]+">([^<]+)</a>#', $desc , $matches2 ) )
                            {
                                $attrtype .= " [{$matches2[1]}]";
                            }
                            elseif ( $attrtype == 'array' && preg_match( '#^(An array of|Array of|The) (hashes|strings|ID numbers)#', $desc , $matches2 ) )
                            {
                                $attrtype .= ' [' . $trads[$matches2[2]] .']';
                            }
                        }
                    }
                    $out[$attrname] = array(
                        'type' => $attrtype,
                        'static' => ( trim( $matches[3] ) == 'Yes.' ),
                        'desc' => strip_tags( $desc )
                        );
                }
            }
        }
        else
        {
            /// log warning
        }
        return $out;
    }

    static function isscalar( $type )
    {
        return in_array( $type, self::$scalartypes );
    }

    static function definition( $classname, $force_refresh=false )
    {
        if ( array_key_exists( $classname, self::$defs ) && !$force_refresh )
        {
            return self::$defs[$classname];
        }
        else
        {
            /// @todo make sure there is no .. or other crap in $classname
            if ( file_exists( self::$storagedir."$classname.php" ) )
            {
                include( self::$storagedir."$classname.php" );
                /// @todo test that $ezpodesc is set
                self::$defs[$classname] = $ezpodesc;
                return self::$defs[$classname];
            }
            else
            {
                ezDebug::writeError( "Cannot load description for class $classname", __METHOD__ );
            }
            return false;
        }
    }

    function findClassNameGivenLowerCaseName( $classname )
    {
        $classes = include( 'autoload/ezp_kernel.php' );
        foreach ( $classes as $name => $file )
        {
            if ( strtolower( $name ) == $classname )
                return $name;
        }
        $classes = include( 'var/autoload/ezp_extension.php' );
        foreach ( $classes as $name => $file )
        {
            if ( strtolower( $name ) == $classname )
                return $name;
        }
        return false;
    }

}
?>