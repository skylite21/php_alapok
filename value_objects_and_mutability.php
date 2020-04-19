<?php

// avoids primitive obsession - and readability
// helps with consistency
// inmutability

// https://wiki.php.net/rfc/static_class_constructor

class Age {
  private $age;

  public function __construct($age) {
    if ($age < 0 || $age > 120) {
      throw new InvalidArgumentException('That makes no sense');
    }

    $this->age = $age;

  }

  public function increment() {
    // mutable object
    // $this->age += 1;
    // inmutable object because it returns a new instance
    return new self($this->age + 1);
  }

  public function get() {
    return $this->age;
  }

}

function register($name, Age $age) {

}

$age = new Age(35);
$age = $age->increment();
var_dump($age->get());

register('John', $age);
