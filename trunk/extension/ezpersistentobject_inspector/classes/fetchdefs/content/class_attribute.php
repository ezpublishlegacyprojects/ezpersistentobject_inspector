<?php
$fetchdesc = array (
  'params' => 
  array (
    'attribute_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the class attribute that should be fetched.',
    ),
    'version_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The status/version of the class.',
    ),
  ),
  'return' => 'The specified class attribute as an ezcontentclassattribute object or FALSE.',
  'desc' => 'Fetches an attribute of a content class.',
);
?>