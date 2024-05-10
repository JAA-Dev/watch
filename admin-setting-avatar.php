<?php
    session_start();
    include("admin-design/admin-header.php");
    include("admin-design/nav.php");

    /* <img width="50px" height="50px" src=<?=$_SESSION['auth_admin']['Profileadmin'] ?> alt="Profile">
                <h5><?=$_SESSION['auth_admin']['adminFullName'] ?></h5>*/
    
?>
    <div class="rigth-container">
        <div class="header-text">
            <h2>Setting</h2>
        </div>

        <div class="setting-container">
            <div class="left-con">
            
                <?php
                    include "database.php";
                    $sql = "Select * from admin_info";
                    $result = mysqli_query($con, $sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['Admin_ID'];
                            $first = $row['Admin_Img'];
                            $two = $row['Admin_FName'];
                            echo'
                                <img src="'.$first.'" alt="" width="120px" height="120px"> <br>
                                <h3>'.$two.'</h3>
                                <h3>Admin</h3>
                            ';
                        }
                    }

                ?>
                <div class="links">
                    <a href="admin-setting.php">Admin Information</a><br><br>
                    <a href="admin-setting-avatar.php">Change Avatar</a><br><br>
                    <a href="admin-setting-pass.php">Change Password</a><br><br>
                </div>

            </div>
            <div class="rifth-con text-center">
                <h2>Change Avatar</h2>
                <hr>
                <br>
                <form action="admin-setting-avatar-code.php" method="POST" enctype="multipart/form-data">
                <?php
                    include "database.php";
                    $sql1 = "Select * from admin_info";
                    $results = mysqli_query($con, $sql1);
                    if($results){
                        while($row1 = mysqli_fetch_assoc($results)){
                            $id = $row1['Admin_ID'];
                            $first = $row1['Admin_Img'];
                            $two = $row1['Admin_FName'];
                            $three = $row1['Admin_Email'];
                            $four = $row1['Admin_Username'];
                            $five = $row1['Admin_Password'];
                            echo'
                                <img src="'.$first.'" alt="" width="120px" height="120px"> <br>
                                <input type="file" name="file" id="file" accept="image/jpg, image/jpeg, image/png"> <br><br>
                                <input type="submit" class="sbtn" name="submit" value="Submit">
                            ';
                        }
                    }

                ?>
                </form>

            </div>
        </div>
    </div>



<?php
    include("admin-design/admin-footer.php");
?>