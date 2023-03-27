<?php

error_reporting(0);
session_start();
if(empty($_SESSION['voter'])){
    header("location:login.php");
    exit;
}
require_once("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OVS | Result</title>
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
   
    </div>
    <div class="col-md-12 col-sl-12 col-lg-12 md-4">
    <h2 class="bg-warning text-center">Result of all candidate</h2>
  <div class="row">
   <?php
   require_once("connection.php");
   // $selee = "SELECT DISTINCT(position) FROM result";
   //      $qu=mysqli_query($conn,$selee);
   //      $ar=mysqli_fetch_array($qu);
   //      $positionz=$ar['position'];

   //      // echo $positionz;
//         if($positionz=='Mbunge'){
         $sel="SELECT COUNT(*) AS kura FROM result WHERE 1";
        $quer=mysqli_query($conn,$sel);
        $arry=mysqli_fetch_array($quer);
        $kura=$arry['kura'];
//         echo $kula;
//         die;
//     }
//     elseif($positionz=='Diwani'){
//          $sel="SELECT COUNT(*) AS kura FROM result WHERE position='Diwani'";
//         $quer=mysqli_query($conn,$sel);
//         $arry=mysqli_fetch_array($quer);
//         $kura=$arry['kura'];
//     }
//     elseif($positionz=='Rais'){
//          $sel="SELECT COUNT(*) AS kura FROM result WHERE position='Rais'";
//         $quer=mysqli_query($conn,$sel);
//         $arry=mysqli_fetch_array($quer);
//         $kura=$arry['kura'];
//     }
// else{
//     $kula=20;
// }
    // }
  
        // echo $kura;

    // $sele="SELECT candidate,COUNT(*) AS idadi, (COUNT(*)/'$kura')*100 AS average FROM result GROUP by kula ";
    //     $query=mysqli_query($conn,$sele);
    //     $array=mysqli_fetch_array($query);
    //     $candi=$array['candidate'];
    //     $idadi=$array['idadi'];
    //     $aver=$array['average'];

    $selec="SELECT COUNT(result.kula) AS idadi,(COUNT(*)/$kura)*100 as aver,instution.image, result.candidate, result.kula, result.cand, result.eplace, result.part, result.position FROM result,instution WHERE result.candidate=instution.email GROUP BY result.cand ";
        $queryr=mysqli_query($conn,$selec);
        while($array=mysqli_fetch_array($queryr)){
        $cand=$array['cand'];
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

        // echo $candi;
        // echo $idadi;
        // echo $aver;
        // echo $cand;
        // echo $part;
        // echo $posi;
    
    }  
   ?>
            


    </div>  
    <!-- right end -->
    
</div>
 
                                
   
    </div>
    
</body>
</html>


