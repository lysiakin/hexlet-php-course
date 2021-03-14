<?php

function getSortedNames(array $users)
{
    $res = [];
    foreach ($users as ['name' => $name]) {
        $res[] = $name;
    }
    sort($res);
//    print_r($res);
    return $res;
}

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];
//$users = [
//    'name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'
//];

getSortedNames($users); // ['Bronn', 'Eiegon', 'Reigar', 'Sansa']