<?php
$fetchdesc = array (
  'params' => 
  array (
    'object_id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the target object.',
    ),
    'attribute_identifier' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The ID number or class/attribute identifier of the target attribute.',
    ),
    'all_relations' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'Controls what type of relations that should be feetched, default is FALSE.',
    ),
  ),
  'return' => 'An integer (the number of related objects).',
  'desc' => 'Fetches the number of related objects.',
);
?>