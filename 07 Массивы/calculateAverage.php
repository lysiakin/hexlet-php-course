<?php

function calculateAverage(array $arr): float
{
    if (empty($arr)) {
        return 0;
    }

    $size = count($arr);
    $max = 0;

    foreach ($arr as $key => $value) {
        $max = $max + $value;
    }
    return $max / $size;
}

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

echo calculateAverage($temperatures); // 38.5

//// BEGIN
//function calculateAverage($coll)
//{
//    if (empty($coll)) {
//        return 0;
//    }
//
//    $sum = 0;
//    foreach ($coll as $item) {
//        $sum += $item;
//    }
//
//    return $sum / count($coll);
//}
//// END