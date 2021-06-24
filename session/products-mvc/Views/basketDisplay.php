<?php
/**  @var Order $order; */
$order = $_SESSION['shop']->getOrder();
?>
<aside>
    <h3>Panier</h3>
    <ul>
        <?php foreach ($order->getItems() as $id => $quantity) {
            ?>
            <li><?= $_SESSION['shop']->getNameById($id) ?>
                - <?= $_SESSION['shop']->getPriceById($id) ?>€ - quantité : <?= $quantity ?>
                <form action="http://localhost:8000/session/products-mvc/Views/AccueilView.php" method="post">
                    <input type="text" name="delete" id="delete" value="<?= $id ?>" hidden>
                    <input type="submit" value="Supprimer">
                </form>
            </li>
        <?php } ?>
        <p>Prix Total : <?= $order->getTotalPrice() ?>€</p>
</aside>