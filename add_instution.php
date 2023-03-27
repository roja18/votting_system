<?php
error_reporting(0);
require_once("connection.php");
    // include required php mailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';
    // define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if(isset($_POST['regster'])){
    $iname=$_POST['iname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $place=$_POST['kituo'];
    $code = md5(rand());
    $statuz="waiting";
    $user_otp = rand(1000000,9999999);
    $type=$_POST['utype'];
    $nida=$_POST['nida'];
    $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $error=array();
    $img=$_FILES['image']["name"];
   
    if(empty($iname)||empty($dob)||empty($email)||empty($pass)){
       $smg="You must enter all form field";
    }
    else{
        
        move_uploaded_file($_FILES['image']["tmp_name"],"imagez/".$_FILES['image']["name"]);
    if(empty($error)){
        $insert = "INSERT INTO instution(iname,email,place,dob,typez,image,passwordz,nida,code,statuz,otp) VALUES('$iname','$email','$place','$dob','$type','$img','$pass','$nida','$code','$statuz','$user_otp')";
        // echo $insert;
        // die;
   
        $query = mysqli_query($conn,$insert);
       
        if($query){
            session_start();
            $code = $_SESSION['user_otp'];
        $_SESSION['email'] = $email;

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
            $mail->addAddress("$email");
            //allow HTML
            $mail->isHTML(true);
            // set email subject
            $mail->Subject = "Online voting system regstration";
            // set sender email
            $mail->setFrom("rojavote2021@gmail.com");
            // email body
            // $mail->Body = " <a href='http://localhost/project/voter/active.php?p=$email'>ACTIVATE</a> ";
            
            $mail->Body = "Hi <b>$iname</b> !! Your account is not activated. Please use this <b>$user_otp</b> activetion code to activate your account <b>$user_otp</b> thank You. ";
           //alt body
         
            // send email
            $send = $mail->Send();
            if($send){ echo 'Email Sent';}else{echo 'Error..!';};
            // close smto connection
            $mail->smtpClose();
            // header('location: login.php');

           $smg = base64_encode("Your Success to regster please login to your email account to activate you account");
            header("location:activate.php?sms=$smg");

        }
    }
        else{
            $smgg="fail to regster";
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
    <title>OVS | Regstration</title>
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
    <div class="main">
    <!-- left -->
<!--    <div class="row">
    <div class="col-md-2  linkz">
        <?php ?>
        
    </div> -->
    <!-- left end -->
    <!-- right -->
    <div class="container">
    <!-- <img src='imagez/mwamba.PNG'> -->
    <div class="col-md-10 ">
        <div class="card-deck-wrapper" style="margin: auto;">
            <div class="card-deck">
                <div class="card col-md-6">
                    <form action="add_instution.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ELECTION MANAGER REGSTIRATION<H4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            error_reporting(0);
                        
                            if(isset($smg)){
                                echo"<div class='alert alert-danger col-lg-12'>
                                <strong>Error! </strong>".$smg."</div>";
                                
                            }
                            
  

?>
                        <div class="form-group">
                        <div>Full Name: </div>
                    <div><input type="text" name="iname" id="iname" placeholder="Rajab Eliud" class="form-control"><span id="isms" class="error"></span></div>
                    <div>Date of Birth: </div>
                    <div><input type="date" name="dob" id="dob"  max="" class="form-control" ><span id="dsms" class="error"></span></div>
                    <div>Election Place: </div>
                    <div>
                    
                    <?php
                    
                        $selec = "SELECT * FROM eplace";
                        $quer = mysqli_query($conn,$selec);
                        echo "<div><select name='kituo' id='eplace' class='form-control'>";
                        echo "<option>---Select Election Place---</option>";
                        while($row=mysqli_fetch_array($quer)){
                            echo "<option value='".$row['nameplace']."'>".$row['nameplace']."</option>";
                        }
                        
                        echo "</select>";
                        
                    
                    ?>
                    <span id="asms" class="error"></span></div>
                    <div>Emmail Address</div>
                    <div><input type="Email" name="email" placeholder="rajabeliud45@hotmail.com" class="form-control"></div>
                    <div>NIDA Number</div>
                    <div><input type="Number" name="nida" placeholder="2000101820000527" class="form-control"></div>
                    <div>User Type</div>
                    <div><select name="utype" class="form-control">
                    	<option>---- Select Your Type ----</option>
                    	<option value="voter">Citizen - Mpiga kula</option>
                    	<option value="manager">Manager -Msimamizi</option>

                    </select></div>
                    <div>Upload Passport: </div>
                    <div><input type="file" name="image" id="" class="form-control"></div>
                    
                    <div>Password: </div>
                    <div><input type="password" name="password" id="pass" placeholder="Password" class="form-control"><span id="psms" class="error"></span></div>
                   
                    <div><br></div>
                        <input type="submit" name="regster" class="btn bg-success" value="Regster" onclick="return checkMy()">
                        <input type="reset" class="btn bg-warning" value="Clean">    
                        <div>i have an acccount <a href="login.php">Login</a>  </div>
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
    <!-- right end -->
    
</div>
 
   
    </div>
    
</body>
</html>


<?php

?>