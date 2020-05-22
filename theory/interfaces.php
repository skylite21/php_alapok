<?php

/*
 * Object interfaces allow you to create code which specifies which methods a
 * class must implement, without having to define how these methods are
 * implemented.
 */

interface BattleShip {
  /*
   * Methods you declare in Interfaces have to be public. You define a contract
   * with an interface. Any non-public methods would be implementation details
   * and those does not belong into an Interface
   */
  public function attack();

}

interface CargoShip {

  public function loadCargo();

  public function organizeCargo();

}

interface PassengerShip {

  public function addPassengers();

}

/*
 * in PHP you can only extend one base class but you can implement many
 * interfaces.  Allowing multiple interfaces makes them a bit more flexible than
 * abstract classes
 */
class StarDestroyer implements BattleShip, CargoShip, PassengerShip {

  public function attack() {}

  public function loadCargo() {}

  public function organizeCargo() {}

  public function addPassengers() {}

}

$vader_ship = new StarDestroyer();
