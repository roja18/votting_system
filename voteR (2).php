<?php

error_reporting(0);

require_once("connection.php");


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
 
    </div>
    </div>
   
            <span class="error">
          
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
                
                    $sel="SELECT place FROM instution WHERE email='$mimi'";
                 
                    $quer=mysqli_query($conn,$sel);
                    $arry=mysqli_fetch_array($quer);
                    $plc=$arry['place'];
                
                    $select = "SELECT * FROM candidates INNER JOIN instution on candidates.email=instution.email WHERE candidates.electionPlace='$plc'";
                    $query = mysqli_query($conn,$select);
                    $sno=1;
                  
                    while($array=mysqli_fetch_array($query)){
                       $img = $array['image'];
                        $cand = $array['candidate'];
                        $p1 = $array['email'];
                        $part = $array['part'];
                        $posit = $array['position'];
                        $cid=$array['id'];
                   

                        echo "<td>$sno</td>";
                        echo "<td><img src='imagez/".$img."'width='80px' height='80px''></td>";
                        echo "<td>$cand</td>";
                        echo "<td>$part</td>";
                        echo "<td>$posit</td>";
                        echo "<td><a href='votePro.php?vid=$p1'><input type='radio' name='vote' value='$cid'></a></td>";
                     
                        echo "</tr>";

                        $sno++;
                    }
                    
                    echo "</td>  </table>";
                    ?>
                
                
            </div>
    </div>  
    <!-- right end -->
    
</div>
 
   
    </div>
    
</body>
</html>


