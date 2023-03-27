<?php
error_reporting(0);

require_once("connection.php");
$smg= $_GET['sms'];
$smgz = $_GET['smgz']
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
            <form action="loginProc.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ONLINE ELECTION LOGIN FORM<H4>
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
                        <div>Username:  </div>
                    <div><input type="email" name="email" id="email" placeholder="Rajab@gmail.com" class="form-control"><span id="isms" class="error"></span></div>
                    <div>Password: </div>
                    <div><input type="password" name="password" id="pass" placeholder="password" class="form-control" ><span id="dsms" class="error"></span></div>
                    
                    <div><br></div>
                        <input type="submit" name="login" value="Login" class="btn bg-success" value="Regster" onclick="return checkMy()">
                        <input type="reset" class="btn bg-warning" value="Clean">      
                    </div>    
                    <div class="form-group mb-2">
        
                    i don't have an account <a href="add_instution.php">click to Register</a><br>
                    Forget Password <a href="forgotPsw.php">click to Reset</a><br>
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