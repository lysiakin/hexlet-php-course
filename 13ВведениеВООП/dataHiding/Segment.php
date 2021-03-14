<?php

namespace App\dataHiding;

class Segment
{
    // BEGIN (write your solution here)
    private $beginPoint;
    private $endPoint;
    // END

    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    // BEGIN (write your solution here)
    public function getBeginPoint()
    {
        return $this->beginPoint;
    }

    public function getEndPoint()
    {
        return $this->endPoint;
    }
    // END
}