<?php

//function genDiff(array $arr1, array $arr2): array
//{
//    $merged = array_merge($arr1, $arr2);
//
//    $result = [];
//    foreach ($merged as $key => $value) {
//        if (array_key_exists($key, $arr1) && array_key_exists($key, $arr2)) {
//                if (in_array($value, $arr1, true) && in_array($value, $arr2, true)) {
//                    $result[$key] = 'unchanged';
//                } else {
//                    $result[$key] = 'changed';
//                }
//        } elseif (array_key_exists($key, $arr1)) {
//            $result[$key] = 'deleted';
//        } elseif (array_key_exists($key, $arr2)) {
//            $result[$key] = 'added';
//        }
//    }
//    print_r($result);
//    return $result;
//}

function genDiff2(array $arr1, array $arr2): array
{
    $merged = array_merge(array_keys($arr1), array_keys($arr2));
    print_r($merged);

    $result = [];
    foreach ($merged as $key) {
        if (!array_key_exists($key, $arr1)) {
            $result[$key] = 'added';
        } elseif (!array_key_exists($key, $arr2)) {
            $result[$key] = 'deleted';
        } elseif ($arr1[$key] !== $arr2[$key]) {
            $result[$key] = 'changed';
        } else {
            $result[$key] = 'unchanged';
        }
    }
    print_r($result);
    return $result;
}

//genDiff(['one' => 'eon', 'two' => 'two'], ['two' => 'own', 'one' => 'one']);
genDiff2(['one' => 'eon', 'two' => 'two'], ['two' => 'own', 'one' => 'one']);

/*genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);*/

genDiff2(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);
// [
//   'one' => 'deleted',
//   'two' => 'changed',
//   'four' => 'unchanged',
//   'zero' => 'added',
// ]