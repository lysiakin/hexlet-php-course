<?php

function cut(string $expression, array $allowSymbols): array
{
    $arr = str_split($expression);
    $filteredArr = [];

    foreach ($arr as $symbol) {
        if (in_array($symbol, $allowSymbols)) {
            $filteredArr[] = $symbol;
        }
    }
    return $filteredArr;
}

function checkIfBalanced(string $string): bool
{
    $stack = [];
    $openingList = ['(', '{'];
    $pair = ['()', '{}'];
    
    $allowSymbols = ['(', ')', '{', '}'];
    $normalized = cut($string, $allowSymbols);

    for ($i = 0, $len = count($normalized); $i < $len; $i++) {
        $curr = $normalized[$i];

        if (in_array($normalized[$i], $openingList)) {
            array_push($stack, $normalized[$i]);
        } else {
            $closing = array_pop($stack);
            $pairCompare = "{$closing}{$curr}";
//            print_r($pairCompare);
            if (!in_array($pairCompare, $pair)) {
                return false;
            }
        }
/*        if (in_array($normalized[$i], $openingList)) {
            array_push($stack, $normalized[$i]);
            continue;
        }
        $closing = array_pop($stack);
        $pairCompare = "{$closing}{$curr}";
//            print_r($pairCompare);
        if (!in_array($pairCompare, $pair)) {
            return false;
        }*/
    }
    return count($stack) === 0;
}

var_dump(checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)')); // true
var_dump(checkIfBalanced('(4 + 3))')); // false
var_dump(checkIfBalanced('(')); // false
var_dump(checkIfBalanced('{(())}{(}))')); // false

//function checkIfBalanced(string $expression): bool
//{
//    $stack = [];
//    for ($i = 0, $length = strlen($expression); $i < $length; $i++) {
//        $curr = $expression[$i];
//        if ($curr === '(') {
//            array_push($stack, $curr);
//        } elseif ($curr === ')') {
//            if (empty($stack)) {
//                return false;
//            }
//            array_pop($stack);
//        };
//    }
//
//    return empty($stack);
//}
