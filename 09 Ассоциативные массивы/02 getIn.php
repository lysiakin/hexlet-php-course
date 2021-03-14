<?php

function getIn(array $array, array $keys)
{
    $res = [];
        foreach ($keys as $key) {
            if (isset($array[$key])) {
                $array = $array[$key];
            } else {
                return null;
            }
        }
    return $array;
}

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2', null => 3, 'active' => false]
    ]
];

//var_dump(getIn($data, ['undefined'])); // null
var_dump(getIn($data, ['user'])); // 'ubuntu'
//var_dump(getIn($data, ['user', 'ubuntu'])); // null
var_dump(getIn($data, ['hosts', 1, 'name'])); // 'web2'
//getIn($data, ['hosts', 0]); // ['name' => 'web1']
var_dump(getIn($data, ['hosts', 1, null])); // 3
var_dump(getIn($data, ['hosts', 1, 'active'])); // false

//// BEGIN
//function getIn(array $data, array $keys)
//{
//    $current = $data;
//    foreach ($keys as $key) {
//        if (!isset($current[$key])) {
//            return null;
//        }
//        $current = $current[$key];
//    }
//
//    return $current;
//}
//// END