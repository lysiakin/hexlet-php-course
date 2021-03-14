<?php

function getSameParity(array $arr): array
{
    if (empty($arr)) {
        return [];
    }

    $newArr = [];
    $firstKey = $arr[0] % 2 === 0;
     var_dump($firstKey);
    foreach ($arr as $item) {
        if ($firstKey === true) {
            if (($item % 2) === 0) {
                $newArr[] = $item;
            }
        } else {
            if (($item % 2) !== 0) {
                $newArr[] = $item;
            }
        }
    }
    print_r($newArr);
    return $newArr;
}

getSameParity([]);        // []
getSameParity([1, 2, 3]); // [1, 3]
getSameParity([1, 2, 8]); // [1]
getSameParity([2, 2, 8]); // [2, 2, 8]

//// BEGIN
//function getSameParity($coll)
//{
//    if (empty($coll)) {
//        return [];
//    }
//
//    $result = [];
//    $remainder = $coll[0] % 2;
//    foreach ($coll as $item) {
//        if ($item % 2 === $remainder) {
//            $result[] = $item;
//        }
//    }
//
//    return $result;
//}
//// END