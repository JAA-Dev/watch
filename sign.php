<?php
session_start();
if(isset($_SESSION['aunthenticated'])){
    $_SESSION['status'] = "You are already Logged In";
    header("Location: dashboard.php");
    exit(0);
}


$page_title = "NOVA TIME";
include("database.php");
include('includes/header.php');
include('includes/navigation.php');
include('includes/hero.php');
?>
<div class="login-container">
    <!-- <div class="login-container"> -->
    <form action="" method="POST" enctype="multipart/form-data">
        <a id="back-btn" href="home.html">X</a>
        <h2 class="login-text">Welcome to NOVA <span class="link-color">TIME</span></h2>
        <p id="login-text">Welcome to our ecommerce app! We are happy to invite you to explore the <br>
        amazing world of online shopping.</p>   
        <!-- <div class="alert text-center"> -->
            <?php
                if(isset($_SESSION['status'])){
                    ?>
                    <div class="alert alert-success text-center">
                        <h4><?=$_SESSION['status']; ?></h4>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
            ?>
        <!-- </div> -->
        <input id="text" type="text" name="txtuser" placeholder="Username"> <br>
        <input id="pass" type="password" name="txtpass" placeholder="Password"> <br>
        <a id="link" href="forgot.php">Forgot Password</a> <br> <br>
        <input id="btn1" type="submit" name="submit" value="Login" formaction="login-code.php"><br>
        <!-- <button id="btn1" onclick="add()">Login</button> -->
        <p class="link-tothers">Not have an account? <a class="link-color" href="signup.php">Sign Up here</a></p>
            
    </form>
</div>


<?php include('includes/footer.php'); ?>