<?php
error_reporting(0);
session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}

require_once("connection.php");
if(isset($_POST['regster'])){
    $iname=$_POST['iname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $place=$_POST['kituo'];
    $type="manager";
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
            $smg = base64_encode("Your Success to add Manager");
            header("location:reg_instution.php?sms=$smg");
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
    <div class="col-md-10 col-sl-6 ">
    <div class="row">
    <div class="col-md-6">
    <!-- <a href="add_instution.php"><img src="image/user.GIF" alt="add manager" width="70vh" height="70vh"><br> Regster Manager</a> -->
    </div>
    <div class="col-md-6">
    <a href="manager_pdf.php" class="addbtn" style="float:right; width:50%"><img src="image/pdf.PNG" alt="pdf" width="60vh" height="60vh"><br> Print Manager</a>
    </div>
    </div>
   
            <span class="error">
            
            <?php 
            error_reporting(0);
            $smg = $_GET['sms'];

            if(isset($smg)){
                echo"<div class='alert alert-success col-lg-12'>
                <strong>Success! </strong>".base64_decode($smg)."</div>";
            }
            ?></span>
            <div class="table-responsive">
            <table border="1" class="tablez table table-striped">
                <tr class="bg-warning">
                    <th>Sno</th>
                    <th>Manager Name</th>
                    <th>Image</th>
                    <th>Date of Birth</th>
                    <th>Election Place</th>
                    <th>Email</th>
                    <!-- <th>Date Regsted</th>
                    <th>Date Updated</th> -->
                    <!-- <th>Edit</th> -->
                    <!-- <th>Delete</th> -->
                </tr>
                <tr class="active">
                    <?php
                    require_once("connection.php");
                    
                    $select = "SELECT * FROM instution WHERE typez='manager'";
                    $query = mysqli_query($conn,$select);
                    $sno=1;
                    while($array=mysqli_fetch_array($query)){
                        $iname = $array['iname'];
                        $aname = $array['dob'];
                        $place = $array['place'];
                        $email = $array['email'];
                        $id = $array['id'];
                        $adate = $array['adate'];
                        $udate = $array['udate'];
                        $img = $array['image'];

                        echo "<td>$sno</td>";
                        echo "<td>$iname</td>";
                        echo "<td><img src='imagez/".$img."'width='80px' height='80px''></td>";
                        echo "<td>$aname</td>";
                        echo "<td>$place</td>";
                        echo "<td>$email</td>";
                        // echo "<td>$adate</td>";
                        // echo "<td>$udate</td>";
                        // echo "<td><a href='#'>Edit</a></td>";
                        // echo "<td><a href='#'>Delete</a></td>";
                        echo "</tr>";

                        $sno++;
                    }
                    
                    ?>
                
                <tr class="bg-warning">
                    <th>Sno</th>
                    <th>Manager Name</th>
                    <th>Image</th>
                    <th>Date of Birth</th>
                    <th>Election Place</th>
                    <th>Email</th>
                    <!-- <th>Date Regsted</th>
                    <th>Date Updated</th> -->
                    <!-- <th>Delete</th> -->
                </tr>
            </table>
            </div>
    </div> 
    <!-- right end -->
    
</div>
 
   
    </div>
    
    
</body>
</html>


<?php

?>