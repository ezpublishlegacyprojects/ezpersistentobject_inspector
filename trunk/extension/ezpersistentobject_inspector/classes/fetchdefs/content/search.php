<?php
$fetchdesc = array (
  'params' => 
  array (
    'text' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The text that should be matched.',
    ),
    'subtree_array' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'Array node ID number under which the system should search.',
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
    'publish_timestamp' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Only search objects with the specified publishing date/time (as a UNIX timestamp).',
    ),
    'publish_date' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Only search objects published during the last day / week / month / three months / one year.',
    ),
    'section_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Only match objects that are in this section.',
    ),
    'class_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Only match objects that are instances of this class. This parameter can also be an array of class ID numbers.',
    ),
    'class_attribute_id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Only search within this attribute. This parameter can also be an array of attribute ID numbers.',
    ),
    'sort_by' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'Sort the result. See description below.',
    ),
    'limitation' => 
    array (
      'type' => 'array',
      'required' => false,
      'desc' => 'Limitation array (emtpy array = access override).',
    ),
    'ignore_visibility' => 
    array (
      'type' => 'boolean',
      'required' => false,
      'desc' => 'Makes it possible to get hidden nodes.',
    ),
  ),
  'return' => 'An array of hashes (see below) or FALSE.',
  'desc' => 'Fetches nodes containing data that match a certain criteria.',
);
?>