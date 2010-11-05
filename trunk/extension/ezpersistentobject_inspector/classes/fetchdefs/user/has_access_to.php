<?php
$fetchdesc = array (
  'params' => 
  array (
    'module' => 
    array (
      'type' => 'string',
      'required' => true,
      'desc' => 'The name of the module.',
    ),
    'function' => 
    array (
      'type' => 'string',
      'required' => true,
      'desc' => 'The name of the function.',
    ),
    'user_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the user.',
    ),
  ),
  'return' => 'TRUE if access is allowed, FALSE otherwise.',
  'desc' => 'Checks if a user has access to a certain function of a module.',
);
?>