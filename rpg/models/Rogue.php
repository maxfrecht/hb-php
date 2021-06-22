<?php

include_once 'Ability.php';

class Rogue extends Hero
{
    public function __construct($name, $image = 'https://cdn.dribbble.com/users/228527/screenshots/3612348/amadan_half-elf-rogue.jpg')
    {
        parent::__construct(13, 11, 26, $name, 2, 1, 5, 'Rogue', $image);
        $this->setCriticalDamage(175);
        $this->setDamagesAndCriticalStrike(($this->agility));
        $this->abilityRatio = 1.9;
        $ability = new Ability($this->principalCarac * $this->abilityRatio, 'Embuscade', 160);
        $this->setAbility($ability);
    }
}
