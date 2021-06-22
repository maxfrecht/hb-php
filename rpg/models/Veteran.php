<?php
include_once 'Dragon.php';

class Veteran extends Explorateur
{
    public function __construct($lvlHero) {
        parent::__construct($lvlHero);
        $monsters = [
            new Dragon($lvlHero + 2),
            new Dragon($lvlHero + 3),
        ];
        $this->addMonsters($monsters);
    }
}