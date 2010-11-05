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
      'desc' => 'The number of objects that should be returned.',
    ),
  ),
  'return' => 'An array of ezcontentobject objects or FALSE.',
  'desc' => 'Fetches the objects that are in the trash.',
);
?>