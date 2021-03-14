<?php

function removeFirstLevel(array $tree): array
{
    $fn = function ($element) {
        return is_array($element);
    };

    $filtered = array_filter($tree, $fn);
    return array_merge(...$filtered);

}

// Второй уровень тут: 5, 3, 4
$tree1 = [[5], 1, [3, 4]];
removeFirstLevel($tree1); // [5, 3, 4]

$tree2 = [1, 2, [3, 5], [[4, 3], 2]];
removeFirstLevel($tree2); // [3, 5, [4, 3], 2]