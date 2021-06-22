<?php

include_once 'Ability.php';

class Warrior extends Hero
{
    public function __construct($name, $image = 'https://www.drivethrurpg.com/images/6251/238881.jpg')
    {
        parent::__construct(24, 14, 12, $name, 5, 2, 1, 'Warrior', $image);
        $this->setDamagesAndCriticalStrike(($this->strength));
        $this->abilityRatio = 1.8;
        $ability = new Ability($this->principalCarac * $this->abilityRatio, 'Heurtoir', 150);
        $this->setAbility($ability);
    }
}
