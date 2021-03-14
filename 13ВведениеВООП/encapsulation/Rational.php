<?php


namespace App\encapsulation;

class Rational
{
    public $numer;
    public $denom;

    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }

    /**
     * @return mixed
     */
    public function getNumer()
    {
        return $this->numer;
    }

    /**
     * @return mixed
     */
    public function getDenom()
    {
        return $this->denom;
    }

    public function add($rat)
    {
        return new Rational(
            $this->getNumer() * $rat->getDenom() + $rat->getNumer() * $this->getDenom(),
            $this->getDenom() * $rat->getDenom()
        );
    }

    public function sub($rat)
    {
        return new Rational(
            $this->getNumer() * $rat->getDenom() - $rat->getNumer() * $this->getDenom(),
            $this->getDenom() * $rat->getDenom()
        );
    }
}