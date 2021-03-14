<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\getName;

// BEGIN (write your solution here)
function getHiddenFilesCount($node)
{
    $name = getName($node);

    if (isFile($node)) {
        return $name[0] === '.' ? 1 : 0;
    }
    
    $children = getChildren($node);
//    $hiddenElements = array_map(fn($child) => getHiddenFilesCount($child), $children);
//    return array_sum($hiddenElements);
    return array_reduce(
        $children,
        fn($acc, $child) => $acc + getHiddenFilesCount($child)
    );
}
// END


$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache', []),
        mkdir('nginx', [
            mkfile('.nginx.conf', ['size' => 800]),
        ]),
        mkdir('.consul', [
            mkfile('.config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('.hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);


print_r(getHiddenFilesCount($tree)); // 3
