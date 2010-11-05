<?php
$fetchdesc = array (
  'params' => 
  array (
    'section_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the target section.',
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
      'desc' => 'The number of objects that should be fetched.',
    ),
    'sort_order' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The desired sorting order.',
    ),
    'status' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The status of the target objects (\'published\' by default).',
    ),
  ),
  'return' => 'An array of ezcontentobject objects or FALSE.',
  'desc' => 'Fetches objects that belong to certain section.',
);
?>