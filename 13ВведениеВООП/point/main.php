<?php

require __DIR__.'/../../vendor/autoload.php';

use App\point\Point;
use function App\PointFunctions\dup;

$point1 = new Point();
var_dump($point1);

$point2 = dup($point1);
var_dump($point1);

$a = $point1 == $point2; // true
$b = $point1 === $point2; // false

var_dump($a);
var_dump($b);
