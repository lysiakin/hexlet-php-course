<?php

function make()
{
    return [];
}

function set(&$map, $key, $value)
{
    $index = crc32($key) % 1000;
//    print_r($map);
//    print_r($index . '\n');
    if (!array_key_exists($index, $map)) {
        $map[$index] = [$key => $value];
        return true;
    } elseif (array_key_exists($key, $map[$index])) {
        $map[$index][$key] = $value;
        return true;
    } else {
        $map[$index][$key] = null;
    }
    return false;
}

function get(&$map, $key, $defaultValue = null)
{
    $index = crc32($key) % 1000;
//    print_r($map[$index]);
    if (array_key_exists($index, $map)) {
        return $map[$index][$key];
    }
    return $defaultValue;
}

$map = make();
$result = get($map, 'key2');
var_dump($result); // => null

//$result = get($map, 'key', 'value');
//var_dump($result); // => value
//
//set($map, 'key2', 'value2');
//$result = get($map, 'key2');
//var_dump($result);
//
//set($map, 'key2', 'another value');
//$result = get($map, 'key2');
//var_dump($result);

set($map, 'aaaaa0.462031558722291', 'vvv');
set($map, 'aaaaa0.0585754039730588', 'boom!');

$result = get($map, 'aaaaa0.462031558722291');
print_r($result);
$result = get($map, 'aaaaa0.0585754039730588');
var_dump($result);

