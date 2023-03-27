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
    <title>OVS | Dashboad</title>
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
    <div class="row mb-4">
   
   
    </div>
   
            <span class="error">
            
            <?php 
            error_reporting(0);
            $name=$_SESSION['manager'];
            $selec = "SELECT * FROM instution WHERE typez='manager' and email='$name'";
            $quer = mysqli_query($conn,$selec);
            $array=mysqli_fetch_array($quer);
            $iname = $array['iname'];
                echo"<div class='alert alert-success col-lg-12'>
                <strong>Success! </strong> Successfull Login Deal ".$iname."</div>";
            
            ?>
            
            <div class="table-responsive">
            <table border="1" class="tablez table table-striped">
                <tr class="bg-warning">
                    <th>Total Number Of Manager: </th>
                    <th>Total Number Of Voter</th>
                    <th>Number Of Parties</th>
                    <th>Number Of Election Center</th>
                    <th>Number Of Candidates</th>
                   
                </tr>
                <tr class="active">
                <?php
                    require_once("connection.php");
                    
                    $select = "SELECT COUNT(*) AS total FROM candidates";
                    $query = mysqli_query($conn,$select);
                    $array=mysqli_fetch_array($query);
                        $pname = $array['total'];

                    $sele = "SELECT COUNT(*) AS tota FROM instution WHERE typez='voter'";
                    $que = mysqli_query($conn,$sele);
                    $array=mysqli_fetch_array($que);
                    $cname = $array['tota'];

                    $sel = "SELECT COUNT(*) AS tota FROM parties";
                    $qu = mysqli_query($conn,$sel);
                    $array=mysqli_fetch_array($qu);
                    $part = $array['tota'];

                    $se = "SELECT COUNT(*) AS tota FROM instution WHERE typez='manager'";
                    $qu = mysqli_query($conn,$se);
                    $array=mysqli_fetch_array($qu);
                    $manager = $array['tota'];

                    $s = "SELECT COUNT(*) AS tota FROM eplace";
                    $qu = mysqli_query($conn,$s);
                    $array=mysqli_fetch_array($qu);
                    $eplace = $array['tota'];

                        echo "<td>$manager</td>";
                        echo "<td>$cname</td>";
                        echo "<td>$part</td>";
                        echo "<td>$eplace</td>";
                        echo "<td>$pname</td>";

                        
                        
                        echo "</tr>";

                        $sno++;
                    
                    
                    ?>
                
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