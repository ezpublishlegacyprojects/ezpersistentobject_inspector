<?php
$fetchdesc = array (
  'params' => 
  array (
    'object_attribute_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the target object attribute.',
    ),
    'object_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the target content object.',
    ),
    'value' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Value filtering on the attribute level.',
    ),
  ),
  'return' => 'The number of collections (as an integer).',
  'desc' => 'Fetches the number of collections that match a certain criteria.',
);
?>