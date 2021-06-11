<?php

include_once('Artist.php');
include_once('Style.php');

class Song
{
  private string $name;
  private string $duration;
  private array $artists;
  private array $styles;
  private float $price;

  public function __construct()
  {
    $this->artists = [];
    $this->styles = [];
  }

  public function getName()
  {
    return $this->name;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function getArtists()
  {
    return $this->artists;
  }
  public function getStyles()
  {
    return $this->styles;
  }

  public function setName($name)
  {
    $this->name = $name;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function setArtists($artists)
  {
    $this->artists = $artists;
  }
  public function addArtist(Artist $artist)
  {
    if (!in_array($artist, $this->artists)) {
      $this->artists[] = $artist;
    }
  }
  public function setStyles($styles)
  {
    $this->styles = $styles;
  }
  public function addStyle(Style $style)
  {
    if (!in_array($style, $this->styles)) {
      $this->styles[] = $style;
    }
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getDurationInSecond()
  {
    $array = explode(':', $this->duration);
    $seconds = intval($array[0]) * 3600 + intval($array[1])  * 60 + intval($array[2]);

    return $seconds;
  }
}
