<?php


class Personnage
{
    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return string
     */
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob(string $job): void
    {
        $this->job = $job;
    }

    /**
     * @return array
     */
    public function getHobbies(): array
    {
        return $this->hobbies;
    }

    /**
     * @param array $hobbies
     */
    public function setHobbies(array $hobbies): void
    {
        $this->hobbies = $hobbies;
    }
    /**
     * @var string
     */
    private string $firstname;
    /**
     * @var string
     */
    private string $lastname;
    /**
     * @var int
     */
    private int $age;
    /**
     * @var string
     */
    private string $genre;
    /**
     * @var string
     */
    private string $job;
    /**
     * @var array
     */
    private array $hobbies;

    /**
     * Personnage constructor.
     * @param string $firstname
     * @param string $lastname
     * @param int $age
     * @param string $genre
     * @param string $job
     * @param array $hobbies
     */
    public function __construct(string $firstname, string $lastname, int $age, string $genre, string $job, array $hobbies)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->genre = $genre;
        $this->job = $job;
        $this->hobbies = $hobbies;
    }
}