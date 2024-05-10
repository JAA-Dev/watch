<?php
    session_start();
    include "database.php";
    $sql = "INSERT into category(Category_Name) values('$_POST[txtname]')";
    mysqli_query($con, $sql);

    // echo"
    // <script>
    //     alert('Added Successfully!');
    //     location.href='./admin-category.php';
    // </script>
    // ";
    $_SESSION['status'] = "Added Successfully!";
    header("Location: admin-category.php");
?>