<?php

include_once 'Song.php';
// include_once('../functions/formatseconds.php');

class Album
{
    private string $name;
    private string $year;
    private array $songs;
    private float $price;

    public function __construct()
    {
        $this->songs = [];
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

    public function getSongs(): array
    {
        return $this->songs;
    }

    public function setSongs($songs): void
    {
        $this->songs = $songs;
    }

    public function addSong(Song $song)
    {
        if (!in_array($song, $this->songs)) {
            $this->songs[] = $song;
        }
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function formatSeconds($milliseconds)
    {
        $milliseconds = $milliseconds * 1000;
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $milliseconds = $milliseconds % 1000;
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;

        $format = '%u h %02u min %02u sec';
        0 == $hours ? $format = '%02u min %02u sec' : '';
        $time = sprintf($format, $hours, $minutes, $seconds);
        0 == $hours ? $time = sprintf($format, $minutes, $seconds) : '';

        return rtrim($time, '0');
    }

    public function getTotalDuration()
    {
        $totalSeconds = 0;
        foreach ($this->songs as $song) {
            $totalSeconds += $song->getDurationInSecond();
        }

        return $this->formatSeconds($totalSeconds);
    }
}
