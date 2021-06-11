<?php

class Ability
{
    private int $damage;
    private string $name;
    private int $manaCost;

    public function __construct($damage, $name, $manaCost)
    {
        $this->damage = $damage;
        $this->name = $name;
        $this->manaCost = $manaCost;
    }

    /**
     * Get the value of damage.
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Get the value of name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of manaCost.
     */
    public function getManaCost()
    {
        return $this->manaCost;
    }

    /**
     * Set the value of damage.
     *
     * @param mixed $damage
     *
     * @return self
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }
}
