<?php
include_once '../Models/Item.php';
include_once '../Models/ItemsRepository.php';

class Order
{

    private array $items = [];

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getTotalPrice(): float
    {
        $total = 0;
        foreach ($this->items as $id => $quantity) {
            $total += $_SESSION['shop']->getRepository()->getItemById($id)->getPrice() * $quantity;
        }
        return $total;
    }

    public function addItem(Item $item): void
    {
        $this->items[$item->getId()] = 1;
    }

    public function incrementItemQuantity($id)
    {
        $this->items[$id]++;
    }

    public function decrementItemQuantity($id)
    {
        $this->items[$id]--;
    }

    public function deleteItem($id)
    {
//        array_splice($this->items, array_search($id, $this->items));
        unset($this->items[$id]);
    }
}