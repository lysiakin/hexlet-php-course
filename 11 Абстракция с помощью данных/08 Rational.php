<?php

//require_once 'import/05 Points.php';
//namespace App\Rational;
//use function App\Utils\gcd;

// BEGIN (write your solution here)
function makeRational($numer, $denom)
{
    $gcd = gcd($numer, $denom);

    return [
        'numer' => $numer / $gcd,
        'denom' => $denom / $gcd
    ];
}

function getNumer($rat)
{
    return $rat['numer'];
}

function getDenom($rat)
{
    return $rat['denom'];
}

function add($rat1, $rat2)
{
    $numer = getNumer($rat1) * getDenom($rat2) + getNumer($rat2) * getDenom($rat1);
    $denom = getDenom($rat1) * getDenom($rat2);

    return makeRational($numer, $denom);
}

function sub($rat1, $rat2)
{
    $numer = getNumer($rat1) * getDenom($rat2) - getNumer($rat2) * getDenom($rat1);
    $denom = getDenom($rat1) * getDenom($rat2);

    return makeRational($numer, $denom);
}
// END

function ratToString($rat)
{
    return getNumer($rat) . '/' . getDenom($rat);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}


$rat1 = makeRational(3, 9);
getNumer($rat1); // 1
getDenom($rat1); // 3

$rat2 = makeRational(10, 3);

$rat3 = (add($rat1, $rat2));
RatToString($rat3); // 11/3

$rat4 = sub($rat1, $rat2);
RatToString($rat4); // -3/1
