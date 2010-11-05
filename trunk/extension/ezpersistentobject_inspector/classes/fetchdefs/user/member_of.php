<?php
$fetchdesc = array (
  'params' => 
  array (
    'id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target user.',
    ),
  ),
  'return' => 'An array with ezrole objects or FALSE.',
  'desc' => 'Fetches the roles that are assigned to a user.',
);
?>