<?php


class Item
{
    private string $name;
    private static int $staticId = 1;
    private int $id;
    private float $price;

    /**
     * Item constructor.
     * @param string $name
     * @param float $price
     * @param string $image
     */
    public function __construct(string $name, float $price, string $image)
    {
        $this->id = self::$staticId;
        self::$staticId++;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    private string $image;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}