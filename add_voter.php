<?php
error_reporting(0);
// session_start();
// if(empty($_SESSION['manager'])){
//     header("location:login.php");
//     exit;
// }

require_once("connection.php");
if(isset($_POST['regster'])){
    $iname=$_POST['iname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $place=$_POST['kituo'];
    $type="voter";
    $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $error=array();
    $img=$_FILES['image']["name"];
    // print_r($img);
    // die;

    if(empty($iname)||empty($dob)||empty($email)||empty($pass)){
       $smg="You must enter all form field";
    }
    else{
        
        move_uploaded_file($_FILES['image']["tmp_name"],"imagez/".$_FILES['image']["name"]);
    if(empty($error)){
        $insert = "INSERT INTO instution(iname,email,place,dob,typez,image,passwordz) VALUES('$iname','$email','$place','$dob','$type','$img','$pass')";
       
        $query = mysqli_query($conn,$insert);
        if($query){
            $smg = base64_encode("Your Success to add Voter");
            header("location:voter.php?sms=$smg");
        }
    }
        else{
            $smgg="fail to add manager";
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
                    <form action="add_voter.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ELECTION VOTER REGSTIRATION<H4>
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
                        <div>Voter Name: </div>
                    <div><input type="text" name="iname" id="iname" placeholder="Rajab Eliud" class="form-control"><span id="isms" class="error"></span></div>
                    <div>Date of Birth: </div>
                    <div><input type="date" name="dob" id="dob" min="2003-01-02" max="" class="form-control" ><span id="dsms" class="error"></span></div>
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
                    <div><input type="Emmail" name="email" placeholder="rajabeliud45@hotmail.com" class="form-control"><span id="esms" class="error"></span></div>
                    <div>Upload Passport: </div>
                    <div><input type="file" name="image" id="" class="form-control"></div>
                    
                    <div>Password: </div>
                    <div><input type="password" name="password" id="pass" placeholder="Password" class="form-control"><span id="psms" class="error"></span></div>
                   
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