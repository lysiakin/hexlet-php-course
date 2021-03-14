<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;

// BEGIN (write your solution here)
function compressImages(array $tree)
{
    $children = getChildren($tree);
    $newChildren = array_map(function ($child){
        $name = getName($child);

        if (!endWith($name) || !isFile($child)) {
            return $child;
        }

        $meta = getMeta($child);
        $meta['size'] /= 2;

        return mkfile($name, $meta);
    }, $children);

    return mkdir(getName($tree), $newChildren, getMeta($tree));
}

function endWith(string $name)
{
    if (stripos($name, '.jpg') !== false){
        return true;
    }
    return false;
}
// END

$tree = mkdir(
    'my documents', [
        mkfile('avatar.jpg', ['size' => 100]),
        mkfile('passport.jpg', ['size' => 200]),
        mkfile('family.jpg',  ['size' => 150]),
        mkfile('addresses',  ['size' => 125]),
        mkdir('presentations')
    ]
);
//print_r($tree);

$newTree = compressImages($tree);
print_r($newTree);
// То же самое, что и tree, но во всех картинках размер уменьшен в два раза
