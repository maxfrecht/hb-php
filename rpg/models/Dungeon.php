<?php
include_once 'Monster.php';
include_once '../../poo/functions/dump.php';
abstract class Dungeon
{
    protected array $monsters = [];
    protected int $currentIndex = 0;

    /**
     * @return int
     */
    public function getCurrentIndex(): int
    {
        return $this->currentIndex;
    }
    protected bool $isFigthOver = false;

    /**
     * @return bool
     */
    public function isFigthOver(): bool
    {
        return $this->isFigthOver;
    }

    /**
     * @param bool $isFigthOver
     */
    public function setIsFigthOver(bool $isFigthOver): void
    {
        $this->isFigthOver = $isFigthOver;
    }
    /**
     * @return int
     */
    public function getCurrentMonster(): Monster
    {
        return $this->monsters[$this->currentIndex];
    }

    /**
     * @param int $currentIndex
     */
    public function incrementCurrentIndex(int $currentIndex): void
    {
        $this->currentIndex++;
    }

    /**
     * @return array
     */
    public function getMonsters(): array
    {
        return $this->monsters;
    }

    /**
     * @param array $monsters
     */
    public function setMonsters(array $monsters): void
    {
        $this->monsters = $monsters;
    }

    public function addMonsters(array $monsters): void
    {
        foreach ($monsters as $monster) {
            $this->monsters[] = $monster;
        }
    }

    public function doFight(array $fighters)
    {
        $first = random_int(0, 1);
        $second = $first === 0 ? 1 : 0;
        while ($fighters[$first]->getHp() > 0 && $fighters[$second]->getHp() > 0) {
            $fighters[$first]->attack($fighters[$second]);
            if ($fighters[$second]->getHp() > 0) {
                $fighters[$second]->attack($fighters[$first]);
            }
        }
        $this->currentIndex++;
        $this->isFigthOver = false;
    }

    public function incrementMonstersLevels() {
        foreach ($this->monsters as $monster) {
            $class = $monster->getName();
            $monster->setLevel($monster->getLevel() + 1);
        }
    }
}