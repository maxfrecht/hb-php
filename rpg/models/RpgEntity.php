<?php

include_once 'Ability.php';

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
    protected float $defense = 0.0;
    protected float $scoreCriticalStrike;
    protected int $criticalDamage;
    protected int $damageMax;
    protected int $damageMin;
    protected ?Ability $ability;
    protected ?float $abilityRatio;
    protected int $turn = 0;

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

    public function attack(RpgEntity $rpgEntity): bool
    {
        if (0 === $this->turn % 3 && isset($this->ability)) {
            $this->useAbility($rpgEntity);
        } else {
            $damage = rand($this->damageMin, $this->damageMax);
            $baseDamage = $damage;
            if (rand(1, 100) <= $this->scoreCriticalStrike) {
                $damage += $damage * ($this->criticalDamage / 100);
            }

            if ($rpgEntity->defense > 0) {
                $reducedDammages = $damage * $rpgEntity->defense / 100;
                $damage -= $reducedDammages;
            }
            $rpgEntity->hp -= $damage;

            if ($rpgEntity->hp < 0) {
                $rpgEntity->hp = 0;
            }

            echo($this instanceof Hero ? $this->getName() : 'Le '.get_class($this)).' a infligé '.round($damage, 2).' dommages '.($rpgEntity instanceof Hero ? ' a '.$rpgEntity->getName() : ' au '.get_class($rpgEntity)).' .'.($damage > $baseDamage ? ' Coup Critique !' : '').'<br>';
        }

        if (0 === $this->hp || 0 === $rpgEntity->hp) {
            $this->turn = 0;

            return false;
        }

        ++$this->turn;

        return true;
    }

    /**
     * Set the value of ability.
     *
     * @param mixed $ability
     *
     * @return self
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;

        return $this;
    }

    public function useAbility(RpgEntity $rpgEntity)
    {
        if (isset($this->ability)) {
            if ($this->mana >= $this->ability->getManaCost()) {
                $damage = $this->ability->getDamage();

                $rpgEntity->hp -= $damage;
                $this->mana -= $this->ability->getManaCost();

                if ($rpgEntity->hp < 0) {
                    $rpgEntity->hp = 0;
                }

                echo($this instanceof Hero ? $this->getName() : 'Le '.get_class($this)).' a infligé '.round($damage, 2).' dommages '.($rpgEntity instanceof Hero ? ' a '.$rpgEntity->getName() : ' au '.get_class($rpgEntity))." avec l'abilité ".$this->ability->getName().'<br>';
            } else {
                echo 'Pas assez de Mana !<br>';
            }
        } else {
            echo "Pas d'abilité<br>";
        }
    }
}
