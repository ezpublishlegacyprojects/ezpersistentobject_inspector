<?php
$fetchdesc = array (
  'params' => 
  array (
    'parent_node_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the parent node.',
    ),
    'class_filter_type' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The type of class filtering (include/exclude).',
    ),
    'class_filter_array' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The classes that should be filtered.',
    ),
    'attribute_filter' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'Filter logic for attribute level filtering.',
    ),
    'extended_attribute_filter' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The extended attribute level filter logic.',
    ),
    'main_node_only' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Type of nodes that should be fetched (all or main nodes only).',
    ),
  ),
  'return' => 'An integer (the number of nodes).',
  'desc' => 'Fetches the number of children of a node.',
);
?>