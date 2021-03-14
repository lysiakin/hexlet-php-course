<?php

require __DIR__.'/../../vendor/autoload.php';

use App\encapsulation\Rational;

$rat1 = new Rational(3, 9);
$rat1->getNumer(); // 3
$rat1->getDenom(); // 9
var_dump($rat1);

$rat2 = new Rational(10, 3);
var_dump($rat2);

$rat3 = $rat1->add($rat2); // Абстракция для рационального числа 99/27
$rat3->getNumer(); // 99
$rat3->getDenom(); // 27
var_dump($rat3);

$rat4 = $rat1->sub($rat2); // Абстракция для рационального числа -81/27
$rat4->getNumer(); // -81
$rat4->getDenom(); // 27
var_dump($rat4);

