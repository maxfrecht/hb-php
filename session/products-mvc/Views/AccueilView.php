<?php
include_once '../Controllers/shop.controller.php';
include_once 'header.php';
ShopController::initShop();
?>
    <div class="container">
        <?php
            $_SESSION['shop']->displayBasket();
        ?>
        <div class="items"
             style="">
            <?php
            $_SESSION['shop']->displayItems();
            ?>
        </div>
    </div>
<?php
include_once 'footer.php';