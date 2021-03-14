<?php

function average(...$numbers): ?float
{
    if (empty($numbers)) {
        return null;
    }
    return (array_sum($numbers) / count($numbers));
}

average(0); // 0
average(0, 10); // 5
average(-3, 4, 2, 10); // 3.25
average(); // null