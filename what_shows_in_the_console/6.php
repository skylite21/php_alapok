<?php 

// reverse string...
function r(string $string) {
  $string = str_split($string);
  $arr = [];
  for ($i=count($string) - 1; $i>=0; $i--) {
    $arr[] = $string[$i];
  }
  return implode($arr);
}

var_dump(r('Hello'));
