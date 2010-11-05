<?php
$fetchdesc = array (
  'params' => 
  array (
    'version' => 
    array (
      'type' => 'object',
      'required' => true,
      'desc' => 'The target version (must be an ezcontentobjectversion object).',
    ),
    'language_code' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The language code.',
    ),
  ),
  'return' => 'An array of ezcontentobjectattribute objects or FALSE.',
  'desc' => 'Fetches the attributes of an object\'s version (and translation).',
);
?>