<?php

// https://designpatternsphp.readthedocs.io/en/latest/Structural/Decorator/README.html

// Purpose: To dynamically add new functionality to class instances.

interface Car {

  public function cost();

  public function description();

}

class Suv implements Car {

  public function cost() {
    return 30000;
  }

  public function description() {
    return "Suv";
  }

}

// this will be our decorator
abstract class CarFeature implements Car {
  protected $car;

  public function __construct(Car $car) {
    $this->car = $car;
  }

  abstract public function cost();

  abstract public function description();

}

class SunRoof extends CarFeature {

  public function cost() {
    return $this->car->cost() + 1500;
  }

  public function description() {
    return $this->car->description() . ",  sunroof";
  }

}

class HighEndWheels extends CarFeature {

  public function cost() {
    return $this->car->cost() + 2000;
  }

  public function description() {
    return $this->car->description() . ",  high end wheels";
  }

}

// Create an object from one of the basic classes.
$basicCar = new Suv();

// Pass the object from the basic class as a parameter to the first feature
// class.
$carWithSunRoof = new SunRoof($basicCar);

// Run the methods on the last object that was created.
echo $carWithSunRoof->description();
echo " costs ";
echo $carWithSunRoof->cost();
echo "\n";


// 1. Create an object from one of the basic classes.
$basicCar = new Suv();

// 2. Pass the object from the basic class as a parameter to the first feature
// class.
$carWithSunRoof = new SunRoof($basicCar);

// 3. Pass the object from the first feature class as a parameter to the second
// feature class.
$carWithSunRoofAndHighEndWheels = new HighEndWheels($carWithSunRoof);

// 4. Run the methods on the last object that was created.
echo $carWithSunRoofAndHighEndWheels->description();
echo " costs ";
echo $carWithSunRoofAndHighEndWheels->cost();
