<?php

function getCountElements(array $users)
{
    $compare = function (array $carry, array $item)
    {
        foreach ($item as $key => $value) {
            if (!array_key_exists($key, $carry)) {
                $carry[$key] = 1;
            }  else {
                $carry[$key]++;
            }
        }
        return $carry;
    };
    return array_reduce($users, $compare, []);

}

$sum = [['key' => 25],['key-2' => 34],['key' => 5, 'key-2' => 6]];

getMenCountByYear($sum);
# Array (
#     key => 30,
#     key-2 => 40
# );
