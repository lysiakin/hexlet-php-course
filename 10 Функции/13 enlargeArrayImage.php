<?php
require 'vendor/autoload.php';

function enlargeArrayImage(array $image)
{
    $widther = array_map(function ($item) {
         $r = array_reduce(
            $item,
            function ($acc, $i) {
                   $acc[] = $i;
                   $acc[] = $i;
                return $acc;
            },
            []);
//        print_r($r);
        return $r;
    }, $image);

    $higher = array_reduce(
        $widther,
        function ($acc, $line){
            $acc[] = $line;
            $acc[] = $line;
            return $acc;
        },
        []);
    print_r($higher);
    return $higher;
}

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
