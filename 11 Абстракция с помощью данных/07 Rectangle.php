<?php

require_once 'import/05 Points.php';
//namespace App\Rectangle;

//use function App\Points\makeDecartPoint;
//use function App\Points\getX;
//use function App\Points\getY;
//use function App\Points\getQuadrant;

function makeRectangle(array $point, $width, $height)
{
    if ($height <= 0 || $width <= 0)
    {
        return null;
    }
    
    return [
        'point' => $point,
        'height' => $height,
        'width' => $width
    ];
}

function getStartPoint(array $rectangle)
{
    return $rectangle['point'];
}

function getWidth(array $rectangle)
{
    return $rectangle['width'];
}

function getHeight(array $rectangle)
{
    return $rectangle['height'];
}

function getOpposite($rectangle)
{
    $startPoint = getStartPoint($rectangle);
    $h = getHeight($rectangle);
    $w = getWidth($rectangle);

    return ['x' => getX($startPoint) + $w, 'y' => getY($startPoint) - $h];
}

function containsOrigin($rectangle)
{
    $startPoint = getStartPoint($rectangle);
    $oppositePoint = getOpposite($rectangle);

    return getQuadrant($startPoint) === 2 && getQuadrant($oppositePoint) === 4;
}

// Создание прямоугольника:
// p - левая верхняя точка
// 4 - ширина
// 5 - высота
//
// p    4
// -----------
// |         |
// |         | 5
// |         |
// -----------

$p = makeDecartPoint(0, 1);
$rectangle = makeRectangle($p, 4, 5);

var_dump(containsOrigin($rectangle)); // false

$rectangle2 = makeRectangle(makeDecartPoint(-4, 3), 5, 4);
var_dump(containsOrigin($rectangle2)); // true

$p2 = makeDecartPoint(-4, 3);
$rectangle3 = makeRectangle($p2, 2, 2);
var_dump(containsOrigin($rectangle3));  // false
