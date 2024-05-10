<?php
    session_start();
    include "database.php";

    if(isset($_GET['deleteid'])){
        $id =$_GET['deleteid'];

        $sql = "delete from watch_info where watch_ID=$id";
        $result = mysqli_query($con, $sql);
        $_SESSION['status'] = "Added Successfully!";
        header("Location: admin-product.php");
    }



?>