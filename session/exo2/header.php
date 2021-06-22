<nav>
    <?php
    include_once 'user.php';

    if(isset($_POST['pseudo'], $_POST['psw'])) {
        foreach($arrayUser as $pseudo => $psw) {
            if($_POST['pseudo'] === $pseudo && $_POST['psw'] === $psw) {
                session_start();
                $_SESSION['pseudo'] = $pseudo;
                break;
            }
        }
    }

    if (isset($_SESSION['pseudo'])) {
        ?>
        <h2><?php echo $_SESSION['pseudo'] ?></h2>
        <form action="index.php" method="get">
            <input type="text" name="deconnexion" id="deconnexion" value="deco" hidden>
            <input type="submit" value="Déconnexion">
        </form>
        <?php
    }
    ?>
</nav>
