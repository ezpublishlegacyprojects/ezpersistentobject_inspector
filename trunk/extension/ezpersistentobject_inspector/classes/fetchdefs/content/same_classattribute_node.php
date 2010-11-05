<?php
$fetchdesc = array (
  'params' => 
  array (
    'id' => 
    array (
      'type' => 'integer',
      'required' => true,
      'desc' => 'The ID number of the class attribute that should be examined.',
    ),
    'value' => 
    array (
      'type' => 'mixed',
      'required' => true,
      'desc' => 'The value that should be matched.',
    ),
    'datatype' => 
    array (
      'type' => 'string',
      'required' => true,
      'desc' => 'Must be either &quot;int&quot;, &quot;float&quot; or &quot;text&quot;.',
    ),
  ),
  'return' => 'An array of ezcontentobjecttreenode objects or FALSE.',
  'desc' => 'Fetches nodes containing attributes that match a certain value.',
);
?>