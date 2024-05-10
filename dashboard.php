<?php
include('authentication.php');
$page_title = "Dashboard Page";
include('includes/header.php');
include('includes/navigation.php')
?>

<div class="py-5">
    <div class="container">
        <div class="col-nd-12 ">
            
        <?php
                if(isset($_SESSION['status'])){
                    ?>
                    <div class="alert alert-success">
                        <h4><?=$_SESSION['status']; ?></h4>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>User Dashboard</h4>
                </div>
                <div class="card-body">
                    <h2>Access when you are Logged in</h2>
                    <hr>
                    <img  width="150px" height="150px" src=<?=$_SESSION['auth_user']['ProfilePic'] ?> alt="">
                    <h5>Username: <?=$_SESSION['auth_user']['FullName'] ?></h5>
                    <h5>Email: <?=$_SESSION['auth_user']['Email'] ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>