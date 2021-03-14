<?php

require __DIR__.'/../../vendor/autoload.php';

use Ds\Stack;

/*function compare(string $str1, string $str2)
{
    $data = [$str1, $str2];
    foreach ($data as $str) {
        $res[] = prepare($str);
    }
        print_r($res);
    return $res[0] === $res[1];
}*/
function compare(string $str1, string $str2): bool
{
    $evaluatedText1 = prepare($str1);
    $evaluatedText2 = prepare($str2);

    return $evaluatedText1 === $evaluatedText2;
}

function prepare(string $string): array
{
    $stack = new Stack();
    for ($i = 0, $len = mb_strlen($string); $i < $len; $i++) {
        $curr = $string[$i];
        if ($curr !== '#') {
            $stack->push($curr);
        } elseif (!$stack->isEmpty()) {
            $stack->pop();
        }
    }

    return $stack->toArray();
}

// Перед самим сравнением, нужно вычислить реальную строчку отображенную в редакторе.
// 'ac' === 'ac'
compare('ab#c', 'ab#c'); // true

// '' === ''
compare('ab##', 'c#d#'); // true

// 'c' === 'b'
compare('a#c', 'b'); // false

// 'cd' === 'cd'
compare('#cd', 'cd'); // true