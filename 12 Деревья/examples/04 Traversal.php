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

function dfs($tree)
{
    // Распечатываем содержимое узла
    echo getName($tree) . "\n";
    // Если это файл, то возвращаем управление
    if (isFile($tree)) {
        return;
    }

    // Получаем детей
    $children = getChildren($tree);

    // Применяем функцию dfs ко всем дочерним элементам
    // Множество рекурсивных вызовов в рамках одного вызова функции
    // называется древовидной рекурсией
    array_map(fn($child) => dfs($child), $children);
}

function changeOwner($tree, $owner)
{
    $name = getName($tree);
    $newMeta = getMeta($tree);
    $newMeta['owner'] = $owner;

    if (isFile($tree)) {
        return mkfile($name, $newMeta);
    }

    $children = getChildren($tree);
    $newChilren = array_map(function($child) use ($owner) {
        return changeOwner($child, $owner);
    }, $children);

    return mkdir($name, $newChilren, $newMeta);
}

dfs($tree);
print_r(changeOwner($tree, 'Dima'));
// => /
// => etc
// => bashrc
// => consul.cfg
// => hexletrc
// => bin
// => ls
// => cat