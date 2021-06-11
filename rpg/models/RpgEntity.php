<?php

/**
 * RpgEntity.
 *
 * @author maxFrecht
 */
abstract class RpgEntity
{
    protected int $level;
    protected int $hp;
    protected int $hpMax;
    protected int $mana;
    protected int $manaMax;
    protected float $defense;
    protected float $scoreCriticalStrike;
    protected int $criticalDamage;
    protected int $damageMax;
    protected int $damageMin;

    /**
     * Get the value of level.
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the value of hp.
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp.
     *
     * @param int $hp
     *
     * @return self
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of hpMax.
     */
    public function getHpMax()
    {
        return $this->hpMax;
    }

    /**
     * Set the value of hpMax.
     *
     * @param int $hpMax
     *
     * @return self
     */
    public function setHpMax($hpMax)
    {
        $this->hpMax = $hpMax;

        return $this;
    }

    /**
     * Get the value of mana.
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * Set the value of mana.
     *
     * @param mixed $mana
     *
     * @return self
     */
    public function setMana($mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * Get the value of manaMax.
     */
    public function getManaMax()
    {
        return $this->manaMax;
    }

    /**
     * Set the value of manaMax.
     *
     * @param mixed $manaMax
     *
     * @return self
     */
    public function setManaMax($manaMax)
    {
        $this->manaMax = $manaMax;

        return $this;
    }

    /**
     * Get the value of defense.
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense.
     *
     * @param mixed $defense
     *
     * @return self
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of scoreCriticalStrike.
     */
    public function getScoreCriticalStrike()
    {
        return $this->scoreCriticalStrike;
    }

    /**
     * Set the value of scoreCriticalStrike.
     *
     * @param mixed $scoreCriticalStrike
     *
     * @return self
     */
    public function setScoreCriticalStrike($scoreCriticalStrike)
    {
        $this->scoreCriticalStrike = $scoreCriticalStrike;

        return $this;
    }

    /**
     * Get the value of criticalDamage.
     */
    public function getCriticalDamage()
    {
        return $this->criticalDamage;
    }

    /**
     * Set the value of criticalDamage.
     *
     * @param mixed $criticalDamage
     *
     * @return self
     */
    public function setCriticalDamage($criticalDamage)
    {
        $this->criticalDamage = $criticalDamage;

        return $this;
    }

    /**
     * Get the value of damageMax.
     */
    public function getDamageMax()
    {
        return $this->damageMax;
    }

    /**
     * Set the value of damageMax.
     *
     * @param mixed $damageMax
     *
     * @return self
     */
    public function setDamageMax($damageMax)
    {
        $this->damageMax = $damageMax;

        return $this;
    }

    /**
     * Get the value of damageMin.
     */
    public function getDamageMin()
    {
        return $this->damageMin;
    }

    /**
     * Set the value of damageMin.
     *
     * @param mixed $damageMin
     *
     * @return self
     */
    public function setDamageMin($damageMin)
    {
        $this->damageMin = $damageMin;

        return $this;
    }

    protected function attack(RpgEntity $rpgEntity)
    {
    }
}
