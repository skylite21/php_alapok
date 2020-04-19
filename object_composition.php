<?php

/**
  Class name subscribe: az inkább fügvénynévnek jó,
  de a class-névnek inkább Subscription...

 **/


class Subscription {

  // php 7.4 alatt igy kell:
  // protected $gateway;

  // php 7.4-ben lehet typed property class is vagy interface
  // ez csak azért jön jól hogy ne tudjunk pl $this->gateway = 4;et csinálni
  // If you dont' declare properties, your code 1. will be slower. 2. all
  // properties will be public. Dynamically declaring properties
  // is an expensive operation
  protected Gateway $gateway;

  /**
   * __construct
   *
   * @param Gateway $gateway
   */
  public function __construct(Gateway $gateway) {
    $this->gateway = $gateway;
  }

  // van egy Subscription class-unk ezekkel a metódusokkal:
  public function create() {

  }

  public function cancel() {
    // api request is needed, and we're using an external api like mailchimp
    // find the customer
    $this->gateway->find_subscription_by_customer();
  }

  public function invoice() {

  }

  public function swap($newPlan) {

  }

  // ide betehetnénk protected metódusként a mailchimpel kapcsolatos
  // dolgokat de az nem túl bővíthető így:
  // protected function find_mailchip_customer() {
  //
  // }
  //
  // protected function find_mailchimp_subscribtion_by_customer () {
  //
  // }

}

// csinálhatnánk egy subclass-t és itt is lehetne a mailchimp-es téma
class MailchipSubscription extends Subscription {
  // protected function find_mailchip_customer() {
  //
  // }
  //
  // protected function find_mailchimp_subscribtion_by_customer () {
  //
  // }

}

// minden gatewaynek ezeket kell tudnia:
interface Gateway {

  public function find_customer();

  public function find_subscription_by_customer();

}


// object composition: compining types to build up a more complex objects
// one class has a pointer to another class
// ha object compositiont használunk akkor a különböző subcription
// gatway-eket gatway-ként használjuk a Subscription class-ban.
class MailchimpGateway implements Gateway {

  public function find_customer() {

  }

  public function find_subscription_by_customer() {

  }

}

$a = new Subscription(new MailchimpGateway());
$a->cancel();
