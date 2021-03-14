<?php

function getSameCount(array $array1, $array2): int
{
    if(empty($array1) || empty($array2)) {
        return 0;
    }

    $sameValues = [];
    $optimizedArray = array_unique($array1);

    foreach ($optimizedArray as $item) {
        if(in_array($item, $array2, true)) {
            $sameValues[] = $item;
        }
    }
    return count($sameValues);
}

//echo getSameCount([], []); // 0
//echo getSameCount([0], ['one', 'two']);
//echo getSameCount([5, 3, 3], ['one', 'two']);
echo getSameCount([4, 4], [4, 4]); // 1
echo getSameCount([1, 10, 3], [10, 100, 35, 1]); // 2
echo getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // 3

//// BEGIN
//function getSameCount($coll1, $coll2)
//{
//    $count = 0;
//    $uniqColl1 = array_unique($coll1);
//    $uniqColl2 = array_unique($coll2);
//    foreach ($uniqColl1 as $item1) {
//        foreach ($uniqColl2 as $item2) {
//            if ($item1 === $item2) {
//                $count++;
//            }
//        }
//    }
//
//    return $count;
//}
//// END