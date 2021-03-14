<?php
require 'vendor/autoload.php';

use function Funct\Collection\flatten;

function getGirlFriends($users)
{
    $friends = array_map(fn($users) => $users['friends'], $users);
    $f = flatten($friends);
    $f = array_filter($f, fn($f) => $f['gender'] === 'female');

    return array_values($f);
}

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

getGirlFriends($users);
# Array (
#     ['name' => 'Mira', 'gender' => 'female'],
#     ['name' => 'Aria', 'gender' => 'female'],
#     ['name' => 'Keit', 'gender' => 'female']
# )
