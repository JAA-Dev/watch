<?php
    session_start();
    $page_title = "Delete";
    include "database.php";
    if(isset($_GET['deleteid'])){
        $id =$_GET['deleteid'];

        $sql = "delete from category where Category_ID=$id";
        mysqli_query($con, $sql);

        // echo"
        // <script>
        //     alert('Deleted Successfully!');
        //     location.href='./admin-category.php';
        // </script>
        // ";
        $_SESSION['status'] = "Deleted Successfully!";
        header("Location: admin-category.php");

    }

?>