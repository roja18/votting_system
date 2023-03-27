<?php
error_reporting(0);
session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}
$pid = $_GET['vid'];
require_once("connection.php");
                    
    $select = "UPDATE instution SET statuz='waiting' WHERE id='$pid'";
    // echo $select;
    // die;
    $query = mysqli_query($conn,$select);
    if($query){
        $sms=base64_encode("Success to change status to deactive Voter");
        header("location:voter.php?sms=$sms");
    }
    else {
        $smss=base64_encode("Fail to change status");
        header("location:voter.php?smss=$smss");
    }
?>