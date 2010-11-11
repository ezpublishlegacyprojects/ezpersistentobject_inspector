<?php
/**
 *
 *
 * @author G. Giunta
 * @version $Id: function_definition.php 5 2009-01-26 15:41:36Z gg $
 * @copyright 2009
 */

$FunctionList = array(

    'fetch' => array(
        'name'            => 'fetch',
        'call_method'     => array('class'        => 'ezFetchDocScanner',
                                    'method'       => 'fetch' ),
        'parameters'      => array( array( 'name'     => 'module',
                                           'type'     => 'string',
                                           'required' => true ),
                                    array( 'name'     => 'view',
                                           'type'     => 'string',
                                           'required' => true ) ) ),

    $FunctionList['object'] = array(
        'name'            => 'object',
        'call_method'     => array( 'class'        => 'ezPODocScanner',
                                    'method'       => 'fetch' ),
        'parameters'      => array( array( 'name'     => 'class',
                                           'type'     => 'string',
                                           'required' => true ) ) ),

    'view' => array(
        'name'            => 'view',
        'call_method'     => array( 'class'        => 'ezViewDocScanner',
                                    'method'       => 'fetch' ),
        'parameters'      => array( array( 'name'     => 'module',
                                           'type'     => 'string',
                                           'required' => true ),
                                    array( 'name'     => 'view',
                                           'type'     => 'string',
                                           'required' => true ) ) )
);
?>