<?php
namespace App\Segments;

use function App\Points\makeDecartPoint;
use function App\Points\getX;
use function App\Points\getY;

function makeSegment(array $point1, array $point2): array
{
    return [
        'beginPoint' => [
            'x' => $point1['x'],
            'y' => $point1['y']
        ],
        'endPoint' => [
            'x' => $point2['x'],
            'y' => $point2['y']
        ]
    ];
}

function getMidpointOfSegment(array $point): array
{
    $midBeginPoint = ($point['beginPoint']['x'] + $point['endPoint']['x']) / 2;
    $midEndPoint = ($point['beginPoint']['y'] + $point['endPoint']['y']) / 2;

    return [
        'x' => $midBeginPoint,
        'y' => $midEndPoint
    ];
}

function getBeginPoint(array $point): array
{
    return [
        'x' => $point['beginPoint']['x'],
        'y' => $point['beginPoint']['y']
    ];
}

function getEndPoint(array $point): array
{
    return [
        'x' => $point['endPoint']['x'],
        'y' => $point['endPoint']['y']
    ];
}

$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));

getMidpointOfSegment($segment); // (1.5, 1)
getBeginPoint($segment); // (3, 2)
getEndPoint($segment); // (0, 0)