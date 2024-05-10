<?php
session_start();
$page_title = "NOVA TIME";
include("database.php");
include('includes/header.php');
include('includes/navigation.php');
include('includes/hero.php');
?>
    <div class="login-container-register">
        <form action="" method="POST" enctype="multipart/form-data">
            <a id="back-btn" href="home.html">X</a>
            <h2 class="login-text">Register to NOVA <span class="link-color">TIME</span></h2>
            <div class="alert text-center">
                    <?php
                        if(isset($_SESSION['status'])){
                            echo"<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
            </div>
            <input id="fName" name="txtname" type="text" placeholder="Full Name"> <br>
            <input id="lName" name="txtemail" type="text" placeholder="Email"> <br>
            <input id="userName" name="txtuser" type="text" placeholder="Username"> <br>
            <input id="pass1" name="pass1" type="password" placeholder="Password"> <br>
            <input id="pass1" name="pass2" type="password" placeholder="Confirm Password"> <br>
            <input id="btn1" type="submit" name="submit" value="Sign Up" formaction="register-code.php"><br>
            <p class="link-tothers">Already have an account? <a class="link-color" href="sign.php">Login here</a></p>
        </form>
    </div>


<?php include('includes/footer.php') ?>