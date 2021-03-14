<?php
require 'vendor/autoload.php';

use function Funct\Collection\minValue;

function  getManWithLeastFriends(array $users)
{
    if (empty($users)) {
        return null;
    }
    return minValue($users, fn($user) => count($user['friends']));
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
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];


$users2 = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female']
    ]],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female'],
        ['name' => 'Tanisha', 'gender' => 'female']
    ]],
    ['name' => 'Bronn', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male'],
        ['name' => 'Keit', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
];

print_r(getManWithLeastFriends($users));
print_r(getManWithLeastFriends($users2));
// => ['name' => 'Keit', 'friends' => []];
