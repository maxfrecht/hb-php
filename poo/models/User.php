<?php

class User
{

  private string $firstName;
  private string $lastName;
  private DateTime $createdAt;
  private DateTime $updatedAt;
  private string $email;
  private array $likedArtists;
  private array $likedStyles;
  private array $likedAlbums;
  private array $playlists;

  public function __construct()
  {
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
    $this->likedArtists = [];
    $this->likedStyles = [];
    $this->likedAlbums = [];
    $this->playlists = [];
  }

  public function getPlaylists()
  {
    return $this->playlists;
  }

  public function setPlaylists($playlists)
  {
    $this->playlists = $playlists;
    $this->updatedAt = new DateTime();
  }

  public function addPlaylist($playlist)
  {
    if (!in_array($playlist, $this->playlists)) {
      $this->playlists[] = $playlist;
      $this->updatedAt = new DateTime();
    }
  }

  public function getFirstName()
  {
    return $this->firstName;
  }
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
    $this->updatedAt = new DateTime();
  }
  public function getLastName()
  {
    return $this->lastName;
  }
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
    $this->updatedAt = new DateTime();
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($email)
  {
    $this->email = $email;
    $this->updatedAt = new DateTime();
  }
  public function getLikedAlbums()
  {
    return $this->likedAlbums;
  }
  public function setLikedAlbums($likedAlbums)
  {
    $this->likedAlbums = $likedAlbums;
    $this->updatedAt = new DateTime();
  }

  public function addLikedAlbum($likedAlbum)
  {
    if (!in_array($likedAlbum, $this->likedAlbums)) {
      $this->likedAlbums[] = $likedAlbum;
      $this->updatedAt = new DateTime();
    }
  }
  public function getLikedArtists()
  {
    return $this->likedArtists;
  }
  public function setLikedArtists($likedArtists)
  {
    $this->likedArtists = $likedArtists;
    $this->updatedAt = new DateTime();
  }
  public function addLikedArtists($likedArtist)
  {
    if (!in_array($likedArtist, $this->likedArtists)) {
      $this->likedArtists[] = $likedArtist;
      $this->updatedAt = new DateTime();
    }
  }
  public function getLikedStyles()
  {
    return $this->likedStyles;
  }
  public function setLikedStyles($likedStyles)
  {
    $this->likedStyles = $likedStyles;
    $this->updatedAt = new DateTime();
  }
  public function addLikedStyles($likedStyle)
  {
    if (!in_array($likedStyle, $this->likedStyles)) {
      $this->likedStyles[] = $likedStyle;
      $this->updatedAt = new DateTime();
    }
  }
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
}
