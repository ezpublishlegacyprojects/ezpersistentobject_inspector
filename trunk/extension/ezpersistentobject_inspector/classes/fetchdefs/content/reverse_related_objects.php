<?php
$fetchdesc = array (
  'params' => 
  array (
    'object_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target object.',
    ),
    'attribute_identifier' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The ID number or class/attribute identifier of the target attribute.',
    ),
    'all_relations' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Controls whether to fetch all types of relastions or not, default is FALSE.',
    ),
    'group_by_attribute' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Groups the result based on the attributes, default value is TRUE.',
    ),
    'sort_by' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The sorting mechanism that should be used.',
    ),
    'ignore_visibility' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Makes it possible to fetch hidden nodes (TRUE by default).',
    ),
    'limit' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1 which enables you to fetch an exact number of items',
    ),
    'offset' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1 which enables you to define an offset.',
    ),
    'as_object' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1 which enables you to fetch the items as objects.',
    ),
    'load_data_map' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1 which enables you to load the data_map array.',
    ),
  ),
  'return' => 'An array of ezcontentobject objects or FALSE.',
  'desc' => 'Fetches reverse related objects.',
);
?>