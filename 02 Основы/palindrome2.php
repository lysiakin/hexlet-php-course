<?php

function isPalindrome($string)
{
    $length = strlen($string);

    for ($i = 0, $j = $length - 1; $i < $length; $i++, $j--) {
        if ($string[$i] != $string[$j]) {
            return false;
        }
    }

    return true;
}

echo isPalindrome('radar'); // true
echo isPalindrome('maam'); // true
echo isPalindrome('a');     // true
echo isPalindrome('abs');   // false