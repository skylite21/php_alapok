<?php

/*
 * it is a good practice to keep the same directory structure as the namespace
 * structure. You don't need to require the php files
 * if you are using autoloading
 */
require_once 'my/vechicles.php';
require_once 'my/spaceships.php';

// a use statement-et már egy konkrét class-ra adjuk meg, ez a 
// Car class-t hozza be
use My\Vechicles\Car;

$mycar = new Car();
echo $mycar->fuel;

// php 7+ esetén nemkell egyessével beírogatni a sorokat ha ugyanbból a
// filebol több class kell:
use My\Spaceships\{ StarDestroyer, TieFighter };

$myship = new StarDestroyer();
echo $myship->power;

// Használhatsz class-t más néven is mint ami eredetileg a neve volt
use My\Spaceships\MillenniumFalcon as MF;

$myMF = new MF();
