<?php

include_once 'Monster.php';
class Gobelin extends Monster
{
    public function __construct($level)
    {
        parent::__construct($level, 100, 65, 0.33, 3.33, 3.35, 0.15, 1.5);
    }
}
