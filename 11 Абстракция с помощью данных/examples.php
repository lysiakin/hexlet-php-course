<?php

namespace App\Segments;

use function App\Points\makeDecartPoint;
use function App\Points\getX;
use function App\Points\getY;

function makeSegment($point1, $point2)
{
    return ['beginPoint' => $point1, 'endPoint' => $point2];
}

function getBeginPoint($segment)
{
    return $segment['beginPoint'];
}

function getEndPoint($segment)
{
    return $segment['endPoint'];
}

function getMidpointOfSegment($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);

    $x = (getX($beginPoint) + getX($endPoint)) / 2;
    $y = (getY($beginPoint) + getY($endPoint)) / 2;

    return makeDecartPoint($x, $y);
}

$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));

getMidpointOfSegment($segment); // (1.5, 1)
getBeginPoint($segment); // (3, 2)
getEndPoint($segment); // (0, 0)