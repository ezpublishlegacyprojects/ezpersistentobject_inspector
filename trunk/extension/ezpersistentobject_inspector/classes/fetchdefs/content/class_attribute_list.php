<?php
$fetchdesc = array (
  'params' => 
  array (
    'class_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the target class.',
    ),
    'version_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The version/status of the class.',
    ),
  ),
  'return' => 'Array of ezcontentclassattribute objects or FALSE.',
  'desc' => 'Fetches the attributes of a class.',
);
?>