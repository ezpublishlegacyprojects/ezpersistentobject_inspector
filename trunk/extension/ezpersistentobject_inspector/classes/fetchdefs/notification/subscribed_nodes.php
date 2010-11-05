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
      'desc' => 'The number of nodes that should be fetched.',
    ),
  ),
  'return' => 'Array of ezsubtreenotificationrule objects or FALSE.',
  'desc' => 'Fetches nodes that the current user has subscribed to.',
);
?>