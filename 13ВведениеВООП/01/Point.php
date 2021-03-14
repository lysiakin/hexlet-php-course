<?php

//namespace App;

class Point
{
    public $x;
    public $y;
}

function getMidpoint($point1, $point2)
{
    $midpoint = New Point();
    $midpoint->x = ($point1->x + $point2->x) / 2;
    $midpoint->y = ($point1->y + $point2->y) / 2;

    return $midpoint;
}