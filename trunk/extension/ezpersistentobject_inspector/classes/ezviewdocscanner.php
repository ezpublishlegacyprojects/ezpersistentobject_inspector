<?php
/**
* @author Gaetano Giunta
* @version $Id$
* @copyright (c) 2010 G. Giunta
* @license code licensed under the GNU GPL 2.0: see README
*/

class ezViewDocScanner extends ezFetchDocScanner
{
    static $storagedir = 'extension/ezpersistentobject_inspector/classes/viewdefs/';

    static protected $defs = array();

    static function scanModulePageForviews( $modulename )
    {
        $out = array();

        $page = file_get_contents( self::$docroot . "/$modulename" . self::$pagesuffix );

        if (  $x = strpos( $page, 'Views</a>' ) )
        {
            $begin = strpos( $page, self::$docbegin2, $x );
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
                    if ( preg_match( '#.*<td>(.*)</td>.*<td>(.*)</td>#Us', $desc, $matches ) )
                    {
                        $out[strtolower( trim( strip_tags( $matches[1] ) ) )] = array(
                            'desc' => trim( strip_tags( $matches[2] ) )
                            );
                    }
                }
            }
        }
        return $out;
    }

    static function definition( $modulename, $viewname, $force_refresh=false )
    {
        if ( array_key_exists( self::$defs["$modulename/$viewname"], self::$defs ) && !$force_refresh )
        {
            return self::$defs["$modulename/$viewname"];
        }
        else
        {
            /// @todo make sure there is no .. or other crap in params received
            if ( file_exists( self::$storagedir."$modulename/$viewname.php" ) )
            {
                include( self::$storagedir."$modulename/$viewname.php" );
                /// @todo test that $ezpodesc is set
                self::$defs["$modulename/$viewname"] = $viewdesc;
                return self::$defs["$modulename/$viewname"];
            }
            else
            {
                ezDebug::writeError( "Cannot load description for view $modulename/$viewname", __METHOD__ );
            }
            return false;
        }
    }

}
?>