<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\reduce;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\getChildren;

// BEGIN
function calculateFilesSize($node)
{
    return reduce(function ($acc, $n) {
        if (isDirectory($n)) {
            return $acc;
        }

        $meta = getMeta($n);

        return $acc + $meta['size'];
    }, $node, 0);
}

function du($node)
{
    $result = array_map(fn($node) => [
        getName($node), calculateFilesSize($node)
    ], getChildren($node));

    usort($result, fn($arr1, $arr2) => $arr2[1] <=> $arr1[1]);

    return $result;
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

print_r(du($tree));
// [
//     ['etc', 10280],
//     ['hosts', 3500],
//     ['resolve', 1000],
// ]