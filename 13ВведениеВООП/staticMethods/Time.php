<?php


namespace App\staticMethods;


class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString($time)
    {
        [$h, $m] = explode(':', $time);

        return new self($h, $m);
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}