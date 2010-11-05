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
      'desc' => 'The number of classes that should be fetched.',
    ),
  ),
  'return' => 'Array of ezcontentclass objects.',
  'desc' => 'Fetches the most recently modified classes.',
);
?>