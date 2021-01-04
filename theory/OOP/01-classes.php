<?php

/*
 * class names are usually nowns. Example:
 *   Comment, AchivementBadge, Cart, Invoice, etc...
 */

class Project {
  public $title;
  public $description;

  public function close() {
  
  }

  public function add_user() {
  }

}

class Team {
  protected $name;
  protected $members = [];

  public function __construct($name, $members = []) {
    $this->name = $name; 
    $this->members = $members;
  }

  // variable number of arguments... 
  public static function start(... $params) {
    // argument unpacking (spread)
    return new static(... $params);
  }

  // getter
  public function name() {
    return $this->name;
  }

  public function members() {
    return $this->members;
  
  }

  public function add($name) {
    $this->members[] = $name;
  }

}

class Member {
  protected $name;

  public function __construct($name) {
    $this->name = $name; 
  }

  // what they watched recently
  public function last_viewed() {
  
  }

}


$lumen = new Team('Lumen', [
  'John Doe,
  Jane Doe',
]);

$lumen = Team::start('Lumen', [
  'John Doe,
  Jane Doe',
]);

$lumen = Team::start('Lumen', [
  new Member('John Doe'),
  new Member('Jane Doe'),
]);

$webdream = new Team('Webdream');

var_dump($webdream->name());

$webdream->add('John Doe');
$webdream->add('Jane Doe');

var_dump($webdream->members());
var_dump($lumen->members());
