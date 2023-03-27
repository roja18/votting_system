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
    <title>OVS | Candidate</title>
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
    <a href="add_candidates.php"><img src="image/user.GIF" alt="add manager" width="70vh" height="70vh"><br> Add candidates</a>
    </div>
    <div class="col-md-6">
    <a href="cand_pdf.php" class="addbtn" style="float:right; width:50%"><img src="image/pdf.PNG" alt="pdf" width="60vh" height="60vh"><br> Print Political Parts</a>
    </div>
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
                    <th>Candidate Email</th>
                    <th>Candidate Name</th>
                    <th>Candidate Image</th>
                    <th>Candidate Election Place</th>
                    <th>Candidate Partie</th>
                    <th>Position Election Position</th>
                    <th>Added Date</th>
                    <th>Updated Date</th>
                   <th>Delete</th>
                </tr>
                <tr class="active">
                <?php
                    require_once("connection.php");
                    
                    $select = "SELECT * FROM candidates INNER JOIN instution on candidates.email=instution.email ";
                    $query = mysqli_query($conn,$select);
                    $sno=1;
                    while($array=mysqli_fetch_array($query)){
                        $pname = $array['email'];
                        $cname = $array['candidate'];
                        $cimage = $array['image'];
                        $cplace = $array['electionPlace'];
                        $part = $array['part'];
                        $posit = $array['position'];
                        $adate = $array['adate'];
                        $udate = $array['udate'];
                        $id = $array['id'];

                        echo "<td>$sno</td>";
                        echo "<td>$pname</td>";
                        echo "<td>$cname</td>";
                        echo "<td><img src='imagez/".$cimage."'width='80px' height='80px''></td>";
                        echo "<td>$cplace</td>";
                        echo "<td>$part</td>";
                        echo "<td>$posit</td>";
                        echo "<td>$adate</td>";
                        echo "<td>$udate</td>";
                        echo "<td><a href='del_cand.php?pid=$id'class='bg-danger btn'>Delete</a></td>";
                        echo "</tr>";

                        $sno++;
                    }
                    
                    ?>
                
                <tr class="bg-warning">
                    <th>Sno</th>
                    <th>Candidate Email</th>
                    <th>Candidate Name</th>
                    <th>Candidate Image</th>
                    <th>Candidate Election Place</th>
                    <th>Candidate Partie</th>
                    <th>Position Election Position</th>
                    <th>Added Date</th>
                    <th>Updated Date</th>
                    <th>Delete</th>
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