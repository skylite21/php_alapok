<?php 

$a = [3, 4, 5];
echo($a[2]."\n");

$b = [4, 5, 6];
$c = ['a', 2, TRUE];
$d = [[[3, 4], 'hello'], ['foo', ["array", "is", "nested"], TRUE]];

print ($d[0][1]);
print ($d[1][0]);
print ($d[1][1][0]);
