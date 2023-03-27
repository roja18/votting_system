<?php

error_reporting(0);
session_start();
if(empty($_SESSION['voter'])){
    header("location:login.php");
    exit;
}
require_once("connection.php");
// if(isset($_POST['regster'])){
//     $error=array();
//     $part = $_POST["partie"];
//     $partsp = $_POST["partie_st"];
    
//     $img=$_FILES['file']["name"];

   

//     if(empty($part)||empty($partsp)){
//         $msgz="You must fill all form field";
//     }
//     else{
//         move_uploaded_file($_FILES['file']["tmp_name"],"imagez/".$_FILES['file']["name"]);
//     if(empty($error)){
//         $insert = "INSERT INTO parties(pname,pstg,image) VALUE('$part','$partsp','$img')";
//         // echo $insert ;die;
//         $query = mysqli_query($conn,$insert);
//         if($query){
//             $smg = base64_encode("Your Success to add Partie");
//             header("location:parties.php ? sms=$smg");
//         }
//     }
//         else{
//             $smg = base64_encode("Your Fail to add Partie");
//             header("location:parties.php ? sms=$smg");
//         }
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OVS | Vote</title>
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
        <?php require_once("cand_hed.php");?>
    </div>
    <!-- left end -->
    <!-- right -->
    <div class="col-md-10 col-sl-6 ">
    <div class="row">
    <!-- <div class="col-md-6">
    <a href="add_parties.php"><img src="image/user.GIF" alt="add manager" width="70vh" height="70vh"><br> Add Parties</a>
    </div>
    <div class="col-md-6">
    <a href="parts_pdf.php" class="addbtn" style="float:right; width:50%"><img src="image/pdf.PNG" alt="pdf" width="60vh" height="60vh"><br> Print Political Parts</a>
    </div> -->
    </div>
   
            <span class="error">
            
            <?php 
            error_reporting(0);
            $smg = $_GET['sms'];
            $smgs = $_GET['smss'];

            if(isset($smg)){
                echo"<div class='alert alert-success col-lg-12'>
                <strong>Success! </strong>".base64_decode($smg)."</div>";
            }
            elseif(isset($smgs)) {
                echo"<div class='alert alert-danger col-lg-12'>
                <strong>Error! </strong>".base64_decode($smgs)."</div>";
            }
            ?></span>
            <div class="table-responsive">
            <table border="1" class="tablez table table-striped">
                <tr class="bg-warning">
                <th>Sno</th>
                    <th>Image</th>
                    <th>Candidate Name</th>
                    <th>Partie</th>
                    <th>Position</th>
                    <th>Vote</th>
                </tr>
                <tr class="active">
                <?php
                    

                    require_once("connection.php");

                    $mimi = $_SESSION['voter'];
                    // echo $mimi;
                    $sel="SELECT place FROM instution WHERE email='$mimi'";
                 
                    $quer=mysqli_query($conn,$sel);
                    $arry=mysqli_fetch_array($quer);
                    $plc=$arry['place'];
                    // echo $plc;
                    $select = "SELECT * FROM candidates INNER JOIN instution on candidates.email=instution.email WHERE candidates.electionPlace='$plc'";
                    $query = mysqli_query($conn,$select);
                    $sno=1;
                    echo "<form action='vote.php'>";
                    while($array=mysqli_fetch_array($query)){
                       $img = $array['image'];
                        $cand = $array['candidate'];
                        $p1 = $array['email'];
                        $part = $array['part'];
                        $posit = $array['position'];
                        $cid=$array['id'];
                        // $adate = $array['adate'];
                        // $udate = $array['udate'];

                        echo "<td>$sno</td>";
                        echo "<td><img src='imagez/".$img."'width='80px' height='80px''></td>";
                        echo "<td>$cand</td>";
                        echo "<td>$part</td>";
                        echo "<td>$posit</td>";
                        echo "<td><a href='votePro.php ? vid=$p1'><input type='radio' name='vote' value='$cid'></a></td>";
                        // echo "<td>$udate</td>";
                        // echo "<td><a href='#'>Edit</a></td>";
                        // echo "<td><a href='#'>Delete</a></td>";
                        echo "</tr>";

                        $sno++;
                    }
                    // echo "</tr>";
                    // echo "<tr><td colspan='6'></td><td>";
                    // echo "<input type='submit' name='votee' value='VOTE'>";
                    echo "</td>  </table>";
                    ?>
                
                
            </div>
    </div>  
    <!-- right end -->
    
</div>
 
   
    </div>
    
</body>
</html>


