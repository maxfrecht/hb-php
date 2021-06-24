<?php
include_once 'Item.php';

class ItemsRepository
{
    private array $items;

    /**
     * ItemsRepository constructor.
     */
    public function __construct()
    {
        $playStation = new Item('PlayStation 5', 500.99, 'https://img.huffingtonpost.com/asset/5e1497cf25000079bad32088.png?cache=emHPeyu9Xx&ops=scalefit_630_noupscale');

        $xBouze = new Item('Xbouze Serie X', 499.90, 'https://www.sitegeek.fr/wp-content/uploads/2020/10/xbox-series-x-logo.jpg');

        $switch = new Item('Childtendo Switch', 299.99, 'https://blog.chipnmodz.fr/wp-content/uploads/2012/12/logo-nintendo-switch.png');

        $pc = new Item('PC Master Race', 1490.99, 'https://www.darty.com/darty-et-vous/sites/default/files/thumbnails/image/logo-asus-rog.png');
        $this->items = [
            $playStation,
            $xBouze,
            $switch,
            $pc
        ];
    }

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function deleteItem(Item $item): void
    {
        array_splice($this->items, array_search($item, $this->items));
    }

    public function findAllItems(): array
    {
        return $this->items;
    }

    public function getItemById($id): Item | null
    {
        foreach ($this->items as $item) {
            if ($id === $item->getId()) {
                return $item;
            }
        }
        return null;
    }
}