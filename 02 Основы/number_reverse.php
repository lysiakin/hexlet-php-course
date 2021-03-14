<?php

function reverse(int $number): int
{
    $rev = (int) strrev($number);
    if ($number < 0){
        $rev *= (-1);
    }
    return $rev;
}

echo reverse(13); // 31
echo reverse(-123); // -321                       