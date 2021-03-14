<?php

function without(array $list, ...$exclude)
{
    $filtered = array_filter($list, fn($item) => !in_array($item, $exclude));
    return array_values($filtered); // Стрелочная функция сразу умеет брать извне
}

function without2(array $list, ...$exclude) // С полным синтаксисом замыкания для явной его демоснтрации
{
    $filtered = array_filter($list, function ($item) use ($exclude) {  // use (..) - замыкание, проброс переменной извне
        return !in_array($item, $exclude);
    });
    return array_values($filtered);
}

without([3, 4, 10, 4, 'true'], 4); // [3, 10, 'true']
without(['3', 2], 0, 5, 11); // ['3', 2]
