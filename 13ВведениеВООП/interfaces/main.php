<?php

require __DIR__.'/../../vendor/autoload.php';

use App\interfaces\User;

$user1 = new User(4, 'tolya');
$user2 = new User(1, 'petya');

var_dump($user1->compareTo($user2)); // false
