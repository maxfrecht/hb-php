<?php
include_once 'Gobelin.php';
include_once 'Dungeon.php';

class Aventurier extends Dungeon
{
    public function __construct($levelHero) {
        $monsters = [
          new Gobelin($levelHero + 1),
          new Gobelin($levelHero + 1),
          new Gobelin($levelHero + 1),
          new Gobelin($levelHero + 1),
          new Gobelin($levelHero + 1),
        ];
        $this->setMonsters($monsters);
    }
}