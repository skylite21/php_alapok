<?php 

error_reporting(E_ALL & ~E_NOTICE);

echo ('2' + 2);
echo ("\n");
$a = var_dump('hello');
echo $a;

echo ("3\n");
echo (false);
$b = 5 * "10 little piggies";
echo $b."\n";

// check the type!
echo gettype($b);

// casting!
$c = '3';
5 + (int)$c;

// An expression evaluates to a value. A statement does something.
10 + 10;
echo 10;

// foo = 1+3 is NOT an expression. It is a statement (an assignment to be
// precise). The part 1+3 is an expression
$foo = 1+3
