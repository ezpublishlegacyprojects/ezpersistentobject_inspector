<?php
$fetchdesc = array (
  'params' => 
  array (
    'object_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the target object.',
    ),
    'version_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The version number that should be fetched.',
    ),
  ),
  'return' => 'An ezcontentobjectversion object or FALSE.',
  'desc' => 'Fetches a specific version of an object.',
);
?>