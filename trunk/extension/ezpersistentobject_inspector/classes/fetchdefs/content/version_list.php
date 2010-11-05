<?php
$fetchdesc = array (
  'params' => 
  array (
    'contentobject' => 
    array (
      'type' => 'object',
      'required' => true,
      'desc' => 'The target object.',
    ),
    'offset' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Offset to start at.',
    ),
    'limit' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The number of versions that should be fetched.',
    ),
  ),
  'return' => 'An array of ezcontentobjectversion objects.',
  'desc' => 'Fetches all the versions of a content object.',
);
?>