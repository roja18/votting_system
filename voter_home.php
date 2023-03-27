<?php
session_start();
if(empty($_SESSION['voter'])){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voter</title>
    <style>
    .all{
    width: 100%;
    height: 100%;
}
.left{
    float: left;
    width: 12%;
    height: 100%;
    
    
    min-height: 600px; 
}
.right{
    float: right;
    width: 87%;
    height: 100%;
   
    min-height: 600px; 
    
}
.chin{

}
    </style>
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <div class="all">
        <div class="left">
            <?php require_once("cand_hed.php"); ?>
          
        </div>
        <div class="right">
            <div class="top">
            <?php require_once("admin_hed.php"); ?>
            </div>
            <div class="btn">
                <div>-</div>
             
         <center><img src="image/vote.GIF" alt="kura" width="50%" height="40%"></center>
            </div>
            <div class="chin">
            <?php require_once("footer.php"); ?>
            </div>
        </div>
    </div>
  
</body>
</html>


<?php

?>