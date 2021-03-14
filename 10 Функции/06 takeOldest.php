<?php
require 'vendor/autoload.php';

use function Funct\Collection\firstN;

function takeOldest(array $users, $count = 1)
{
    $sort = fn($a, $b) => $a['birthday'] <=> $b['birthday'];
    usort($users, $sort);

    return firstN($users, $count);
}

$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];

var_dump(takeOldest($users));
# Array (
#     ['name' => 'Rob', 'birthday' => '1975-01-11']
# )