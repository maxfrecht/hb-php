<?php

include_once 'Hero.php';
class Mage extends Hero
{
    public function __construct($name)
    {
        parent::__construct(15, 27, 8, $name, 1, 6, 1, 'Mage', 'https://www.la-caverne-du-mage.com/images/Image/Image/storm_mage_by_devburmakd39ax1h.jpg?1483815085764');
        $this->setDamagesAndCriticalStrike(($this->intelligence));
    }
}
