<?php
require 'vendor/autoload.php';

use function Funct\Collection\flatten;

// BEGIN
function duplicateEach(array $items)
{
    return flatten(
        array_map(fn($item) => [$item, $item], $items)
    );
}

function enlargeArrayImage($matrix)
{
    $horizontallyStretched = array_map(fn($col) => duplicateEach($col), $matrix);
    return duplicateEach($horizontallyStretched);
}
// END

$image = [
    ['*','*','*','*'],
    ['*',' ',' ','*'],
    ['*',' ',' ','*'],
    ['*','*','*','*']
];
// ****
// *  *
// *  *
// ****

enlargeArrayImage($image);
// ********
// ********
// **    **
// **    **
// **    **
// **    **
// ********
// ********
