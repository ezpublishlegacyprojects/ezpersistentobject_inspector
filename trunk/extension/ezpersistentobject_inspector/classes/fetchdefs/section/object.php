<?php
$fetchdesc = array (
  'params' => 
  array (
    'section_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the section that should be fetched.',
    ),
    'identifier' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The identifier of the section that should be fetched.  This parameter was added in eZ Publish 4.4.',
    ),
  ),
  'return' => 'An ezsection object or FALSE.',
  'desc' => 'Fetches a section.',
);
?>