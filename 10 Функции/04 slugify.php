<?php
require 'vendor/autoload.php';

use Funct\Strings;
use Funct\Collection;

function slugify(string $string)
{
    if (empty($string)) {
        return '';
    }

    $array = explode(' ', $string);
    $newArr = [];

    do {
        $space = false;

        foreach ($array as $key => $value) {
            if ($value != false) {
                $newArr[] = $value;
            }
        }

        if (in_array(' ', $newArr)) {
            $space = true;
        }
    } while ($space);

    return Strings\toLower(implode('-',$newArr));
}



slugify(''); // ''
slugify('test'); // 'test'
slugify('test me'); // 'test-me'
slugify('La La la LA'); // 'la-la-la-la'
slugify('O la      lu'); // 'o-la-lu'
slugify(' yOu   '); // 'you'

//function slugify($text)
//{
//    $prepared = Strings\toLower($text);
//    $parts = explode(' ', $prepared);
//    $parts = Collection\compact($parts);
//    return implode('-', $parts);
//}