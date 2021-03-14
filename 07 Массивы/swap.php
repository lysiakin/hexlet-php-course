<?php

function swap(array $arr, int $index): array
{
    if (array_key_first($arr) === $index || (count($arr) - 1) === $index) {
        return $arr;
    }

    $lenght = count($arr);
    $maxIndex = floor($lenght / 2);

    for ($i = 0; $i < $maxIndex; $i++) {
        $mirrorIndex = $lenght - $i - 1;
        $temp = $arr[$mirrorIndex];
        $arr[$mirrorIndex] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}

$names = ['john', 'smith', 'karl'];

$result = swap($names, 1);
print_r($result); // => ['karl', 'smith', 'john']

$result = swap($names, 2);
print_r($result); // => ['john', 'smith', 'karl']

$result = swap($names, 0);
print_r($result); // => ['john', 'smith', 'karl']

