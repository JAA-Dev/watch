<?php
    session_start();
    unset($_SESSION['aunthenticated']);
    
    unset($_SESSION['auth_admin']);
    $_SESSION['status'] = "You Logged Out Successdully";
    echo "<script>
                        
                        window.location.href='sign.php';
                        </script>";
?>