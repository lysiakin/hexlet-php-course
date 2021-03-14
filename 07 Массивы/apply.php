<?php

function apply(array $arr, string $operationName, int $index = null, $value = null): array
{
    switch ($operationName) {
        case 'reset':
            $arr = [];
            break;
        case 'remove':
            unset($arr[$index]);
            break;
        case 'change':
            $arr[$index] = $value;
            break;
    }

    return $arr;

}

$cities = ['moscow', 'london', 'berlin', 'porto'];

// Сброс в пустой массив
apply($cities, 'reset'); // []
// удаление значения по индексу
apply($cities, 'remove', 1); // ['moscow', 'berlin', 'porto']
// изменение значения по индексу
apply($cities, 'change', 0, 'miami'); // ['miami', 'london', 'berlin', 'porto']