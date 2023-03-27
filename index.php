<?php
error_reporting(0);

require_once("connection.php");
$smg= $_POST['sms'];
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
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/addition.css">
    <link rel="stylesheet" href="./bootstrap/css/bodyindex.css">

  
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <style>
        .bode{
            backgroud-color:blue;
        }
        .backgr{
            position:absolute;
            width:100%;
            height:100vh;
            animation:animate 16s ease-in-out infinite;
            
        }
        
        @keyframes animate{
            0%,100%{
                background-image:url(image/1.jpg);
                background-size:cover;
            }
            25%{
                background-image:url(image/2.jpg);
                background-size:cover;
            }
            50%{
                background-image:url(image/3.jpeg);
                background-size:cover;
            }
            75%{
                background-image:url(image/4.jpeg);
                background-size:cover;
            }
        }
    </style>
</head>
<body>
    <!-- heading -->
    <div class="jumbotron">
        <h1 class="text-center display-1 myhed">ONLINE VOTTING SYSTEM</h1>
    </div>
    <!-- heading end -->
    <div class="backgr">
    <div class="main">
    <!-- left -->
   <div class="row">
 
    <!-- left end -->
    <!-- right -->
    <div class="col-md-10 mt-4">
    <div class="container">
    <div class="bode">
            <div class="imgback">
                <div class="imgtext">
                    <h1 class="display-4 ">Wellcome to Online Votting System</h1>
                    <a href="add_instution.php" class="btn bg-success">Create Account</a>  
                    <a href="login.php" class="btn bg-warning">Login</a>
                   
                </div>
            </div>
        </div>
     <!--    <div class="card meme">
   
        </div> -->
</div>                      

    </div> 
    <!-- right end -->
    
</div>
 
   
    </div>
    </div>  
</body>
</html>


<?php

?>