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
    'version' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The target version number.',
    ),
  ),
  'return' => 'An array of ezlocale objects or FALSE.',
  'desc' => 'Fetches locales that a version of an object may be translated into.',
);
?>