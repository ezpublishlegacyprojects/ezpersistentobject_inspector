<?php
$fetchdesc = array (
  'params' => 
  array (
    'offset' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Number of bookmarks to skip.',
    ),
    'limit' => 
    array (
      'type' => 'integer',
      'required' => false,
      'desc' => 'Maximum number of  bookmarks to fetch.',
    ),
  ),
  'return' => 'An array of ezcontentbrowsebookmark objects.',
  'desc' => 'Fetches the bookmarks of the current user.',
);
?>