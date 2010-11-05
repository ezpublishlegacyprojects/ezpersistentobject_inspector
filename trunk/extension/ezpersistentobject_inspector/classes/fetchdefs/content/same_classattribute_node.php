<?php
$fetchdesc = array (
  'params' => 
  array (
    'id' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'The ID number of the class attribute that should be examined.',
    ),
    'value' => 
    array (
      'type' => 'mixed',
      'required' => false,
      'desc' => 'The value that should be matched.',
    ),
    'datatype' => 
    array (
      'type' => 'string',
      'required' => false,
      'desc' => 'Must be either &quot;int&quot;, &quot;float&quot; or &quot;text&quot;.',
    ),
  ),
  'return' => 'An array of ezcontentobjecttreenode objects or FALSE.',
  'desc' => 'Fetches nodes containing attributes that match a certain value.',
);
?>