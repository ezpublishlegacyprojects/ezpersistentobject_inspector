<?php
$fetchdesc = array (
  'params' => 
  array (
    'offset' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The offset to start at.',
    ),
    'limit' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The number of objects that should be returned.',
    ),
    'attribute_filter' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1. This enables attribute filtering.',
    ),
    'sort_by' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1. This enables sorting.',
    ),
    'as_object' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1. This enables fetching elements as objects.',
    ),
  ),
  'return' => 'An array of ezcontentobject objects or FALSE.',
  'desc' => 'Fetches the objects that are in the trash.',
);
?>