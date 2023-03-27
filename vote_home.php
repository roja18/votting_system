<?php

error_reporting(0);
session_start();
if(empty($_SESSION['voter'])){
    header("location:login.php");
    exit;
}
require_once("connection.php");
$em=$_SESSION['voter'];
$se = "SELECT place FROM instution WHERE email='$em'";
$qu = mysqli_query($conn,$se);
$ar = mysqli_fetch_array($qu);
$place = $ar['place'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OVS | Home</title>
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
    <h2 class="bg-warning text-center">Result of all candidate from your place <i><?php echo $place;?></i></h2>
    <div class="row">
    <!-- <div class="col-md-6">
    <a href="add_parties.php"><img src="image/user.GIF" alt="add manager" width="70vh" height="70vh"><br> Add Parties</a>
    </div>
    <div class="col-md-6">
    <a href="parts_pdf.php" class="addbtn" style="float:right; width:50%"><img src="image/pdf.PNG" alt="pdf" width="60vh" height="60vh"><br> Print Political Parts</a>
    </div> -->
    </div>
    <div class="col-md-12 col-sl-12 col-lg-12 md-4">
  <div class="row">
   <?php
   require_once("connection.php");
   $sel="SELECT COUNT(*) AS kura FROM result";
        $quer=mysqli_query($conn,$sel);
        $arry=mysqli_fetch_array($quer);
        $kura=$arry['kura'];
        // echo $kura;

    // $sele="SELECT candidate,COUNT(*) AS idadi, (COUNT(*)/'$kura')*100 AS average FROM result GROUP by kula ";
    //     $query=mysqli_query($conn,$sele);
    //     $array=mysqli_fetch_array($query);
    //     $candi=$array['candidate'];
    //     $idadi=$array['idadi'];
    //     $aver=$array['average'];

    $selec="SELECT COUNT(result.kula) AS idadi,(COUNT(*)/$kura)*100 as aver,instution.image, result.candidate, result.kula, result.cand, result.eplace, result.part, result.position FROM result,instution WHERE result.candidate=instution.email AND instution.place='$place'";
        $queryr=mysqli_query($conn,$selec);
        while($array=mysqli_fetch_array($queryr)){
        $cand=$array['iname'];
        $img = $array['image'];
        $part=$array['part'];
        $posi=$array['position'];
        $aver=$array['aver'];
        $kra=$array['idadi'];


        echo "<div class='col-md-6 md-4'>
                            <div class='card-deck-wrapper'>
                                <div class='card-deck'>
                                    <div class='card md-4'>
                                        <div class='card-body'>
                                        <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-md-4'>
                                            <img src='imagez/".$img."'width='150vh' height='150vh''>
                                            </div>
                                            <div class='col-md-8'>
                                            <b>Candidate Name: </b>".$cand."<br>  
                                            <b>Partie: </b>".$part."<br> 
                                            <b>Position: </b>".$posi."<br> 
                                            <b>Total Vote: </b>".$kra."<br> 
                                            <b>Vote Percent: </b>".$aver."%
                                            </div>
                                            </div> 
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> ";

    }  
   ?>
            


    </div>  
    <!-- right end -->
    
</div>
 
                                
   
    </div>
    
</body>
</html>



