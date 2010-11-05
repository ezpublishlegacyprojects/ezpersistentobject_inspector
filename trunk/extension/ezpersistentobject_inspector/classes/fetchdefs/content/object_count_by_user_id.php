<?php
$fetchdesc = array (
  'params' => 
  array (
    'class_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target class.',
    ),
    'user_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the user (object ID).',
    ),
  ),
  'return' => 'The number of objects (as an integer).',
  'desc' => 'Fetches the number of objects (of a class) created by a user.',
);
?>