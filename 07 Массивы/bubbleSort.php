<?php

function bubbleSort(array $array): array
{
    if (empty($array)) {
        return [];
    }

    do {
        $swap = false;

        for ($i = 0; $i < count($array) - 1; $i++) {
            if ($array[$i] > $array[$i + 1]) {

//                $temp = $array[$i];
//                $array[$i] = $array[$i +1];
//                $array[$i + 1] = $temp;

                [$array[$i], $array[$i + 1]] = [$array[$i + 1], $array[$i]];  // Одно и то же, что и способ с временной переменной

                $swap = true;
            }
        }
    } while ($swap);

    return $array;
}

bubbleSort([]); // []
print_r(bubbleSort([3, 10, 4, 3])); // [3, 3, 4, 10]