<?php

/*
 * For a null coalescing operator, the only thing that matters is that the
 * variable exists and is not null so even falsy values are given a pass.
 */

$x = "";
// $x = NULL;
// $x;
// $x = [];
// $x = ['a', 'b'];
// $x = FALSE;
// $x = TRUE;
// $x = 1;
// $x = 0;
// $x = -1;
// $x = '1';
// $x = '0';
// $x = '-1';
// $x = 'random';
// $x = new stdClass();

echo ($x ?: 'hello') . "\n";

echo ($x ?? 'hello');
