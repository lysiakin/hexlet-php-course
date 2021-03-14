<?php

require __DIR__.'/../../vendor/autoload.php';

use function App\constructor\reverse;
use App\constructor\Point;
use App\constructor\Segment;

$segment = new Segment(new Point(1, 10), new Point(11, -3));
$reversedSegment = reverse($segment);
//
$reversedSegment->beginPoint; // (11, -3)
$reversedSegment->endPoint; // (1, 10)