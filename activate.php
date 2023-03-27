<?php
error_reporting(0);

require_once("connection.php");
$smg= $_GET['sms'];
session_start();
$codes = $_SESSION['user_otp'];
$email = $_SESSION['email'];
// echo $email;
// die;
if(isset($_POST['activet'])){
    $token = $_POST['code'];
    $select = "SELECT * FROM instution WHERE email='$email'";
    $query = mysqli_query($conn,$select);
    $array = mysqli_fetch_array($query);
    $code = $array['code'];
    $statuz =$array['statuz'];
    $otp = $array['otp'];
    $utype = $array['typez'];

    // echo $utype;
    // die;
    if($otp==$token){
        // $smgz = "Invide Token";  
    
        if($utype=='manager'){
            $update = "UPDATE instution SET code='000000',statuz='active' WHERE email = '$email'";
        $query = mysqli_query($conn,$update);
        if($query){
            $smg = base64_encode("Your Success to activet your account you can login now");
            header("location:login.php ? smsz=$smgz");
        }
        else{
            $smgz = "Fail to activate";
        }
}
        elseif ($utype=='voter') {
            $update = "UPDATE instution SET code='000000',statuz='inactive' WHERE email = '$email'";
        $query = mysqli_query($conn,$update);
        if($query){
            $smg = base64_encode("Your Success to activet your account you can wait for manager on your location to change your account from wait to active");
            header("location:login.php ? smsz=$smgz");
        }
        else{
            $smgz = "Fail to activate";
        }
    }
       
  
    }
        else{
        $smgz = "Invide Token";  

        }   
}

// echo $code;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OVS | Activetion</title>
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
            <form action="activate.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ONLINE ELECTION ACCOUNT ACTIVATION FORM<H4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            error_reporting(0);
                         echo $codes;
                        

                            if(isset($smg)){
                                echo"<div class='alert alert-success col-lg-12'>
                                <strong>Success! </strong>".base64_decode($smg)."</div>";
                                
                            }
                            elseif(isset($smgz)){
                                echo"<div class='alert alert-warning col-lg-12'>
                                <strong>Error! </strong>".$smgz."</div>";
                                
                            }


?>
                        <div class="form-group">
                        <div>Activetion Code:  </div>
                    <div><input type="number" name="code" placeholder="224455" class="form-control"><span id="isms" class="error"></span></div>
                                        
                    <div><br></div>
                        <input type="submit" name="activet" value="Activete" class="btn bg-success" value="Regster" onclick="return checkMy()">
                          
                    </div>    
                    <div class="form-group mb-2">
        
                   <!--  i don't have an account <a href="add_instution.php">click to Register</a><br>
                    Forget Password <a href="#">click to Reset</a><br> -->
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