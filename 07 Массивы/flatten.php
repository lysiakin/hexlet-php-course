<?php

function flatten(array $array): array
{
    if (empty($array)) {
        return [];
    }

    $newArray = [];
    foreach ($array as $item) {
        if (is_array($item)) {
            $newArray = [...$newArray, ...$item];
        } else {
            $newArray[] = $item;
        }
    }
    print_r($newArray);

    return $newArray;
}

// Для пустого массива возвращается []
//flatten([]); // []
flatten([1, [3, 2], 9]); // [1, 3, 2, 9]
flatten([1, [[2], [3]], [9]]); // [1, [2], [3], 9]