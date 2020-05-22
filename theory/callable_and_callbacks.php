<?php

// this function is extensible via a callback
// by default we only check if the password is >=8 characters
function validate_password($password, callable $custom_validator = NULL) {
  if (strlen($password >= 8)) {
    return FALSE;
  }
  if ($custom_validator !== NULL) {
    return $custom_validator($password);
  }
  return TRUE;
}

$custom_validator = function ($password) {
  if (preg_match('/@/', $password)) {
    return TRUE;
  }
  return FALSE;
};

echo var_dump(validate_password('eeee@eeee', $custom_validator));

#
#      array map
#

$greeting = 'hello';

$greet_user = function ($name) use ($greeting) {
  // global $greeting; // <-- would take $greeting from the global scope,
  // use ($greeting) is taken from the parent scope
  echo $greeting . ' ' . $name . "\n";
};

// Array of strings
$string_array = ["Bob", "John", "Alice"];

array_map($greet_user, $string_array);


// call_user_func is practically the same as variable functions

function call_something(callable $fn) {
  call_user_func($fn);
  // call_user_func_array could be useful:
  // also https://www.php.net/manual/en/function.call-user-func-array.php
}
