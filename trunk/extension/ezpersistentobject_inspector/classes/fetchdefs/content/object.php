<?php
$fetchdesc = array (
  'params' => 
  array (
    'object_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target object.',
    ),
    'remote_id' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'New parameter since eZ Publish 4.1. This enables you to fetch an object based on its remote ID.',
    ),
  ),
  'return' => 'An ezcontentobject object or FALSE.',
  'desc' => 'Fetches a content object (specified by an ID number).',
);
?>