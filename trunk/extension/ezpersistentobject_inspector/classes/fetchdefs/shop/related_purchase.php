<?php
$fetchdesc = array (
  'params' => 
  array (
    'contentobject_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the object representing the source product.',
    ),
    'limit' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The number of objects that should be fetched.',
    ),
  ),
  'return' => 'An array of ezcontentobject objects or FALSE.',
  'desc' => 'Fetches products that were purchased together with a given product.',
);
?>