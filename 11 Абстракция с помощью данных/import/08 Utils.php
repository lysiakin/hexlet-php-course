<?php

namespace App\Utils;

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}
