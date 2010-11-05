<?php
$fetchdesc = array (
  'params' => 
  array (
    'is_valid' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Instructs the system to only fetch valid or invalid URLs.',
    ),
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
      'desc' => 'The number of URLs that should be fetched.',
    ),
  ),
  'return' => 'An array of ezurl objects or FALSE.',
  'desc' => 'Fetches the URLs that are stored in the URL table.',
);
?>