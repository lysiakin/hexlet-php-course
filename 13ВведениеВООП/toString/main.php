<?php

require __DIR__.'/../../vendor/autoload.php';

use App\constructor\Point;
use App\toString\Segment;

$point1 = new Point(1, 10);
$point2 = new Point(11, -3);
$segment1 = new Segment($point1, $point2);
echo $segment1; // [(1, 10), (11, -3)]

$segment2 = new Segment($point2, $point1);
echo $segment2; // [(11, -3), (1, 10)]
