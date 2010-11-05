<?php
$fetchdesc = array (
  'params' => 
  array (
    'parent_node_id' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The ID number(s) of the parent  node(s).',
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
      'desc' => 'The number of nodes that should be fetched.',
    ),
    'attribute_filter' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The attribute level filter logic.',
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
      'desc' => 'The classes that should be filtered.',
    ),
    'group_by' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'DEPRECATED',
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
      'desc' => 'The translations that should be fetched.',
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
      'desc' => 'The maximum level of depth that should be explored (1 by default).',
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
  'return' => 'An array of ezcontentobjecttreenode objects or FALSE.',
  'desc' => 'Fetches the children of a node or a collection of nodes.',
);
?>