<?php
session_start();

if (isset($_SESSION['page1'])) {
    $_SESSION['page1']++;
}

include './template.php';

