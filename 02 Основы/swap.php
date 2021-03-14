<?php

function swap(int &$a, int &$b)
{
    $c = $a;
    $a = $b;
    $b = $c;
}

$a = 5;
$b = 8;
swap($a, $b);