<?php
$fetchdesc = array (
  'params' => 
  array (
    'production_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID of the target wishlist.',
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
      'desc' => 'The number of products that should be fetched.',
    ),
  ),
  'return' => 'An array of arrays containing information about the items in the wishlist (see below) or FALSE.',
  'desc' => 'Fetches the products of a given wishlist.',
);
?>