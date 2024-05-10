<?php
    session_start();

    if(!isset($_SESSION['aunthenticated'])){
        $_SESSION['status'] = "Please Login to Access User Dashboard!";
        header("Location: sign.php");
        exit(0);
    }

?>