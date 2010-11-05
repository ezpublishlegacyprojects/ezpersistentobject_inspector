<?php
$fetchdesc = array (
  'params' => 
  array (
    'top_parent_node_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the top node.',
    ),
    'limit' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The number of objects that should be returned.',
    ),
    'offset' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The offset to start at.',
    ),
    'start_time' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The time to start at.',
    ),
    'end_time' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The time to end at.',
    ),
    'duration' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The period of time that should be used.',
    ),
    'ascending' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'The sorting direction that should be used. If FALSE (default), the results will be sorted descending by the number of times each product was bought.',
    ),
    'extended' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'If TRUE, an array of hashes will be returned.',
    ),
  ),
  'return' => 'An array of ezcontentobject objects, an array of hashes (see below) or FALSE.',
  'desc' => 'Fetches the most popular / most sold products.',
);
?>