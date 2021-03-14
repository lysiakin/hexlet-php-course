<?php

namespace App\constructor;

// BEGIN (write your solution here)
class Segment
{
    public $beginPoint;
    public $endPoint;

    public function __construct ($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }
}
// END