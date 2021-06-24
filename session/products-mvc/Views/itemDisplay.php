<?php
/** @var Item $item */
?>
<div class="focus-item">
    <div class="item">
        <h2><?= $item->getName() ?></h2>
        <div class="img"><img src="<?= $item->getImage() ?>"></div>
        <p><?= $item->getPrice() ?>€</p>
        <form action="http://localhost:8000/session/products-mvc/Views/AccueilView.php" method="post">
            <input type="text" name="id" id="id" value="<?= $item->getId() ?>" hidden>
            <input type="submit" value="Ajouter au panier">
        </form>
    </div>
</div>