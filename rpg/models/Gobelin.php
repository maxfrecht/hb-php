<?php

include_once 'Monster.php';

class Gobelin extends Monster
{
    /**
     * Gobelin constructor.
     */
    public function __construct(int $level)
    {
        parent::__construct('Gobelin', $level, 100, 65, 0.33, 3.33, 3.35, 0.15, 1.5, '../images/gobelin.jpeg');
    }


}
