<?php 
// merge arrays, start with the smaler one

$a = [3,5,7];
$b = [4,6];
function m(array $a, array $b) {
  $sl = count($a);
  $ll = count($b);
  $s = $a;
  $l = $b;

  function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
  }

  if ($sl > $ll) {
    swap($sl, $ll);
    swap($s, $l);
  }

  $m = [];
  $i = 0;
       
  while ($i < $sl) {
    $m[] = $s[$i]; 
    $m[] = $l[$i]; 
    $i++; 
  }
  while ($i < $ll) {
    $m[] = $l[$i]; 
    $i++; 
  }

  return $m;
}
var_dump(m($a, $b));
