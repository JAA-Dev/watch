<?php
    session_start();
    include "database.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\watch\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\watch\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\watch\PHPMailer\src\SMTP.php';

    function sendemail_verify($name,$email,$verify_token){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'bookbyte05@gmail.com';                     //SMTP username
            $mail->Password   = 'unezcbslyeyllgxv';                               //SMTP password
            $mail->SMTPSecure = 'ssl';
            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($email, 'Nova Time');
            $mail->addAddress($email, $name);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification from Nova Time';
            $mail->Body    = "
            <h2>You have Registered with Nova Time</h2>
            <h5>Verify your email address to Login with a given link bellow</h5> <br>
            <a href='http://localhost/watch/verify-email.php?token=$verify_token'>Click Me</a>
            ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo '<script>alert("Message has been sent")</script>';
            // header('Location:register.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
        // echo "Message has been sent";
    }


    if(isset($_POST['submit'])){
 

        $duplicate = mysqli_query($con, "Select * from user_info where User_Username = '$_POST[txtuser]'");
        if(mysqli_num_rows($duplicate) > 0){
            // echo 
            // "<script> alert('Username is Already Taken');
            // window.location.href='register.php';
            //  </script>";
            $_SESSION['status'] = "Username is Already Taken";
            header("Location: signup.php");
        }
        else{
            if($_POST["pass1"] == $_POST["pass2"]){
                $name = $_POST['txtname'];
                $user = $_POST['txtuser'];
                $email = $_POST['txtemail'];
                $password = $_POST['pass1'];
                $verify_token = md5(rand());
                // $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

                //try
                // sendemail_verify("$name","$email","$verify_token");
                // echo "send or not";
        
                $check_email_query = "SELECT User_Email from user_info where  User_Email='$email' LIMIT 1";
                $check_username_query = "SELECT User_Username from user_info where  User_Username='$user' LIMIT 1";
                $check_email_query_run = mysqli_query($con, $check_email_query);
                $check_username_query_run = mysqli_query($con, $check_username_query);
            
        
                if(mysqli_num_rows($check_email_query_run) > 0){
                    $_SESSION['status'] = "Email is already Exists";
                    header("Location: signup.php");
                }
        
                if(mysqli_num_rows($check_username_query_run) > 0){
                    $_SESSION['status'] = "Username is already Exists";
                    header("Location: signup.php");
                }
            
                else{
                    //insert user/ register user data
                    $query = "INSERT into user_info(User_FName,User_Username,User_Email,User_password,verify_token,User_Img,verify_status) values('$name','$user','$email','$password','$verify_token','default-profile-image.jpg','Not Verify')";
                    $query_run = mysqli_query($con, $query);
        
                    if($query_run){
                        sendemail_verify("$name","$email","$verify_token");
                        
                        echo '<script>
                        alert("Registration Successfull.! Please verify your Email Address.");
                        window.location.href="sign.php";</script>';   

                        // $_SESSION['status'] = "Registration Successfull.! Please verify your Email Address.";
                        // header("Location: sign.php");
                    }else{
                        // echo '<script>alert("Register Failed");
                        // window.location.href="register.php";</script>';
                        $_SESSION['status'] = "Register Failed";
                        header("Location: signup.php");
                    }
                }   
            }
            else{
                // echo "<script> alert('Password Doesnt Match');
                // location.href='register.php'; </script>";
                $_SESSION['status'] = "Password Doesnt Match";
                header("Location: signup.php");
            }
        }
    }



?>