<?php

// BEGIN
function getChunked(array $array, int $size)
{
    $result = [];
    for ($i = 0, $length = count($array); $i < $length; $i += $size) {
        $result[] = array_slice($array, $i, $size);
    }

    return $result;
}
// END

getChunked(['a', 'b', 'c', 'd'], 2);
// → [['a', 'b'], ['c', 'd']]

getChunked(['a', 'b', 'c', 'd'], 3);
// → [['a', 'b', 'c'], ['d']]

getChunked(['a', 'b', 'c', 'd', 'e', 'f'], 2);
// → [[['a', 'b'], ['c', 'd'], ['e', 'f']];
