<?php

class Beeing {
  const LIFE = 4;

}


class Animal extends Beeing {
  const LIFE = 3;

  public static function eat() {
    echo self::LIFE;
    echo parent::LIFE;
    echo static::LIFE . "\n";
  }

  public function sleep() {
    echo self::LIFE;
    echo parent::LIFE;
    echo $this::LIFE;
    echo static::LIFE . "\n";

  }

}


class Dog extends Animal {
  const LIFE = 2;

}

$a = new Animal();
$a->sleep();

Animal::eat();
Dog::eat();
