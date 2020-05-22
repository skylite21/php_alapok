<?php

function generate_user_id() {
  return rand();
}

$user_id = 1;

echo "\nusing the elvis operator:";
echo $user_id ?: generate_user_id();

echo "\nusing the ternary operator:";
echo $user_id ? $user_id : generate_user_id();

echo "\nusing if/else:";
if ($user_id) {
  echo $user_id;
}
else {
  echo generate_user_id();
}

echo "\nregular if/else:";
$y = 4;
// as an if statement:
if (isset($x)) {
  echo $x;
}
else {
  echo $y;
}

echo "\nor, as ternary operator: ";
echo (isset($x) ? $x : $y);

echo "\nsame as the previous but with null coalescing operator: ";
echo $x ?? $y;

/*
 * For a null coalescing operator, the only thing that matters is that the
 *   variable exists and is not null so even falsy values are given a pass.
 */

/*
 * // Null Coalescing Assignment Operator PHP 7.4+
 * $x = (isset($x) ? $x : $y);
 *
 * $x = $x ?? $y;
 *
 * $x ??= $y;
 */
