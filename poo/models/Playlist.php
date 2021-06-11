<?php

class Playlist
{

  private array $songs;
  private string $name;
  private DateTime $createdAt;
  private DateTime $updatedAt;

  public function __construct()
  {
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
    $this->songs = array();
  }

  public function getSongs()
  {
    return $this->songs;
  }
  public function setSongs($songs)
  {
    $this->songs = $songs;
    $this->updatedAt = new DateTime();
  }
  public function addSong($song)
  {
    if (!in_array($song, $this->songs)) {
      $this->songs[] = $song;
      $this->updatedAt = new DateTime();
    }
  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name = $name;
    $this->updatedAt = new DateTime();
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
}
