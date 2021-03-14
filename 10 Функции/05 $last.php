<?php

function run(string $text)
{
    // BEGIN (write your solution here)
    $last = function ($string) {
        $len = strlen($string);
        if ($len < 1) {
            return null;
        }
        return $string[$len - 1];
    };
    // END

    return $last($text);
}

$last('');     // null
$last('0');    // 0
$last('210');  // 0
$last('pow');  // w
$last('kids'); // s
