<?php
$fetchdesc = array (
  'params' => 
  array (
    'alphabet' => 
    array (
      'type' => 'string',
      'required' => true,
      'desc' => 'The sequence that should be matched.',
    ),
    'strict_matching' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Enables or disables exact matching. If FALSE (or omitted), the function will look for keywords that start with the specified sequence.',
    ),
    'classid' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'Filtering: the ID number of the class or an array of the ID numbers.',
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
      'desc' => 'The number of elements that should be returned.',
    ),
    'owner' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Filtering by owner: the ID number of the object representing the user.',
    ),
    'parent_node_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the parent node.',
    ),
    'include_duplicates' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Makes it possible to avoid duplicates (different keywords but same nodes) in the result. If TRUE (or omitted), duplicates are allowed.',
    ),
    'sort_by' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The sorting mechanism that should be used.',
    ),
  ),
  'return' => 'An array of hashes (see below) or FALSE.',
  'desc' => 'Fetches nodes that use keywords starting with a given sequence.',
);
?>