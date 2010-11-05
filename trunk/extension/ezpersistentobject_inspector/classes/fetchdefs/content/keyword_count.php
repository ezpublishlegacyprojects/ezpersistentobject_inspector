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
      'type' => 'integer',
      'required' => false,
      'desc' => 'Filtering: the ID number of the class.',
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
      'desc' => 'Makes it possible to avoid counting duplicates (different keywords but same nodes). If TRUE (or omitted), duplicates are allowed.',
    ),
  ),
  'return' => 'The number of matching nodes (as an integer).',
  'desc' => 'Fetches the number of nodes that use certain keywords. Only nodes that are main locations for content objects are counted.',
);
?>