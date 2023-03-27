<?php

error_reporting(0);
session_start();
if(empty($_SESSION['voter'])){
    header("location:login.php");
    exit;
}
$mtu = $_SESSION['voter'];
require_once("connection.php");
if(isset($_POST['regster'])){
   
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    if(empty($npass)||empty($cpass)){
        $msgz ="You must fill all form";

    }
    else{
        if($npass!=$cpass){
            $msgz = "New Password and Comfim Password must be the same";
        }
        else{
            $cfpass = password_hash($cpass,PASSWORD_DEFAULT);
            $update = "UPDATE instution SET passwordz='$cfpass' WHERE email='$mtu'";
            
            $query = mysqli_query($conn,$update);
            if($query){
                $msgz = "You success to Change Password";
                header("location:logout.php");
            }
            else{
                $msgz = "Fail to Change Password";
                
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
    <title>OVS | Result</title>
    <script type="text/javascript" src="javascript/validation.js"></script>
    <script type="text/javascript" src="javascript/validation2.js"></script>
    
        
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/addition.css">
  
    
</head>
<body>
    <!-- heading -->
    <div class="jumbotron">
        <h1 class="text-center display-1 myhed">ONLINE VOTTING SYSTEM</h1>
    </div>
    <!-- heading end -->
    <div class="main">
    <!-- left -->
   <div class="row">
    <div class="col-md-2  linkz">
        <?php require_once("cand_hed.php");?>
    </div>
    <!-- left end -->
    <!-- right -->
    <div class="col-md-10 ">
        <div class="card-deck-wrapper">
            <div class="card-deck">
                <div class="card col-md-6">
                    <form action="voter_cpass.php" method="POST" name="reg">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">CHANGE PASSWORD<H4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            error_reporting(0);
                        
                            if(isset($msgz)){
                                echo"<div class='csms alert alert-danger col-lg-12'>
                                <strong>Error! </strong>".$msgz."</div>";
                                
                            }
                        ?>
                        
                        <div class="form-group">
                    <div>New Password: </div>
                    <div><input type="Password" name="npass" id="npass" placeholder="New Password" class="form-control" ><span id="dsms" class="error"></span></div>
                    <div>Confim Password: </div>
                    <div><input type="Password" name="cpass" id="npass" placeholder="Comfim Password" class="form-control" ><span id="dsms" class="error"></span></div>
                                        
                    <div><br></div>
                        <input type="submit" name="regster" class="btn bg-success" value="Change" onclick="return checkMy()">
                        <input type="reset" class="btn bg-warning" value="Clean">      
                    </div>    
                        
                    </div> 
                    </div>
                    </form>
                </div>
            </div>
        </div>

       
        </div>
    </div>  
    <!-- right end -->
    
</div>
 
                                
   
    </div>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstrap/js/addjs.js"></script>  
</body>
</html>


