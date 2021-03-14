<?php


namespace App\mutability\User;

class Address
{
    private $country;
    private $city;
    private $street;

    public function __construct($country, $city, $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }
}