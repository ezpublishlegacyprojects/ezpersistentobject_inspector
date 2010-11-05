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
    'sort_by' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The sorting mechanism that should be used.',
    ),
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
      'desc' => 'The maximum number of nodes that should be fetched.',
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
      'desc' => 'The type of nodes that should be filtered.',
    ),
    'only_translated' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Translation filtering (on/off).',
    ),
    'language' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The language that should be filtered.',
    ),
    'main_node_only' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Type of nodes that should be fetched (all or main nodes only).',
    ),
    'as_object' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'If TRUE (or omitted), an array of &quot;ezcontentobjecttreenode&quot; objects will be fetched. Otherwise, an array of arrays will be returned.',
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
    'limitation' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'Limitation array (emtpy array = access override).',
    ),
    'ignore_visibility' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Makes it possible to fetch hidden nodes.',
    ),
  ),
  'desc' => 'Fetches the children of a node recursively.',
);
?>