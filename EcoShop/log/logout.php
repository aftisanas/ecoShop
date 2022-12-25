<?php 
session_start();

if (isset($_SESSION['adr8tw9qux'])) {
    $_SESSION['adr8tw9qux'] = array();

    session_destroy();

    header("Location: ../index.php");
} else {
    header("Location: ./login.php");
}

?>