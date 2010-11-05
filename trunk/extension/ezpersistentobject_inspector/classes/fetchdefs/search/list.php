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
      'desc' => 'The number of items that should be returned.',
    ),
  ),
  'return' => 'An array of hashes (see below) or FALSE.',
  'desc' => 'Fetches the phrases that have been searched ordered by their usage frequency.',
);
?>