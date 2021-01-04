<?php

class CoffeeMaker {

  public function brew() {
    var_dump('Brewing the coffee');
  }
  
  // standard coffeMaker can't brew latte...
}


(new CoffeeMaker())->brew();

class SpecialtyCoffeeMaker extends CoffeeMaker {

  public function brewLatte() {
    var_dump('Brewing a latte');
  }

}
