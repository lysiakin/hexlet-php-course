<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getChildren;

// BEGIN (write your solution here)
function findFilesByName(array $tree, string $substring, array $path = [])
{
    $name = getName($tree);
    $path[] = $name === '/' ? '' : $name;

    if (isFile($tree)) {
        return strpos($name, $substring) !== false ? [implode('/', $path)] : [];
    }

    return array_reduce(
        getChildren($tree),
        function($acc, $child) use ($substring, $path) {
            return array_merge($acc, findFilesByName($child, $substring, $path));
        },
        []);
}
// END

$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache'),  // Лишний
        mkdir('nginx', [
            mkfile('nginx.conf', ['size' => 800]),  // +++
        ]),
        mkdir('consul', [
            mkfile('config.json', ['size' => 1200]),  //  +++ Путь к нему - / etc apache nginx nginx.conf consul config.json
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);
print_r(findFilesByName($tree, 'co'));
// ['/etc/nginx/nginx.conf', '/etc/consul/config.json']

