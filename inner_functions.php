<?php

// For example you can conditionally declare a function:
$test = TRUE;
if ($test) {

  function my_func() {
    echo("My Function\n");
  }

}

function my_funciton() {
  echo("My Function\n");
  // The solution to the problem of trying to create a function more than once
  if (!function_exists("MyInnerFunction\n")) {

    function my_inner_function() {
      echo("MyInnerFunction\n");
    }

  }
}

// Then if you simply call MyInnerFunction() it will fail. To make it work
// you first have to call the outer function and only then
// does the inner function exist. That is:

my_funciton();
my_inner_function();
