<?php
/**
* @author Gaetano Giunta
* @version $Id$
* @copyright (c) 2010 G. Giunta
* @license code licensed under the GNU GPL 2.0: see README
*/

class ezFetchDocScanner
{
    static $docroot = 'http://doc.ez.no/eZ-Publish/Technical-manual/4.x/Reference/Modules';
    static $pagesuffix = '';
    static $docbegin = '<h3>Parameters</h3>'; //'<table cellspacing="0" cellpadding="2" class="renderedtable">';
    static $docend = '</table>';
    static $docbegin2 = '<th>Summary</th>';
    static $docend2 = '</table>';
    static $docbegin3 = '<h3>Returns</h3>';
    static $docend3 = '<h3>Description</h3>';
    static $storagedir = 'extension/ezpersistentobject_inspector/classes/fetchdefs/';

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
    static function scanIndexPageForModules( )
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
                if ( preg_match( '#.*<td>(.*)</td>.*<td>(.*)</td>#Us', $desc, $matches ) )
                {
                    $out[strtolower( trim( strip_tags( $matches[1] ) ) )] = array(
                        'desc' => trim( strip_tags( $matches[2] ) )
                        );
                }
            }
        }
        return $out;
    }

    static function scanModulePageForFetches( $modulename )
    {
        $out = array();

        $page = file_get_contents( self::$docroot . "/$modulename" . self::$pagesuffix );

        if (  strpos( $page, 'Fetch functions</a>' ) )
        {
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

    /**
    * Given a fetch description page in the manual's reference section, return an array with a list of its attributes and attr. description
    * @todo parse page for persistent Yes / No
    * @todo are there still newlines in attr. names?
    */
    static function scanPageForFetch( $modulename, $fetchname, $fix=true )
    {
        $out = array();
        $trads = array( 'hashes' => 'array', 'strings' => 'string', 'ID numbers' => 'integer' );

        /// @todo use curl if allow_url_fopen does not work...
        $page = file_get_contents( self::$docroot . "/$modulename/fetch_functions/$fetchname" . self::$pagesuffix );

        $begin = strpos( $page, self::$docbegin );
        $end = strpos( $page, self::$docend, $begin + strlen( self::$docbegin ) );
        if ( $begin !== false && $end !== false )
        {
            $page2 = trim( substr( $page, $begin + strlen( self::$docbegin ), $end - $begin - strlen( self::$docbegin ) ) );
            $begin = false;
            $end = false;
            while( ( $begin = strpos( $page2, '<tr', $end ) ) !== false )
            {
                $end = strpos( $page2, '</tr>', $begin );
                $desc = trim( substr( $page2, $begin, $end - $begin ) );
                if ( preg_match( '#<tr class="bg(?:light|dark)">.*<td>(.*)</td>.*<td>(.*)</td>.*<td>(.*)</td>.*<td>(.*)</td>#Us', $desc, $matches ) )
                {
                    $pname = strtolower( trim( $matches[1] ) );
                    $ptype = strtolower( trim( $matches[2] ) );
                    $desc = trim( $matches[3] );
                    $required = ( trim( $matches[4] ) == 'Yes.' );
                    $out['params'][$pname] = array(
                        'type' => preg_replace( array( '/^bool$/', '/interger/', ), array( 'boolean', 'integer' ), $ptype ),
                        'required' => $required,
                        'desc' => strip_tags( $desc )
                        );
                }
            }
        }
        else
        {
            /// log warning
        }

        $begin = strpos( $page, self::$docbegin3 );
        $end = strpos( $page, self::$docend3, $begin + strlen( self::$docbegin3 ) );
        if ( $begin !== false && $end !== false )
        {
            $out['return'] = trim( strip_tags( substr( $page, $begin + strlen( self::$docbegin3 ), $end - $begin - strlen( self::$docbegin3 ) ) ) );
        }
        else
        {
            /// log warning
        }

        return $out;
    }

    static function definition( $modulename, $fetchname, $force_refresh=false )
    {
        if ( array_key_exists( self::$defs["$modulename/$fetchname"], self::$defs ) && !$force_refresh )
        {
            return self::$defs["$modulename/$fetchname"];
        }
        else
        {
            /// @todo make sure there is no .. or other crap in params received
            if ( file_exists( self::$storagedir."$modulename/$fetchname.php" ) )
            {
                include( self::$storagedir."$modulename/$fetchname.php" );
                /// @todo test that $ezpodesc is set
                self::$defs["$modulename/$fetchname"] = $fetchdesc;
                return self::$defs["$modulename/$fetchname"];
            }
            else
            {
                ezDebug::writeError( "Cannot load description for fetch $modulename, $fetchname", __METHOD__ );
            }
            return false;
        }
    }

    /// This function is also good for the subclass eZViewDocScanner
    function fetch( $module, $fetch )
    {
        return array( 'result' => self::definition( $module, $fetch ) );
    }

    static function setDocRoot ( $docroot, $pagesuffix )
    {
        self::$docroot = $docroot;
        self::$pagesuffix = $pagesuffix;
    }

}
?>