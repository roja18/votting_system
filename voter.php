
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
    <div class="col-md-10 col-sl-6 ">
    <div class="row">
    <div class="col-md-6">
    <a href="add_voter.php"><img src="image/user.GIF" alt="add voter" width="70vh" height="70vh"><br> Regster Voter</a>
    </div>
    <div class="col-md-6">
    <a href="vote_exel.php" class="addbtn" style="float:right; width:50%"><img src="image/exel.PNG" alt="pdf" width="60vh" height="60vh"><br> Print Manager</a>
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
                    <th>Voter Name</th>
                    <!-- <th>Image</th> -->
                    <th>Date of Birth</th>
                    <th>Election Place</th>
                    <th>Email</th>
                    <th>Date Regsted</th>
                    <th>Date Updated</th> 
                    <th>Status</th>
                    <th>Activate</th>
                    <th>Deactivate</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr class="active">
                    <?php
                    require_once("connection.php");
                    
                    $select = "SELECT * FROM instution WHERE typez='voter'";
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
                        $status = $array['statuz'];

                        echo "<td>$sno</td>";
                        echo "<td>$iname<br><img src='imagez/".$img."'width='80px' height='80px''></td>";
                        echo "<td>$aname</td>";
                        echo "<td>$place</td>";
                        echo "<td>$email</td>";
                        echo "<td>$adate</td>";
                        echo "<td>$udate</td>";
                        echo "<td>$status</td>";
                        echo "<td><a href='voter_activate.php?vid=$id' class='bg-success btn'>active</a> </td><td><a href='voter_deactivate.php?vid=$id' class='bg-secondary btn'>deactive</a></td>";
                        echo "<td><a href='edit_voter.php?pid=$id'class='bg-warning btn'>Edit</a></td>";
                        echo "<td><a href='del_voter.php?pid=$id'class='bg-danger btn'>Delete</a></td>";
                        echo "</tr>";

                        $sno++;
                    }
                    
                    ?>
                
                <tr class="bg-warning">
                    <th>Sno</th>
                    <th>Voter Name</th>
                    <!-- <th>Image</th> -->
                    <th>Date of Birth</th>
                    <th>Election Place</th>
                    <th>Email</th>
                    <th>Date Regsted</th>
                    <th>Date Updated</th> 
                    <th>Status</th>
                    <th>Activate</th>
                    <th>Deactivate</th>
                    <th>Edit</th>
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