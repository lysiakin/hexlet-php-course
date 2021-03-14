<?php

require __DIR__.'/../../vendor/autoload.php';

use OODesign\configuration\PasswordValidator;


$validator1 = new PasswordValidator();
$errors1 = $validator1->validate('qwertyui');

$validator2 = new PasswordValidator([
    'containNumbers' => true
]);
$errors2 = $validator2->validate('qwertya3sdf');
print_r($errors2);
