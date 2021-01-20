<?php 

$myarr = [
  'asd' => 3,
  'bsd' => 4,
  'csd' => 5,
];

echo ($myarr['asd'] . "\n");

echo 'hello';


foreach ($myarr as $key => $value) {
  echo $key;
}

for ($i = 0; $i < count($myarr); $i++) {
  echo $myarr[array_keys($myarr)[$i]];
}

?>
