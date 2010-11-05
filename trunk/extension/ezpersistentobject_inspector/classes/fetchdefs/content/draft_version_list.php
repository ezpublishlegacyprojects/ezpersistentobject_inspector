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
      'desc' => 'The number of drafts/versions that should be fetched.',
    ),
  ),
  'return' => 'An array of ezcontentobjectversion objects or FALSE.',
  'desc' => 'Fetches the drafts that belong to the current user.',
);
?>