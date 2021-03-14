<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\reduce;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\isFile;

// BEGIN (write your solution here)
function countSizeOfFiles(array $node)
{
    $meta = getMeta($node);
    if (isFile($node)) {
        return $meta['size'];
    }

    return array_reduce(
        getChildren($node),
        fn($acc, $child) => $acc + countSizeOfFiles($child),
        0);
}

function du(array $tree)
{
    $res = array_map(
        fn($child) => [getName($child), countSizeOfFiles($child)],
        getChildren($tree));
    usort($res, fn($a, $b) => $b[1] <=> $a[1]);
    
    return $res;
}
// END

$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache'),
        mkdir('nginx', [
            mkfile('nginx.conf', ['size' => 800]),
        ]),
        mkdir('consul', [
            mkfile('config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);

//print_r(countSizeOfFiles($tree)[0]);

//print_r(du($tree));
// [
//     ['etc', 10280],
//     ['hosts', 3500],
//     ['resolve', 1000],
// ]

(print_r(du(getChildren($tree)[0])));
// [
//    ['consul', 9480],
//    ['nginx', 800],
//    ['apache', 0],
// ]

