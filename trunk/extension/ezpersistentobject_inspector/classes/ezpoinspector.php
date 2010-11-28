<?php
/**
 *
 * @author Gaetano Giunta
 * @copyright (c) 2010 G. Giunta
 * @license code licensed under the GPL License: see README
 */

/**
* A class dedicated to inspecting (i.e. serializing) eZPersistentObject subclasses
*/
class ezPOInspector
{

    /**
     * Recursive conversion of values to array format.
     * It recognizes eZPersistentObject descendants, and only converts their
     * attributes, not their members.
     * COPIED OVER FROM ggxmlview extension rev. 0.2
     * @param mixed $obj
     * @param integer $depth max recursion depth
     * @param array $attributes a filter on object attributes / array keys to serialize
     * @return mixed
     */
    static function to_array( $obj, $depth=2, $attributes=array(), $with_typecast=true )
    {
        if ( ( is_object( $obj ) || is_array( $obj ) ) && $depth < 1 )
        {
            return null;
        }

        if ( is_object( $obj ) && method_exists( $obj, "attributes" ) && method_exists( $obj, "attribute" ) )
        {
            // 'template object' (should be an ancestor of ezpo)
            $out = array();
            if ( $with_typecast )
            {
                $fields = array();
                if ( method_exists( $obj, "definition" ) )
                {
                    $def = $obj->definition();
                    if ( isset( $def['fields'] ) )
                    {
                        $fields = $def['fields'];
                    }
                }
            }
            foreach( $obj->attributes() as $key )
            {
                if ( count( $attributes ) === 0 || in_array( $key, $attributes ) )
                {
                    $out[$key] = self::to_array( $obj->attribute( $key ), $depth-1, array(), $with_typecast );
                    if ( $with_typecast && array_key_exists( $key, $fields ) && isset( $fields[$key]['datatype'] ) )
                    {
                        switch( $fields[$key]['datatype'] )
                        {
                            case 'string':
                            case 'text':
                                break;
                            case 'int':
                            case 'integer':
                                $out[$key] = (integer)$out[$key];
                                break;
                            case 'float':
                                $out[$key] = (float)$out[$key];
                                break;
                            case 'bool':
                            case 'boolean':
                                $out[$key] = (boolean)$out[$key];
                                break;
                        }
                    }
                }
            }
        }
        else if ( is_array( $obj ) || is_object( $obj ) )
        {
            $out = array();
            foreach( $obj as $key => $val )
            {
                if ( count( $attributes ) === 0 || in_array( $key, $attributes ) )
                {
                    $out[$key] = self::to_array( $val, $depth-1, array(), $with_typecast );
                }
            }
        }
        else
        {
            // not an object: do a simple dump
            $out = $obj;
        }
        //if ( $depth == 1 && is_object( $obj ) && method_exists( $obj, "attributes" ) && method_exists( $obj, "attribute" ) ) {
        //    die(var_export($out, true));
        //}
        return $out;
    }

    /**
     * Creates the serialized version (ie. array of arrays) of a value that can
     * be used for step-by-step drilldown/inspection:
     * - scalar attributes are returned as is
     * - arrays/object attributes are returned w. values if they're not persistent,
     *   otherwise only their type is returned, so that a 2nd call can be used
     *   later to retrieve them
     * @param mixed $obj anything: a scalar value, an array, a plain php obj or an eZPO
     * @param boolean $with_typecast if true, use attribute type info from online docs method to cast static attributes
     */
    static function objInspect( $obj, $with_typecast=true )
    {

        if ( is_object( $obj ) && method_exists( $obj, "attributes" ) && method_exists( $obj, "attribute" ) )
        {
            // 'template object' (should be a descendant of ezpo)
            $out = array();

            /* // load actual def from the 'definition' method
               if ( $with_typecast )
               {
               $fields = array();
               if ( method_exists( $obj, "definition" ) )
               {
               $def = $obj->definition();
               if ( isset( $def['fields'] ) )
               {
               $fields = $def['fields'];
               }
               }
               } */

            // load theorical desc parsed from online docs. A warning is logged by ezPODocScanner if class is not found
            $class = strtolower( get_class( $obj ) );
            $defs = ezPODocScanner::definition( $class );
            $persistent = @$defs['persistent'];
            $keys = @$defs['keys'];
            if ( isset( $defs['attributes'] ) )
            {
                $defs = $defs['attributes'];
            }

            foreach( $obj->attributes() as $key )
            {
                /// @todo log warning if type is not documented
                $type = isset( $defs[$key]['type'] ) ? $defs[$key]['type'] : '';
                $val = null;
                if ( ezPODocScanner::isscalar( $type ) )
                {
                    // scalar attributes: serialize them straight away, even if dynamic
                    $val = $obj->attribute( $key );
                    if ( $with_typecast )
                    {
                        /// @todo the type for typecast should be gotten from $fields, as in online docs everything is a string...
                        switch( $type )
                        {
                            case 'string':
                            case 'text':
                                /// @todo shall we cast to string anyway, since we might be getting an object / other stuff?
                                break;
                            case 'int':
                            case 'integer':
                                $val = (integer)$val;
                                break;
                            case 'float':
                                $val = (float)$val;
                                break;
                            case 'bool':
                            case 'boolean':
                                $val = (boolean)$val;
                                break;
                                /// @todo log warning: unknown type
                        }
                    }
                }
                else
                {
                    /// if we know the current obj is persistent, we do not recurse,
                    /// allowing complex attributes to be fetched later via ajax calls

                    if ( !$persistent )
                    {
                        /// if we know the current obj is not persistent, we have to serialize
                        /// children straight away, or we will not be able to get them later
                        /// using further ajax calls anyway

                        $tmp = self::objInspect( $obj->attribute( $key ) );
                        $type = $tmp['type'];
                        $val = $tmp['value'];

                        /// @todo check if type here is consistent with type from def, log warning if not

                    }
                }
                $out[$key] = array( 'type' => $type, 'value' => $val );
            }
            $out = array( 'type' => 'object (' . $class . ')', 'value' => $out );
            // for persistent objects, send keys back to allow later retrieval
            if ( $persistent )
            {
                $keyvals = array();
                foreach( $keys as $key )
                {
                    $keyvals[] = $obj->attribute( $key );
                }
                $out['keys'] = implode( $keyvals, ',' );
            }

        }
        else if ( is_array( $obj ) || is_object( $obj ) )
        {
            // not a template object: do a "simple" dump
            // nb: we do recurse here,
            // since only for persistent objects we can do on-demand loading later
            $out = array();
            $i = 0;
            $isarray = true;
            foreach( $obj as $key => $val )
            {
                if ( $isarray && $key !== $i++ )
                {
                    $isarray = false;
                }
                $out[$key] = self::objInspect( $val, $with_typecast );
            }
            if ( is_array( $obj ) )
            {
                $type = $isarray ? 'array' : 'hash';
            }
            else
            {
                $type = 'object (' . strtolower( get_class( $obj ) ) . ')';
            }
            $out = array( 'type' => $type, 'value' => $out );
        }
        else
        {
            // not an object: do a simple dump
            $out = array( 'type' => gettype( $obj ), 'value' => $obj );
        }
        return $out;
    }
}

?>