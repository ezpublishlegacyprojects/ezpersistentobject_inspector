<?php
$fetchdesc = array (
  'params' => 
  array (
    'sort_by' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The field that should be used by the sorting mechanism.',
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
      'desc' => 'The number of users that should be fetched.',
    ),
  ),
  'return' => 'An array with ezuser objects or FALSE.',
  'desc' => 'Fetches the users that are logged in.',
);
?>