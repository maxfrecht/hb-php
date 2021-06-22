<?php
include_once 'Gobelin.php';
include_once 'Ogre.php';

class Explorateur extends Aventurier
{
    public function __construct(int $levelHero) {
        parent::__construct($levelHero);

        $monsters = [
            new Gobelin($levelHero + 2),
            new Ogre($levelHero + 2),
            new Ogre($levelHero + 2)
        ];
        $monsters[0]->setUrlImage('../images/gobelin.jpg');
        $this->addMonsters($monsters);
    }
}