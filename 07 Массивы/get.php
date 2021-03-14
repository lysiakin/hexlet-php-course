<?php

function get(array $arr, int $index, $value = null)
{
    return (array_key_exists($index, $arr)) ? $arr[$index] : $arr[$index] = $value;
}

$cities = ['moscow', 'london', 'berlin', 'porto', null];

echo get($cities, 1); // london
echo get($cities, 10, 'paris'); // paris
echo get($cities, 4); // null
echo get($cities, 4, 'default'); // null