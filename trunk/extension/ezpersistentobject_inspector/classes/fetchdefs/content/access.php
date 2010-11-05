<?php
$fetchdesc = array (
  'params' => 
  array (
    'access' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The desired access method (see below).',
    ),
    'contentobject' => 
    array (
      'type' => 'object',
      'required' => false,
      'desc' => 'The target/location (either an object or a node).',
    ),
    'contentclass_id' => 
    array (
      'type' => 'integer, string',
      'required' => false,
      'desc' => 'The ID number or identifier of the class that should be included in the check.',
    ),
    'parent_contentclass_id' => 
    array (
      'type' => 'integer, string',
      'required' => false,
      'desc' => 'The parent node\'s class ID number or identifier that should be included in the check.',
    ),
  ),
  'return' => 'TRUE if access is allowed, FALSE otherwise.',
  'desc' => 'Checks if the current user has access to a given function.',
);
?>