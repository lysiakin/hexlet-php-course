<?php

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;

    $xs = $x2 - $x1;
    $ys = $y2 - $y1;

    return sqrt($xs ** 2 + $ys ** 2);
}

function getTheNearestLocation(array $locations, array $point): ?array
{
    if (empty($locations) || empty($point)) {
        return null;
    }

    $distance = [];
    foreach ($locations as $location) {
        [, $pointTo] = $location;
        $distance[] = getDistance($pointTo, $point);
    }

    $smallest = array_search(min($distance), $distance);
    $location = $locations[$smallest];

    return $location;
}

$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

$currentPoint = [5, 5];


// Если точек нет, то возвращается null
getTheNearestLocation([], $currentPoint); // null

getTheNearestLocation($locations, $currentPoint); // ['Museum', [8, 4]]
