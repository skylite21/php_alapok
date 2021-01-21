<?php 

$myarr = [
  'asd' => 3,
  'bsd' => 4,
  'csd' => 5,
];

echo $myarr['asd'] . "\n";

echo 'hello';


foreach ($myarr as $key => $value) {
  echo $key;
}

$arr_len = count($myarr);
for ($i = 0; $i < $arr_len; $i++) {
  echo $myarr[array_keys($myarr)[$i]];
}
