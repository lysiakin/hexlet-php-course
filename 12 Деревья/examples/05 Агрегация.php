<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;

$tree = mkdir('/', [
    mkdir('etc', [
        mkfile('bashrc'),
        mkfile('consul.cfg'),
    ]),
    mkfile('hexletrc'),
    mkdir('bin', [
        mkfile('ls'),
        mkfile('cat'),
    ]),
]);

// В реализации используем рекурсивный процесс,
// чтобы добраться до самого дна дерева.
function getNodesCount($tree)
{
    if (isFile($tree)) {
        // Возвращаем 1, для учета текущего файла
        return 1;
    }

    // Если узел — директория, получаем его детей
    $children = getChildren($tree);
    // Самая сложная часть
    // Считаем количество потомков, для каждого из детей,
    // вызывая рекурсивно нашу функцию getNodesCount
    $descendantsCount = array_map(fn($child) => getNodesCount($child), $children);
    // Возвращаем 1 (текущая директория) + общее количество потомков
    return 1 + array_sum($descendantsCount);
}

print_r(getNodesCount($tree)); // 8
