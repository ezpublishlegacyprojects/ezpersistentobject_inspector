<?php
$fetchdesc = array (
  'params' => 
  array (
    'production_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target wishlist.',
    ),
  ),
  'return' => 'The number of items that make up the wishlist (as an integer).',
  'desc' => 'Fetches a wishlist and returns the number of items in it.',
);
?>