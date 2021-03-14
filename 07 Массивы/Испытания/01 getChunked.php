<?php

//Чанкованием (от англ. Chunk — ячейка, кусок, осколок) в программировании называют разбиение коллекции (массива) на несколько более мелких коллекций. Например, разобьём массив на чанки, так чтобы в каждом чанке было не более двух элементов: ['a', 'b', 'c', 'd'] -> [['a', 'b'], ['c', 'd']].
//Реализуйте функцию getChunked, которая принимает на вход массив и число, задающее размер чанка (куска). Функция должна вернуть массив, состоящий из чанков указанной размерности.

function getChunked(array $arr, int $chunkSize): array
{
    $indexCounter = 0;
    $chunkCounter = 0;
    $result = [];

    foreach ($arr as $item) {
        if ($chunkCounter == $chunkSize) {
            $chunkCounter = 0;
            $chunkCounter++;
            $indexCounter++;
            $result[$indexCounter][] = $item;
        } else {
            $result[$indexCounter][] = $item;
            $chunkCounter++;
        }
    }
    print_r($result);
    return $result;
}

getChunked(['a', 'b', 'c', 'd'], 2);
// → [['a', 'b'], ['c', 'd']]

getChunked(['a', 'b', 'c', 'd'], 3);
// → [['a', 'b', 'c'], ['d']]

getChunked(['a', 'b', 'c', 'd', 'e', 'f'], 2);
// → [[['a', 'b'], ['c', 'd'], ['e', 'f']];