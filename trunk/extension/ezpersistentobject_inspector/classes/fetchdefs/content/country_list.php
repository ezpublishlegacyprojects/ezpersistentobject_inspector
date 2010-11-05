<?php
$fetchdesc = array (
  'params' => 
  array (
    'filter' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The type of filtering.',
    ),
    'value' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'The value of the filter.',
    ),
  ),
  'return' => 'An array of hashes (see below) or FALSE.',
  'desc' => 'Fetches the list of countries specified in the "country.ini" configuration file.',
);
?>