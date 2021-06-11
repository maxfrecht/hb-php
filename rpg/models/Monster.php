<?php

include_once 'RpgEntity.php';

class Monster extends RpgEntity
{
    public function __construct($level, $hpRatio, $manaRatio, $defRatio, $damageMinRatio, $damageMaxRatio, $scoreCriticalStrikeRatio, $criticalDamageRatio)
    {
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
    }
}
