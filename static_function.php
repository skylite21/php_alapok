<?php

// https://www.geeksforgeeks.org/static-function-in-php/
/* Use static function as a counter */

class Solution {

  public static $count;

  public static function getCount() {
    return self::$count++;
  }

}

// PHP is case insensitive for the class naming. it means you can normally
// do $file = new file() even if the class is named File and vice-versa.
solution::$count = 1;

for ($i = 0; $i < 5; ++$i) {
  echo 'The next value is: ' . solution::getCount() . "\n";
}
