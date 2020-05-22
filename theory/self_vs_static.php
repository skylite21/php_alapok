<?php

class Animal {
  private $name = 'Animal';
  private static $age = 3;
  const HEALTH = 100;

  public function eat() {
    echo $this->name . ' is eating' . "\n";
  }

  public function sleep() {
    echo $this->name . ' is sleeping' . "\n";
  }

}

class Dog extends Animal {
  private $name = 'Dog';
  private static $age = 32;
  const HEALTH = 50;

  public function do() {
    echo $this->name . " is doing things\n";
    echo self::$age . " years old\n";
    echo parent::HEALTH . "\n";
  }

}

$rex = new Dog();
$rex->eat();
$rex->sleep();
$rex->do();


class A {

  public static function get_self() {
    // self identifies the class we are in currently.S
    // self is like this, but it's static...
    return new self();
  }

  public static function get_static() {
    // static identifies the caller objects class
    return new static();
  }

}

class B extends A {}

echo get_class(B::get_self()); 
echo get_class(B::get_static());
echo get_class(A::get_self());
echo get_class(A::get_static());
