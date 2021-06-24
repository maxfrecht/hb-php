<?php
include_once '../Models/Item.php';
include_once '../Models/ItemsRepository.php';
include_once '../Services/order.service.php';

class ShopController
{
    private ItemsRepository $repository;
    private Order $order;

    public function __construct()
    {
        $this->repository = new ItemsRepository();
        $this->order = new Order();
    }

    public static function initShop(): void
    {
        session_start();
        if (!isset($_SESSION['shop'])) {
            $_SESSION['shop'] = new ShopController();
        } else {
            $_SESSION['shop']->addItemToOrder();
            $_SESSION['shop']->deleteItemInOrder();
        }
    }

    public function displayItems(): void
    {

        foreach ($_SESSION['shop']->getRepository()->findAllItems() as $item) {
            include '../Views/itemDisplay.php';
        }

    }

    public function displayBasket():void {
        if(count($_SESSION['shop']->getOrder()->getItems()) > 0) {
            include_once '../Views/basketDisplay.php';
        }
    }

    public function getNameById($id): string {
        return $this->repository->getItemById($id)->getName();
    }

    public function getPriceById($id): string {
        return $this->repository->getItemById($id)->getPrice();
    }

    public function addItemToOrder(): void
    {
        if (isset($_POST['id'])) {
            $item = $this->repository->getItemById(intval($_POST['id']));
            if (!(array_key_exists($item->getId(), $this->order->getItems()))) {
                $this->order->addItem($item);
            } else {
                $this->order->incrementItemQuantity($item->getId());
            }
        }
    }

    public function deleteItemInOrder(): void
    {
        if (isset($_POST['delete'])) {
            if ($this->order->getItems()[$_POST['delete']] === 1) {
                $this->order->deleteItem($_POST['delete']);
            } else {
                $this->order->decrementItemQuantity($_POST['delete']);
            }
        }
    }

    /**
     * @return ItemsRepository
     */
    public function getRepository(): ItemsRepository
    {
        return $this->repository;
    }

    /**
     * @param ItemsRepository $repository
     */
    public function setRepository(ItemsRepository $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }
}