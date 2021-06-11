<?php

include_once 'Album.php';

/**
 * Artist.
 */
class Artist
{
    private string $name;
    private int $year;
    private string $nationality;
    private array $albums;

    public function __construct()
    {
        $this->albums = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear($year): void
    {
        $this->year = $year;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function setNationality($nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getAlbums(): array
    {
        return $this->albums;
    }

    public function setAlbums($albums): void
    {
        $this->albums = $albums;
    }

    public function addAlbum(Album $album): void
    {
        if (in_array($album, $this->albums)) {
            $this->albums[] = $album;
        }
    }
}
