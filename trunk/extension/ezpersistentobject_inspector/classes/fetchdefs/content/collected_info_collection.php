<?php
$fetchdesc = array (
  'params' => 
  array (
    'collection_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the collection that should be fetched.',
    ),
    'contentobject_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the object that should be fetched.',
    ),
  ),
  'return' => 'An ezinformationcollection object or FALSE.',
  'desc' => 'Fetches an information collection.',
);
?>