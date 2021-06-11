<?php

class Rogue extends Hero
{
    public function __construct($name)
    {
        parent::__construct(13, 11, 26, $name, 2, 1, 5, 'Rogue', 'https://cdn.dribbble.com/users/228527/screenshots/3612348/amadan_half-elf-rogue.jpg');
        $this->setCriticalDamage(175);
        $this->setDamagesAndCriticalStrike(($this->agility));
    }
}
