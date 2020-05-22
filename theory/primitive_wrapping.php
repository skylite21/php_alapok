<?php

/*
 * Akkor érdemes primitive-et használni ha:
 * 1. Olvashatóbb lesz tőle a kód
 * 2. Akarunk egyedi működést a primitive-nek
 * 3. Konzisztenciát akarunk
 * 4. Komplexebb adatunk van, (pl koordináták(longitude latitude)
 *    pl validáció (email class...) szükséges
 */


/*
 * van egy Car class-unk és példányosítani akarjuk.
 * itt a price lesz a constructor paraméter,
 *
 * $myCar = new Car(100);
 *
 * itt a paraméter nem túl bő beszédű, nem egyértelmű
 * hogy mi az a 100 lehetne akár kilóméter is...
 * de akár csinálhatnánk hozzá egy saját típust is:
 */

class Price {
  protected $price;
  public $currency;

  public function __construct(int $price) {
    $this->price = $price;
  }

  public function gross_price() {
    return $this->price * 1.27;
  }

  public function get_tax() {
    return $this->gross_price() - $this->price;
  }

  // A named constructor is just a static factory method on a class
  public static function from_gross_price(int $price) {
    /*
     * ha return new static(...) -ot használunk akkor
     * nem az eredeti price-ot módosítja hanem azt eldobja
     * és vissza ad egy teljesen újat: immutability
     */
    return new static($price / 1.27);
    // if there is no inheritance involved, this will do the same thing:
    // return new self($price / 1.27);

    // ez lenne ha nem immutable:
    // $this->price = $price / 1.27;
  }

}

class Car {

  // php 7.4-be lehet typed property is
  // public Price $price;

  // public function __construct($plate) {
  //   $this->plate = $plate;
  //   $this->price = new Price(100);
  // }

  public function __construct(Price $price) {
    $this->price = $price;
  }

  public function get_price() {
    return $this->price;
  }

}

/*
 * ha csak 100 lenne itt akkor nem lenne egyértelmű hogy ez micsoda. Lehetne
 * price, de pl lehetne km is vagy bármi más. Ha primitive-et használunk hozzá
 * akkor ez egy jóval szebb olvashatóbb kódot eredményez:
 */
$myCar = new Car(new Price(100));

/*
 * using a named constructor: ez csak annyi hogy egy static method fogja vissza
 * adni nekünk az object-et, tehát lényegében ez egy constructor csak szép neve
 * van.
 */
$myOtherCar = new Car(Price::from_gross_price(127));
echo $myOtherCar->get_price()->get_tax();


/*
 * dont go crazy with primitive wrapping!
 * ne legyen túl sok instance variable!! általában 2-3 max
 * 6-7 instance variable: code smell *nem feltétlenül kötelező csökkenteni
 * de ha sok van akkor esetleg el lehet gondolkodni
 * hogy hogyan lehetne csökkenteni
 */
