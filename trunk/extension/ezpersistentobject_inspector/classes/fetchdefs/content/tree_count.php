<?php
$fetchdesc = array (
  'params' => 
  array (
    'parent_node_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the parent node.',
    ),
    'class_filter_type' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'Filter type for class filtering (include/exclude).',
    ),
    'class_filter_array' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The type of nodes that should be filtered.',
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
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Type of nodes that should be fetched (all or main nodes only).',
    ),
    'depth' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The maximum level of depth that should be explored.',
    ),
    'depth_operator' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The logic to use when checking the depth.',
    ),
  ),
  'return' => 'An integer (number of nodes).',
  'desc' => 'Fetches the number of children of a node recursively.',
);
?>