<?php 

// first recurring character

$a = [3,4,2,3,4];

function f($arr) {
  $o = [];
  for($i=0; $i<count($arr); $i++) {
    if (array_key_exists($arr[$i], $o)) {
      return $arr[$i];
    } 
    $o[$arr[$i]] = $arr[$i];
  }
  return false;
}

var_dump(f($a));
