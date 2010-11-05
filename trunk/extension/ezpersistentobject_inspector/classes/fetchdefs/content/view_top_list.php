<?php
$fetchdesc = array (
  'params' => 
  array (
    'section_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the section.',
    ),
    'class_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the class.',
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
      'desc' => 'The number of nodes that should be returned.',
    ),
  ),
  'return' => 'An array of ezcontentobjecttreenode objects.',
  'desc' => 'Fetches the most popular (most viewed) nodes.',
);
?>