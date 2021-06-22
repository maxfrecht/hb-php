<?php

include_once 'RpgEntity.php';

class Monster extends RpgEntity
{
    protected int $hpRatio;
    protected int $manaRatio;
    protected int $defRatio;
    protected int $damageMinRatio;
    protected int $damageMaxRatio;
    protected int $scoreCriticalStrikeRatio;
    protected int $criticalDamageRatio;
    protected string $urlImage;
    protected string $name;
    public function __construct($name = 'Monster', $level, $hpRatio, $manaRatio, $defRatio, $damageMinRatio, $damageMaxRatio, $scoreCriticalStrikeRatio, $criticalDamageRatio, $urlImage)
    {
        $this->name = $name;
        $this->level = $level;
        $this->hp = $hpRatio * $level;
        $this->hpMax = $hpRatio * $level;
        $this->mana = $manaRatio * $level;
        $this->manaMax = $manaRatio * $level;
        $this->defense = $defRatio * $level;
        $this->damageMin = $damageMinRatio * $level;
        $this->damageMax = $damageMaxRatio * $level;
        $this->scoreCriticalStrike = $scoreCriticalStrikeRatio * $level;
        $this->criticalDamage = $criticalDamageRatio * $level;
        $this->urlImage = $urlImage;

        $this->hpRatio = $hpRatio;
        $this->manaRatio = $manaRatio;
        $this->defRatio = $defRatio;
        $this->damageMinRatio = $damageMinRatio;
        $this->damageMaxRatio = $damageMaxRatio;
        $this->scoreCriticalStrikeRatio = $scoreCriticalStrikeRatio;
        $this->criticalDamageRatio = $criticalDamageRatio;

        //Ratios

    }
    /**
     * @return string
     */
    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    /**
     * @param string $urlImage
     */
    public function setUrlImage(string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }
    /**
     * @return mixed|string
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     */
    public function setName(mixed $name): void
    {
        $this->name = $name;
    }
    public function setLevel($level)
    {
        $this->level = $level;
        $this->hp = $this->hpRatio * $level;
        $this->hpMax = $this->hpRatio * $level;
        $this->mana = $this->manaRatio * $level;
        $this->manaMax = $this->manaRatio * $level;
        $this->defense = $this->defRatio * $level;
        $this->damageMin = $this->damageMinRatio * $level;
        $this->damageMax = $this->damageMaxRatio * $level;
        $this->scoreCriticalStrike = $this->scoreCriticalStrikeRatio * $level;
        $this->criticalDamage = $this->criticalDamageRatio * $level;
    }

    public function toHTML(): void
    {
        echo <<<HTML
            <div class="hero">
                <div class="hero-image">
                <div class="hero-top">
                    <h2>{$this->name}<span class="level">{$this->level}</span></h2>
                    <p class="race">{$this->name}</p>
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
                    <div class="damages">
                        <h3>Dommages</h3>
                        <p>Dommages minimum : {$this->damageMin}</p>
                        <p>Dommages maximum : {$this->damageMax}</p>
                    </div>
                </div>
            </div>
            HTML;
    }
}
