<?php

// nasty way to supress warnings

// File error
$file_name = @file('non_existent_file');

if ($file_name) {
  echo 'file exists';
}

// It is used for expression
// it will supress the notice
echo @$cache[$key];

// It will not display notice if the index $key doesn't exist.
