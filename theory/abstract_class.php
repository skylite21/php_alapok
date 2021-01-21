<?php

/*
 * abstract class:
 * - cannot be instantiated
 * - does not support multiple inheritance (interface does..)
 * - can contain data members and constructors (interface cant)
 *
 * https://codeinphp.github.io/post/abstract-class-vs-interface/
 */

abstract class Animal {

  // Force Extending class to define this method
  abstract protected function eat();

  // common method
  protected function reproduce() {
  }

}

class Dog extends Animal {

  // must implement
  protected function eat() {
    echo "hello";
  }

  public function bark() {
  }

}
