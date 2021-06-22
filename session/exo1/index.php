<?php
session_start();
if (!isset($_SESSION['page1'], $_SESSION['page2'], $_SESSION['page3'], $_SESSION['page4'])) {
    $_SESSION['page1'] = 0;
    $_SESSION['page2'] = 0;
    $_SESSION['page3'] = 0;
    $_SESSION['page4'] = 0;
}
include './template.php';
