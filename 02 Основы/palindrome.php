<?php

function isPalindrome($string)
{
    $firstPart = floor(strlen($string) / 2);

    $secondHalf = '';

    $middleSymbol = ceil(strlen($string) / 2);

    $firstHalf = substr($string, 0, $firstPart);

    if (strlen($string) % 2 === 0) {
        for ($i = -1; $i >= -$middleSymbol; $i--) {
            $secondHalf .= substr($string, $i, 1);
        }
    } else {
        for ($i = -1; $i > -$middleSymbol; $i--) {
            $secondHalf .= substr($string, $i, 1);
        }
    }

    return $firstHalf === $secondHalf;
}

echo isPalindrome('radar'); // true
echo isPalindrome('maam'); // true
echo isPalindrome('a');     // true
echo isPalindrome('abs');   // false