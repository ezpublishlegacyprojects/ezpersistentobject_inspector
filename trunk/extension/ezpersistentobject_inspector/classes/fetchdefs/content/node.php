<?php
$fetchdesc = array (
  'params' => 
  array (
    'node_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the node that should be fetched.',
    ),
    'node_path' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The path of the node that should be fetched.',
    ),
  ),
  'return' => 'An ezcontentobjecttreenode object of FALSE.',
  'desc' => 'Fetches a node (identified by either an ID number or a path).',
);
?>