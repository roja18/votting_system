<?php
error_reporting(0);
    // include required php mailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';
    // define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

require_once("connection.php");
$smg= $_GET['sms'];
$smgz = $_GET['smsz'];
if(isset($_POST['send'])){
    $email = $_POST['email'];
    $select = "SELECT email FROM instution WHERE email='$email'";
    $query = mysqli_query($conn,$select);
    $array = mysqli_fetch_array($query);
    $myemail=$array['email'];
    if($email!=$myemail){
        $smg = base64_encode("Your Email does not exist");
    }
    else{
        $pass=rand(10000000,99999999);
         session_start();
         $_SESSION['passw'] = $pass;
        $update = "UPDATE instution SET passwordz='$pass' WHERE email='$email'";
        $quer = mysqli_query($conn,$update);
        if($quer){
            // create instance of phpmailer
            $mail = new PHPMailer();
            // set mailer to use smtp
            $mail->isSMTP();
            // define smtp host
            $mail->Host = "smtp.gmail.com";
            // enable smtp authentication
            $mail->SMTPAuth = "true";
            // set type of encryption (ssl/tls)
            $mail->SMTPSecure = "tls";
            // set port to connect smtp
            $mail->Port = "587";
            // set gmail username
            $mail->Username = "rojavote2021@gmail.com";
            // set gmail password
            $mail->Password = "@rojavote21";
            // add recipient
            $mail->addAddress($email);
            //allow HTML
            $mail->isHTML(true);
            // set email subject
            $mail->Subject = "Online voting system regstration password reset";
            // set sender email
            $mail->setFrom("rojavote2021@gmail.com");
            // email body
            // $mail->Body = " <a href='http://localhost/project/voter/active.php?p=$email'>ACTIVATE</a> ";
            
            $mail->Body = "Your account success to reset your password. your new password is <b>$pass</b>. use your new password create another new one <br> <i> thank you!</i>";
           //alt body
           // $mail->AltBody ="Your account is not activated. You can not access your account until you activate it. To activate your account click type this to ken to activate form YOUR TOKEN IS = $user_otp";
            // send email
            $send = $mail->Send();
            if($send){ echo 'Email Sent';}else{echo 'Error..!';};
            // close smto connection
            $mail->smtpClose();
            // header('location: login.php');

           $smg = base64_encode("Your Success to reset password enter password we send to your email and create new one with comfim password");
            header("location:password_reset.php?smsz=$smg");

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OVS | Voter</title>
    <script type="text/javascript" src="javascript/validation.js"></script>
    <script type="text/javascript" src="javascript/validation2.js"></script>
    
        
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/addition.css">
  
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- heading -->
    <div class="jumbotron">
        <h1 class="text-center display-1 myhed">ONLINE VOTTING SYSTEM</h1>
    </div>
    <!-- heading end -->
    <!-- <div class="main"> -->
    <!-- left -->
   <!-- <div class="row meme"> -->
 
    <!-- left end -->
    <!-- right -->
    <div class="container">
 
  

    <div class="col-md-10 mt-4">

        <div class="card-deck-wrapper" style="margin: auto;">
            
            <div class="card-deck">
                <div class="container">
                <div class="card col-md-6 meme">
            <div class="card">
            <form action="forgotPsw.php" method="POST" name="reg">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ONLINE ELECTION SET PASSWORD<H4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            error_reporting(0);
                        
                            if(isset($smg)){
                                echo"<div class='alert alert-danger col-lg-12'>
                                <strong>Error! </strong>".base64_decode($smg)."</div>";
                                
                            }
                            elseif(isset($smgz)){
                                echo"<div class='alert alert-success col-lg-12'>
                                <strong>Success! </strong>".base64_decode($smgz)."</div>";
                                
                            }
                         
  

?>
                        <div class="form-group">
                        <div>Enter Email:  </div>
                    <div><input type="email" name="email" id="email" placeholder="Rajab@gmail.com" class="form-control"><span id="isms" class="error"></span></div>
               
                    
                    <div><br></div>
                        <input type="submit" name="send" value="Send" class="btn bg-success" value="Regster" onclick="return checkMy()">
                           
                    </div>    
                    <div class="form-group mb-2">
        
                    back to <a href="login.php">login</a><br>
                    </div>  
                    </div> 
                    </div>
                    </form>

            </div>       
            </div>
                </div>
            </div>
        </div>
        </div> 
<!--        
        </div>
    </div>  -->
    <!-- right end -->
    
</div>
 
   
    </div>
    
</body>
</html>


<?php

?>