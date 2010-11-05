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
  ),
  'return' => 'An array (see below) or FALSE.',
  'desc' => 'Fetches roles that have at least one policy limited to a certain section.',
);
?>