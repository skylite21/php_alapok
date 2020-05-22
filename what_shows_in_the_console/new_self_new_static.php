<?php

class A {

  public static function get_self() {
    return new self();
  }

  public static function get_static() {
    return new static();
  }

}

class B extends A {}

echo get_class(B::get_self()) . "\n";
echo get_class(B::get_static()) . "\n";
echo get_class(A::get_self()) . "\n";
echo get_class(A::get_static()) . "\n";
