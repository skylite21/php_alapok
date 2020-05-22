<?php

declare(strict_types = 1);

/*
 * enables strict mode. In strict mode, only a variable of exact type of the
 * “type declaration” will be accepted, or a TypeError will be thrown. The only
 * exception to this rule is that an integer may be given to a function
 * expecting a float.
 */

function get_int(int $int) {
  var_dump($int);
}

$int = 12;
get_int($int);

function get_string(string $str) {
  var_dump($str);
}

$int = 12;
get_string($int);

function get_float(float $f) {
  var_dump($f);
}

$int = 100;
var_dump($int);
//int(100)

get_float($int);
//float(100)
