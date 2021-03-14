<?php

require __DIR__.'/../../vendor/autoload.php';

use App\dataHiding\Segment;

$segment = new Segment(3, 9);
$segment->getBeginPoint();
$segment->getEndPoint();

