<?php
    if(isset($_GET['deconnexion'])) {
        $_SESSION = [];
        session_destroy();
        header('Location: http://localhost:8000/session/exo2/test.php');
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
</head>
<body>
<?php include 'header.php'; ?>
<form action="index.php" method="post">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo">
    <label for="psw">Mot de passe</label>
    <input type="text" name="psw" id="psw">
    <input type="submit" value="Connexion">
</form>
</body>
</html>
