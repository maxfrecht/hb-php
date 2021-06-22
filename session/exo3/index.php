<?php
include_once '../../assets/data/links.php';
include_once 'item.php';
$links['Role Play Game'] = '../rpg';
$links['Spotify Like'] = '../poo';
$links['e-commerce'] = './exo3';

if (isset($_POST)) {
    session_start();
//    $_SESSION = [];

    if (isset($_POST['name'])) {
        foreach ($items as $item => $price) {
            if ($item === $_POST['name']) {
                if (!(array_key_exists($_POST['name'], $_SESSION))) {
                    $_SESSION[$_POST['name']] = ['price' => $_POST['price'], 'quantity' => 1];
                } else {
                    $_SESSION[$_POST['name']]['quantity'] += 1;
                }
            }
        }

    }

    if (isset($_POST['delete'])) {
        if ($_SESSION[$_POST['delete']]['quantity'] === 1) {
            unset($_SESSION[$_POST['delete']]);
        } else {
            $_SESSION[$_POST['delete']]['quantity'] -= 1;
        }
    }

}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="commerce">
<?php include_once '../../nav.php' ?>
<div class="container">

    <?php
    if (isset($_SESSION)) {
        $totalPrice = 0;
        echo !empty($_SESSION) ? '<aside><h3>Panier</h3><ul>' : '';
        foreach ($_SESSION as $name => $values) {

            echo <<<HTML
                    <li>{$name} - {$values['price']}€ - quantité : {$values['quantity']}
                        <form action="http://localhost:8000/session/exo3/test.php" method="post">
                            <input type="text" name="delete" id="name" value="{$name}" hidden>
                            <input type="submit" value="Supprimer">
                        </form>
                    </li>
HTML;

            $totalPrice += $values['price'] * $values['quantity'];
        }
        echo $totalPrice > 0 ? '</ul><p>Prix Total : ' . $totalPrice . '€</p></aside>' : '</aside>';
    }
    ?>

    <div class="items"
         style="display:flex; justify-content:space-between; padding-top: 5rem; flex-wrap: wrap; min-width: 70%; width:100%">
        <?php
        foreach ($items as $item => $values) {
            echo <<<HTML
        <div class="item">
            <h2>{$item}</h2>
            <img src="{$values['logo']}">
            <p>{$values['price']}€</p>
            <form action="http://localhost:8000/session/exo3/test.php" method="post">
                <input type="text" name="name" id="name" value="{$item}" hidden>
                <input type="text" name="price" id="price" value="{$values['price']}" hidden>
                <input type="submit" value="Ajouter au panier">
            </form>
            
        </div>
HTML;
        }
        ?>
    </div>
</div>
</body>
</html>