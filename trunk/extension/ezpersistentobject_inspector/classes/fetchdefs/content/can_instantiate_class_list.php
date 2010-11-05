<?php
$fetchdesc = array (
  'params' => 
  array (
    'group_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of a class group to fetch classes from.',
    ),
    'parent_node' => 
    array (
      'type' => 'object',
      'required' => false,
      'desc' => 'Alternative parent node.',
    ),
  ),
  'return' => 'Array of ezcontentclass objects or FALSE.',
  'desc' => 'Fetches the classes that the current user can create objects of.',
);
?>