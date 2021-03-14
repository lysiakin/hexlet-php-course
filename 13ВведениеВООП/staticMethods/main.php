<?php

require __DIR__.'/../../vendor/autoload.php';

use App\staticMethods\Time;

echo $time = Time::fromString("8:11") . "\n";
$d = new Time(10, 23);
echo $d;

