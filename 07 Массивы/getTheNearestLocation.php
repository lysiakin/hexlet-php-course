<?php
function getDistance(array  $locations, array $point)
{
    $differences = [];
    [$firstPoint, $secondPoint] = $point;
    $currPointDistance = $firstPoint + $secondPoint;

    foreach ($locations as [, [$x, $y]]) {
//        print_r([$x, $y]) ;
        $distanceToLocation = $x + $y;
//        print_r($distanceToLocation);
        $expression = $currPointDistance - $distanceToLocation;
        $differences[] = $expression < 0 ? $expression * (-1) : $expression ;
    }
//    print_r($differences);
//    print_r(min($differences));
//    print_r(array_search(min($differences), $differences));
    return array_search(min($differences), $differences);
}

function getTheNearestLocation(array  $locations, array $point): ?array
{
    if (empty($locations) || empty($point)) {
        return null;
    }

    $whichLocation = getDistance($locations, $point);
    $location = $locations[$whichLocation];
    print_r($location);
    return $location;
}

$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

$currentPoint = [5, 5];

//getDistance ($locations, $currentPoint);

// Если точек нет, то возвращается null
getTheNearestLocation([], $currentPoint); // null

getTheNearestLocation($locations, $currentPoint); // ['Museum', [8, 4]]
