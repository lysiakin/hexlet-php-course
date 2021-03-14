<?php

function pick(array $array, array $keys): ?array
{
    if (empty($array) || empty($keys)) {
        return [];
    }

    $result = [];
    foreach ($keys as $key => $value) {
        if (array_key_exists($value, $array)) {
            $result[$value] = $array[$value];
        }
    }
    print_r($result);
    return $result;
}



$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux',
    'null' => null
];

pick($data, ['user']);       // → ['user' => 'ubuntu']
pick($data, ['user', 'os']); // → ['user' => 'ubuntu', 'os' => 'linux']
pick($data, []);             // → []
pick($data, ['none']);       // → []
pick($data, ['null']);        // → ['null' => null]