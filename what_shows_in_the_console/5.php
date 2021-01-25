<?php 

$my_arr = ['a','b', 'c', 'd'];

array_pop($my_arr); // O(1);

array_push($my_arr, 'e'); // O(1)
array_unshift($my_arr, 'x'); // O(N)

// offset: ami nulla, azt jelenti hogy hány elemet töröljön
array_splice($my_arr, 2, 0, 'alien'); //ez is O(N) mert a legrosszabb esetet kell nézeni...

var_dump($my_arr);

