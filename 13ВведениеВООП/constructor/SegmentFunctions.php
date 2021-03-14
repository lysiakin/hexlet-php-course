<?php

namespace App\constructor;

use App\constructor\Point;
use App\constructor\Segment;

// BEGIN (write your solution here)
function reverse(Segment $segment): Segment
{
    return new Segment(
        new Point($segment->beginPoint->x, $segment->beginPoint->y),
        new Point($segment->endPoint->x, $segment->endPoint->y)
    );
}
// END