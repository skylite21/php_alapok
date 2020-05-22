<?php

// https://www.php.net/manual/en/language.oop5.late-static-bindings.php
// a static keyword funciton-re meg propertyre ugyanaz mint eddig, de static::
// -ként használva late static binding.

class A {

  public static function foo() {
    /*
     * Late static bindings' resolution will stop at a fully resolved static
     * call with no fallback. On the other hand, static calls using keywords
     * like
     * parent:: or self:: will forward the calling information.
     */
    static::who();
    /*
     * ha itt self-et használnánk az mindig A-t jelentene, no matter what.
     * ha viszont static::-ot hasznnálunk akkor a late static binding miatt
     * ez mindíg A kontextusa lesz.
     */
  }

  public static function who() {
    echo __CLASS__ . "\n";
  }

}

class B extends A {

  public static function test() {
    A::foo();
    parent::foo();
    self::foo();
  }

  public static function who() {
    echo __CLASS__ . "\n";
  }

}

class C extends B {

  public static function who() {
    echo __CLASS__ . "\n";
  }

}

// ha C-n hivjuk meg a static function-t akkor a self, és a parent is C-nek a
// kontextusát fogja jelenteni
C::test();
