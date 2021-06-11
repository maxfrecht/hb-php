<?php

include_once 'Race.php';

/**
 * Hero.
 */
abstract class Hero
{
    protected string $name;
    protected string $class;
    protected Race $race;
    protected int $level;
    protected int $hp;
    protected int $hpMax;
    protected int $mana;
    protected int $manaMax;
    protected int $strength;
    protected int $lvlUpStrength;
    protected int $lvlUpIntelligence;
    protected int $lvlUpAgility;
    protected int $agility;
    protected int $intelligence;
    protected float $defense;
    protected float $scoreCriticalStrike;
    protected int $criticalDamage;
    protected int $damageMax;
    protected int $damageMin;
    protected int $principalCarac;
    protected string $urlImage;

    public function __construct(int $strength, int $intelligence, int $agility, string $name, int $lvlUpStrength, int $lvlUpIntelligence, int $lvlUpAgility, $class, $urlImage)
    {
        $this->level = 1;
        $this->scoreCriticalStrike = 12;
        $this->criticalDamage = 150;
        $this->name = $name;
        $this->setStrength($strength);
        $this->hp = $strength * 19;

        $this->setIntelligence($intelligence);
        $this->mana = $intelligence * 17;

        $this->setAgility($agility);
        $this->lvlUpAgility = $lvlUpAgility;
        $this->lvlUpStrength = $lvlUpStrength;
        $this->lvlUpIntelligence = $lvlUpIntelligence;
        $this->class = $class;
        $this->urlImage = $urlImage;
    }

    public function toHTML(): void
    {
        echo <<<HTML
            <div class="hero">
                
                <div class="hero-image">
                <div class="hero-top">
                    <h2>{$this->name}<span class="level">{$this->level}</span></h2>
                    <p class="race">{$this->class} - {$this->race->getName()}</p>
                    <div class="progress-bars">
                        <div class="progress hp" style="--hp-top:calc(({$this->hp} / {$this->hpMax} * -100%) + 50%)">
                            <span>{$this->hp} / {$this->hpMax}</span>
                        </div>
                        <div class="progress mana" style="--mana-top:calc(({$this->mana} / {$this->manaMax} * -100%) + 50%)">
                            <span>{$this->mana} / {$this->manaMax}</span>
                        </div>
                    </div>
                </div>    
                <img src="{$this->urlImage}" alt=""></div>
                <div class="hero-content">
                    
                    <h3>Statistiques</h3>
                    <ul class="hero-stats">
                        <li>Force : {$this->strength}</li>
                        <li>Intelligence : {$this->intelligence}</li>
                        <li>Agilité : {$this->agility}</li>
                    </ul>
                    <div class="damages">
                        <h3>Dommages</h3>
                        <p>Dommages minimum : {$this->damageMin}</p>
                        <p>Dommages maximum : {$this->damageMax}</p>
                    </div>
                </div>
            </div>
            HTML;
    }

    public function setDamagesAndCriticalStrike(int $carac)
    {
        $this->principalCarac = $carac;
        $this->damageMin = round($carac * 1.2);
        $this->damageMax = round($carac * 1.4);
        $this->scoreCriticalStrike += $carac * 0.08;
    }

    public function levelUp()
    {
        ++$this->level;
        $this->setStrength($this->strength + $this->lvlUpStrength);
        $this->setIntelligence($this->intelligence + $this->lvlUpIntelligence);
        $this->setAgility($this->agility + $this->lvlUpAgility);
        $this->setDamagesAndCriticalStrike($this->principalCarac);
    }

    /**
     * getName
     * Get the value of name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of race.
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race.
     *
     * @param Race $race
     *
     * @return self
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of level.
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level.
     *
     * @param int $level
     *
     * @return self
     */
    public function setLevel($level)
    {
        $this->level = $level;
        $this->setStrength($this->strength + ($level - 1) * $this->lvlUpStrength);
        $this->setIntelligence($this->intelligence + ($level - 1) * $this->lvlUpIntelligence);
        $this->setAgility($this->agility + ($level - 1) * $this->lvlUpAgility);
        $this->setDamagesAndCriticalStrike($this->principalCarac);

        return $this;
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
     * Get the value of strength.
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set the value of strength.
     *
     * @param mixed $strength
     *
     * @return self
     */
    public function setStrength($strength)
    {
        if (isset($this->strength, $this->principalCarac)) {
            if ($this->strength === $this->principalCarac) {
                $this->strength = $strength;
                $this->hpMax = $strength * 19;
                $this->principalCarac = $this->strength;
            } else {
                $this->strength = $strength;
                $this->hpMax = $strength * 19;
            }
        } else {
            $this->strength = $strength;
            $this->hpMax = $strength * 19;
        }

        return $this;
    }

    /**
     * Get the value of agility.
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set the value of agility.
     *
     * @param mixed $agility
     *
     * @return self
     */
    public function setAgility($agility)
    {
        if (isset($this->agility, $this->principalCarac)) {
            if ($this->agility === $this->principalCarac) {
                $this->agility = $agility;
                $this->defense = $agility / 6;
                $this->principalCarac = $this->agility;
            } else {
                $this->agility = $agility;
                $this->defense = $agility / 6;
            }
        } else {
            $this->agility = $agility;
            $this->defense = $agility / 6;
        }

        return $this;
    }

    /**
     * Get the value of intelligence.
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * Set the value of intelligence.
     *
     * @param mixed $intelligence
     *
     * @return self
     */
    public function setIntelligence($intelligence)
    {
        if (isset($this->intelligence, $this->principalCarac)) {
            if ($this->intelligence === $this->principalCarac) {
                $this->intelligence = $intelligence;
                $this->manaMax = $intelligence * 17;
                $this->principalCarac = $this->intelligence;
            } else {
                $this->intelligence = $intelligence;
                $this->manaMax = $intelligence * 17;
            }
        } else {
            $this->intelligence = $intelligence;
            $this->manaMax = $intelligence * 17;
        }

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

    /**
     * Get the value of lvlUpStrength.
     */
    public function getLvlUpStrength()
    {
        return $this->lvlUpStrength;
    }

    /**
     * Get the value of lvlUpIntelligence.
     */
    public function getLvlUpIntelligence()
    {
        return $this->lvlUpIntelligence;
    }

    /**
     * Get the value of lvlUpAgility.
     */
    public function getLvlUpAgility()
    {
        return $this->lvlUpAgility;
    }

    /**
     * Get the value of class.
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Get the value of urlImage.
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }
}
