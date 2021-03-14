<?php


namespace App\PointFunctions;

use App\point\Point;

// BEGIN (write your solution here)
function dup($point)
{
    $copyOfPoint = new Point();
    $copyOfPoint->x = $point->x;
    $copyOfPoint->y = $point->y;

    return $copyOfPoint;
}
// END