<?php
$fetchdesc = array (
  'params' => 
  array (
    'section_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target section.',
    ),
    'status' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The status of the target objects (\'published\' by default).',
    ),
  ),
  'return' => 'The number of objects (as an integer) that belong to the section.',
  'desc' => 'Fetches the number of objects that belong to certain section.',
);
?>