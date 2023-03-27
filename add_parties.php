<?php

session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}

require_once("connection.php");
if(isset($_POST['regster'])){
    $error=array();
    $part = $_POST["partie"];
    $partsp = $_POST["partie_st"];
    
    $img=$_FILES['file']["name"];

   

    if(empty($part)||empty($partsp)){
        $msgz="You must fill all form field";
    }
    else{
        move_uploaded_file($_FILES['file']["tmp_name"],"imagez/".$_FILES['file']["name"]);
    if(empty($error)){
        $insert = "INSERT INTO parties(pname,pstg,image) VALUE('$part','$partsp','$img')";
        // echo $insert ;die;
        $query = mysqli_query($conn,$insert);
        if($query){
            $smg = base64_encode("Your Success to add Partie");
            header("location:parties.php?sms=$smg");
        }
    }
        else{
            $smg = base64_encode("Your Fail to add Partie");
            header("location:parties.php?sms=$smg");
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
    <title>OVS | Partie</title>
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
   <div class="row">
    <div class="col-md-2  linkz">
        <?php require_once("hed.php");?>
    </div>
    <!-- left end -->
    <!-- right -->
    <div class="col-md-10 ">
        <div class="card-deck-wrapper">
            <div class="card-deck">
                <div class="card col-md-6">
                    <form action="add_parties.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ADD PARTIES FORM<H4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            error_reporting(0);
                        
                            if(isset($msgz)){
                                echo"<div class='alert alert-danger col-lg-12'>
                                <strong>Error! </strong>".$msgz."</div>";
                                
                            }
                            
  

?>
                        <div class="form-group">
                        <div>Partie Name: </div>
                    <div><input type="text" name="partie" id="partie" placeholder="Parties Name" class="form-control"><span id="isms" class="error"></span></div>
                    <div>Partie Strogan: </div>
                    <div><input type="text" name="partie_st" id="partie_st" placeholder="Parties Strogan" class="form-control" ><span id="dsms" class="error"></span></div>
                    <div>Upload Flag: </div>
                    <div><input type="file" name="file" class="form-control"></div>
                    
                    
                    <div><br></div>
                        <input type="submit" name="regster" class="btn bg-success" value="Regster" onclick="return checkMy()">
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
    
</body>
</html>


<?php

?>