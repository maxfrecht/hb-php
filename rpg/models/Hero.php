<?php

include_once 'Race.php';

include_once 'RpgEntity.php';

/**
 * Hero.
 *
 * @author maxFrecht
 */
abstract class Hero extends RpgEntity
{
    protected string $name;
    protected string $class;
    protected Race $race;
    protected int $strength;
    protected int $lvlUpStrength;
    protected int $lvlUpIntelligence;
    protected int $lvlUpAgility;
    protected int $agility;
    protected int $intelligence;
    protected string $urlImage;

    protected int $principalCarac;

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

    public function heal($hp)
    {
        $this->hp += $hp;

        if ($this->hp > $this->hpMax) {
            $this->hp = $this->hpMax;
        }
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
        if (isset($this->ability)) {
            $this->ability->setDamage($this->principalCarac * $this->abilityRatio);
        }
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
        if (isset($this->ability)) {
            $this->ability->setDamage($this->principalCarac * $this->abilityRatio);
        }

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
