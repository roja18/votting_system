<?php
error_reporting(0);
session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}
$pid = $_SESSION['manager'];
// echo $pid;
require_once("connection.php");
$select = "SELECT * FROM instution WHERE typez='manager' and email='$pid'";
$quer = mysqli_query($conn,$select);
$array=mysqli_fetch_array($quer);
$iname = $array['iname'];
$aname = $array['dob'];
$place = $array['place'];
$email = $array['email'];
$id = $array['id'];
$img = $array['image'];


// ========================update================================

if(isset($_POST['regster'])){
    $iname=$_POST['iname'];
    $emai=$_POST['email'];
    $dob=$_POST['dob'];
    $vid=$_POST['myid'];
    $passwd = $_POST['password'];
    $cpasswd = $_POST['cpassword'];
    $passw=password_Hash($passwd,PASSWORD_DEFAULT);
    $error=array();
    if($passwd!=$cpasswd){
        $smg = "New password and Confim password must be the same";
    }
    else{
    $img=$_FILES['image']["name"];
    // print_r($img);
    // die;

   
        
        move_uploaded_file($_FILES['image']["tmp_name"],"imagez/".$_FILES['image']["name"]);
    if(empty($error)){
        $insert = "UPDATE instution SET iname='$iname',dob='$dob',image='$img',passwordz='$passw', email='$pid' WHERE email='$pid'";
        // echo $insert;
        // die;
        $query = mysqli_query($conn,$insert);
        if($query){
            $smg = base64_encode("Your Success to Update Manager");
            header("location:logout.php?sms=$smg");
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
    <title>OVS | Manager</title>
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
                    <form action="edit_pelson.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">UPDATE PERSON INFORMATION<H4>
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
                        <div>Emmail Address</div>
                    <div><input type="Emmail" name="email" value="<?php echo $email; ?>" class="form-control"><span id="esms" class="error"></span></div>
                    
                        <div>Full Name: </div>
                    <div><input type="text" name="iname" id="iname" value="<?php echo $iname; ?>" class="form-control"><span id="isms" class="error"></span></div>
                    <div>Date of Birth: </div>
                    <div><input type="date" name="dob" id="dob"   value="<?php echo $aname; ?>" class="form-control" ><span id="dsms" class="error"></span></div>
                    <!-- <div>Election Place: </div>-->
                    <div>
                    
                    <?php
                    
                        // $selec = "SELECT * FROM eplace";
                        // $quer = mysqli_query($conn,$selec);
                        // echo "<div><select name='kituo' id='eplace' class='form-control'>";
                        // echo "<option>---Select Election Place---</option>";
                        // while($row=mysqli_fetch_array($quer)){
                        //     echo "<option value='".$row['nameplace']."'>".$row['nameplace']."</option>";
                        // }
                        
                        // echo "</select>";
                        
                    
                    ?>
                    <!-- <span id="asms" class="error"></span></div> -->
                    <div>New Password: </div>
                    <div><input type="password" name="password" id="pass" placeholder="Enter New Password" class="form-control"><span id="psms" class="error"></span></div>
                    <div>Comfim Password: </div>
                    <div><input type="password" name="cpassword" id="cpass" placeholder="Confim New Password" class="form-control"><span id="psms" class="error"></span></div>
                   
                    <div>Upload Passport: </div>
                    <div><input type="file" name="image" value="<?php echo $img; ?>" class="form-control"></div>
                    <div><input type="hidden" name="myid" value="<?php echo $pid; ?>"></div>
                   
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
    
</body>
</html>


<?php

?>