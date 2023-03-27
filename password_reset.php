<?php
error_reporting(0);

require_once("connection.php");
$smg= $_GET['sms'];
$smgz = $_GET['smsz'];
if(isset($_POST['set'])){
    $epass =$_POST['epass'];
    $npass = $_POST['npassword'];
    $cpass = $_POST['cpassword'];
    $spass = password_hash($cpass, PASSWORD_DEFAULT);

    if($npass!=$cpass){
        $smg =base64_encode("New password and Comfim Password Must be the same");
    }
    else{
        $select = "SELECT passwordz FROM instution WHERE passwordz='$epass'";
        $query = mysqli_query($conn,$select);
        $array = mysqli_fetch_array($query);
        $mypass=$array['passwordz'];
        if($epass!=$mypass){
            $smg =base64_encode("incorrect password");

        }
        else{
        
        $update = "UPDATE instution SET passwordz='$spass' WHERE passwordz='$mypass'";
        $querye = mysqli_query($conn,$update);
        if($querye){

        $smg =base64_encode("success reset password you can now login with new password you create");
        header("location:login.php?smgz=$smg");

        }

        else{
        $smg =base64_encode("fail to update password");

        }
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
            <form action="password_reset.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ONLINE ELECTION PASSWORD RESET FORM<H4>
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
                        <div>Password send via Email:  </div>
                    <div><input type="text" name="epass"  placeholder="123456" class="form-control"><span id="isms" class="error"></span></div>
                    <div>New Password: </div>
                    <div><input type="password" name="npassword" id="pass" placeholder="new password" class="form-control" ><span id="dsms" class="error"></span></div>
                    <div>Comfim Password: </div>
                    <div><input type="password" name="cpassword" id="pass" placeholder="comfim password" class="form-control" ><span id="dsms" class="error"></span></div>
                    
                    <div><br></div>
                        <input type="submit" name="set" value="Reset" class="btn bg-success" value="Regster" onclick="return checkMy()">
                        <input type="reset" class="btn bg-warning" value="Clean">      
                    </div>    
                    <div class="form-group mb-2">
        
                   
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