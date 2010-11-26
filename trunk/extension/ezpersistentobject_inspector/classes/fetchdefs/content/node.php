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
    'language_code' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1. This enables you to fetch a node in a given language.',
    ),
    'remote_id' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'A new parameter since eZ Publish 4.1. This enables you to fetch a node by its remote ID number.',
    ),
  ),
  'return' => 'An ezcontentobjecttreenode object of FALSE.',
  'desc' => 'Fetches a node (identified by either an ID number or a path).',
);
?>