<?php
$fetchdesc = array (
  'params' => 
  array (
    'class_filter' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The classes that should be filtered.',
    ),
    'sort_by' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'The sorting mechanism that should be used.',
    ),
  ),
  'return' => 'Array of ezcontentclass objects or FALSE.',
  'desc' => 'Fetches a collection of classes.',
);
?>