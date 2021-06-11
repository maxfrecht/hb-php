<?php

class Warrior extends Hero
{
    public function __construct($name)
    {
        parent::__construct(24, 14, 12, $name, 5, 2, 1, 'Warrior', 'https://www.drivethrurpg.com/images/6251/238881.jpg');
        $this->setDamagesAndCriticalStrike(($this->strength));
    }
}
