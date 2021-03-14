<?php

require __DIR__.'/../../vendor/autoload.php';

use App\mutability\User;
use App\mutability\User\Address;

$user = new User('Ivan');
$address = new User\Address('Russia', 'Moscow', 'Lenina');
$user->addAddress($address);

var_dump($user);

$user2 = new User('Mila');
$user2->addAddress($address);

var_dump($user2);

// Изменение происходит сразу у обоих пользователей
// Такое поведение неожиданно и ломает систему
$address->setCountry('USA');

//var_dump($user);
//var_dump($user2);


