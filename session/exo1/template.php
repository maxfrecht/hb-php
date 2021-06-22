<!doctype html>
<html lang="fr" class="count-page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <a href="./index.php">
                <li>accueil</li>
            </a>
            <a href="./page1.php">
                <li>page 1</li>
            </a>
            <a href="./page2.php">
                <li>page 2</li>
            </a>
            <a href="./page3.php">
                <li>page 3</li>
            </a>
            <a href="./page4.php">
                <li>page 4</li>
            </a>
        </ul>
    </nav>
    <h1 class="container">Nombre de visites par page</h1>
</header>
<main class="container">
    <div class="count">Nombre de visites : <?php echo $_SESSION['page1']; ?></div>
    <div class="count">Nombre de visites : <?php echo $_SESSION['page2']; ?></div>
    <div class="count">Nombre de visites : <?php echo $_SESSION['page3']; ?></div>
    <div class="count">Nombre de visites : <?php echo $_SESSION['page4']; ?></div>
</main>
</body>
</html>