<?php
    session_start();
    include "database.php";


    if(isset($_POST['addbtn'])){
        // $password = $_POST['confirmtxt'];

        // // Query to get the hashed password from the database based on ID
        // $sql_password = "SELECT * FROM admin_info WHERE Admin_Password ='$password'";
        // $existing_password =  mysqli_query($con, $sql_password);
        
        // if( $existing_password == $password){
            $img_loc = $_FILES['file']['tmp_name'];
            $img_name = $_FILES['file']['name'];
            $img_des = "uploads/".$img_name;
            move_uploaded_file($img_loc,'uploads/'.$img_name);

            $sql = "INSERT into watch_info(watch_Image,watch_Name,watch_Category,watch_Price,watch_Qty) values('$img_des','$_POST[txtname]','$_POST[txtcate]','$_POST[txtprice]','$_POST[txtqty]')";

            mysqli_query($con, $sql);
            // echo"
            // <script>
            //     alert('Added Successfully!');
            //     location.href='admin-books.php';
            // </script>
            // ";
            $_SESSION['status'] = "Added Successfully!";
            header("Location: admin-product.php");


        // }
        // else{
        //     echo"
        // <script>
        //     alert('Invalid Password');
        //     location.href='admin-books.php';
        // </script>
        // ";
        // }
    }
?>