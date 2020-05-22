<?php

class Solution {

  public static $count;

  public static function getCount() {
    /*
     * $this refers to the current object
     * self refers to the current class.
     */
    return self::$count++;
  }

}

/*
 * SideNote: PHP is case insensitive for the class naming. it means you can
 * normally do $file = new file() even if the class is named File and
 * vice-versa.
 */
solution::$count = 1;

for ($i = 0; $i < 5; ++$i) {
  echo 'The next value is: ' . solution::getCount() . "\n";
}

// ez a jelenség nagyon hasonló ahhoz amit JS-ben closure-nek hívunk...
