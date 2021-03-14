<?php

function isContinuousSequence(array $arr): ?bool
{
    $length = count($arr);
    if ($length <= 1) {
        return false;
    }

    $lastIndex = array_key_last($arr);
    $returnValue = null;

    foreach ($arr as $key => $value) {
        if (($key < $lastIndex) && ($arr[$key + 1] - $value === 1)) {
            $returnValue = true;
        } else {
            return false;
        }
    }
    return $returnValue;
}

//isContinuousSequence([10, 11, 12, 13]);     // true
isContinuousSequence([10, 11, 12, 14, 15]); // false
//isContinuousSequence([1, 2, 2, 3]);         // false
//isContinuousSequence([]);                   // false

//// BEGIN
//function isContinuousSequence($coll)
//{
//    if (count($coll) <= 1) {
//        return false;
//    }
//    $start = $coll[0];
//    foreach ($coll as $i => $item) {
//        if ($start + $i !== $item) {
//            return false;
//        }
//    }
//
//    return true;
//}
//// END