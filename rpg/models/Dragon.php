<?php

include_once 'Monster.php';
class Dragon extends Monster
{
    public function __construct($level)
    {
        parent::__construct($level, 130, 81, .7, 8.3, 8.6, .33, 1.65);
    }
}
