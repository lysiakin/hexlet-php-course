<?php
require 'vendor/autoload.php';

use function Funct\Collection\flatten;

function getChildren(array $users)
{
    $fn = function ($users) {
        $res = [];
        foreach ($users as $key => $value) {
            if ($key === 'children' && is_array($value)) {
                $res[] = $value;
            }
        }
        return $res;
    };
    $filter = array_map($fn, $users);
    print_r($filter);
    return flatten($filter, 2);
}

$users = [
    ['name' => 'Tirion', 'children' => [
        ['name' => 'Mira', 'birdhday' => '1983-03-23']
    ]],
    ['name' => 'Bronn', 'children' => []],
    ['name' => 'Sam', 'children' => [
        ['name' => 'Aria', 'birdhday' => '2012-11-03'],
        ['name' => 'Keit', 'birdhday' => '1933-05-14']
    ]],
    ['name' => 'Rob', 'children' => [
        ['name' => 'Tisha', 'birdhday' => '2012-11-03']
    ]],
];

getChildren($users);
// [
//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],
//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],
//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],
//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']
// ]

//// BEGIN
//function getChildren(array $users)
//{
//    $children = array_map(fn($user) => $user['children'], $users);
//    return flatten($children);
//}
//// END