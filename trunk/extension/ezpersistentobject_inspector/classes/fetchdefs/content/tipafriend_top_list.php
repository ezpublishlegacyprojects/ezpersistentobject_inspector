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
      'desc' => 'The number of nodes that should be returned.',
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
      'desc' => 'The sorting direction that should be used. If FALSE (default), the results will be sorted descending by the number of times each node was tipped.',
    ),
    'extended' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'If TRUE, an array of hashes will be returned.',
    ),
  ),
  'return' => 'An array of ezcontentobjecttreenode objects, an array of hashes (see below) or FALSE.',
  'desc' => 'Fetches the most popular (most tipped) nodes.',
);
?>