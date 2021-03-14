<?php

function getIntersectionOfSortedArray(array $arr1, array $arr2): array
{
    if (empty($arr1) || empty($arr2)) {
        return [];
    }

//    $res = [];
//    $index = 0;
//    do {
//        $identifier = false;
////        for ($i = $indexOne, $j = count($arr1), $len2 = count($arr2); $i < $j, $j < $len2; $i++, $j++) {
////            switch ($arr1[$i] <=> $arr2[$i]) {
////                case 1:
////                    $indexOne++;
////                    break;
////                case -1:
////                    $indexTwo++;
////                    break;
////                case 0:
////                    $res[] = $arr1[$i];
////                }
//        for ($i = $index, $len1 = count($arr1); $i < $len1; $i++) {
//            if (in_array($arr1[$i], $arr2)) {
//                $res[] = $arr1[$i];
//                $index++;
//                continue;
//            }
//            $index++;
//            $identifier = true;
//        }
//
//    } while ($identifier);
    $len1 = count($arr1);
    $len2 = count($arr2);

    $res = [];
    $index = 0;
    $index2 = 0;
    
    while ($index < $len1 && $index2 < $len2) {
            if ($arr1[$index] === $arr2[$index]) {
                $res[] = $arr1[$index];
                $index++;
                $index2++;
            } elseif ($arr1[$index] > $arr2[$index]) {
                $index2++;
            } else {
                $index++;
            }
    }

    return $res;
}

print_r(getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30])); // [10, 24]

//print_r(getIntersectionOfSortedArray([10, 11, 24], [-2, 3, 4])); // []
//
//getIntersectionOfSortedArray([], [2]); // []