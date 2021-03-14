<?php


namespace App\constants;


class Timer
{
    public const SEC_PER_MIN = 60;

    // BEGIN (write your solution here)
    public const SEC_PER_HOUR = 3600;
    private $secondsCount;

    public function __construct($seconds, $minutes = 0, $hours = 0)
    {
        $this->secondsCount = $seconds + $minutes * self::SEC_PER_MIN + $hours * self::SEC_PER_HOUR;
    }
    // END

    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }
}
