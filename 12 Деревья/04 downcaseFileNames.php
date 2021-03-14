<?php

require_once 'lib/php-immutable-fs-trees/src/trees.php';
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getMeta;
use function Php\Immutable\Fs\Trees\trees\getChildren;

// BEGIN (write your solution here)
function downcaseFileNames($tree)
{
    $name = getName($tree);
    $meta = getMeta($tree);

    if (isFile($tree)) {
        $newName = strtolower($name);
        return mkfile($newName, $meta);
    }

    $newChildren = array_map(fn($child) => downcaseFileNames($child), getChildren($tree));

    return mkdir($name, $newChildren, $meta);
}
// END

$tree = mkdir('/', [
    mkdir('eTc', [
        mkdir('NgiNx'),
        mkdir('CONSUL', [
            mkfile('config.json'),
        ]),
    ]),
    mkfile('hOsts'),
]);

print_r(downcaseFileNames($tree));
// [
//      'name' => '/',
//      'type' => 'directory',
//      'meta' => [],
//      'children' => [
//           [
//                'name' => 'eTc',
//                'type' => 'directory',
//                'meta' => [],
//                'children' => [
//                     [
//                          'name' => 'NgiNx',
//                          'type' => 'directory',
//                          'meta' => [],
//                          'children' => [],
//                      ],
//                      [
//                          'name' => 'CONSUL',
//                          'type' => 'directory',
//                          'meta' => [],
//                          'children' => [
//                               [
//                                    'name' => 'config.json',
//                                    'type' => 'file',
//                                    'meta' => [],
//                               ]
//                          ],
//                      ],
//                 ],
//           ],
//           [
//                'name' => 'hosts',
//                'type' => 'file',
//                'meta' => [],
//           ],
//      ],
// ]