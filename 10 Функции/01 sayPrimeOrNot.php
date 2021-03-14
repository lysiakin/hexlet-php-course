<?php

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0)
            return false;
    }
    return true;
}

function sayPrimeOrNot($number)
{
    if(isPrime($number)) {
        return print_r('yes');
    }
    return print_r('no');
}

sayPrimeOrNot(5); // yes
sayPrimeOrNot(4); // no