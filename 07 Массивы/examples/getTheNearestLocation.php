<?php

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;

    $xs = $x2 - $x1;
    $ys = $y2 - $y1;

    return sqrt($xs ** 2 + $ys ** 2);
}

// BEGIN
function getTheNearestLocation(array $locations, array $currentPoint)
{
    if (count($locations) === 0) {
        return null;
    }

    [$nearestLocation] = $locations;
    [, $nearestPoint] = $nearestLocation;
    $lowestDistance = getDistance($currentPoint, $nearestPoint);

    foreach ($locations as $location) {
        [, $point] = $location;
        $distance = getDistance($currentPoint, $point);

        if ($distance < $lowestDistance) {
            $lowestDistance = $distance;
            $nearestLocation = $location;
        }
    }

    return $nearestLocation;
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
