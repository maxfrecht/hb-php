<?php

include_once 'Hero.php';
include_once 'Ability.php';

class Mage extends Hero
{
    public function __construct($name, $image = 'https://www.la-caverne-du-mage.com/images/Image/Image/storm_mage_by_devburmakd39ax1h.jpg?1483815085764')
    {
        parent::__construct(15, 27, 8, $name, 1, 6, 1, 'Mage', $image);
        $this->setDamagesAndCriticalStrike(($this->intelligence));
        $this->abilityRatio = 2;
        $ability = new Ability($this->principalCarac * $this->abilityRatio, 'Fire Ball', 110);
        $this->setAbility($ability);
    }


}
