<?php
    session_start();
    include "database.php";
    $ids = implode(",",$_GET['ids']);
    $delete = "DELETE FROM watch_info WHERE watch_ID in($ids)";
    mysqli_query($con, $delete);
    // echo "
    //     <script>
    //         alert('Deleted Successfully!');
    //         window.location.href='admin-books.php';
    //     </script>
    //     ";
    $_SESSION['status'] = "Deleted Successfully!";
    header("Location: admin-product.php");
        


?>