<?php
    session_start();
    unset($_SESSION['aunthenticated']);
    
    unset($_SESSION['auth_user']);
    $_SESSION['status'] = "You Logged Out Successdully";
    header("Location: sign.php");
?>