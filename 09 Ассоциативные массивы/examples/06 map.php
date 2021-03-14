<?php

// BEGIN
function getIndex($key)
{
    return crc32($key) % 1000;
}

function make()
{
    return [];
}

function hasCollision($map, $key)
{
    $index = getIndex($key);
    [$currentKey] = $map[$index];
    return $currentKey !== $key;
}

function set(&$map, $key, $value)
{
    $index = getIndex($key);
    if (isset($map[$index]) && hasCollision($map, $key)) {
        return false;
    }
    $map[$index] = [$key, $value];
    return true;
}

function get($map, $key, $default = null)
{
    $index = getIndex($key);
    if (!isset($map[$index]) || hasCollision($map, $key)) {
        return $default;
    }
    [, $value] = $map[$index];
    return $value;
}
// END

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
