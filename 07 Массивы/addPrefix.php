<?php

function addPrefix(array $arr, string $prefix): array
{
    for ($i = 0, $lenght = count($arr); $i < $lenght; $i++) {
        $name = $arr[$i];
        $arr[$i] = $prefix . ' ' . $name;
    }
    return $arr;
}

$names = ['john', 'smith', 'karl'];

$newNames = addPrefix($names, 'Mr');
print_r($newNames);
// => ['Mr john', 'Mr smith', 'Mr karl'];