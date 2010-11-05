<?php
$fetchdesc = array (
  'params' => 
  array (
    'object_id' => 
    array (
      'type' => 'integer',
      'required' => false,
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
    'ignore_visibility' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Makes it possible to fetch hidden nodes.',
    ),
  ),
  'return' => 'An integer (number of reverse related objects).',
  'desc' => 'Fetches the number of reverse related objects.',
);
?>