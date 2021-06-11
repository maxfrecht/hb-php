<?php

class Style
{
  private string $name;

  public function __construct()
  {
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }
}
