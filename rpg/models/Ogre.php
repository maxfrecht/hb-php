<?php

include_once 'Monster.php';
class Ogre extends Monster
{
    public function __construct($level)
    {
        parent::__construct($level, 112, 71, .5, 6.4, 6.8, .28, 1.5);
    }
}
