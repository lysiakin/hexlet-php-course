<?php


namespace App\PointFunctions;

use App\Point;

require __DIR__.'/../vendor/autoload.php';

// BEGIN (write your solution here)
function dup($point)
{
    $copyOfPoint = new Point();
    $copyOfPoint->x = $point->x;
    $copyOfPoint->y = $point->y;

    return $copyOfPoint;
}
// END

$point1 = new Point();
var_dump($point1);

$point2 = dup($point1);
var_dump($point1);

$a = $point1 == $point2; // true
$b = $point1 === $point2; // false

         var_dump($a);
         var_dump($b);