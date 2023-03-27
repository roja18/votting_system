<?php
error_reporting(0);
session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}
$pid = $_GET['pid'];
require_once("connection.php");
                    
    $select = "DELETE FROM candidates WHERE id='$pid'";
    // echo $select;
    // die;
    $query = mysqli_query($conn,$select);
    if($query){
        $sms=base64_encode("Success to delete candidates");
        header("location:candidates.php?sms=$sms");
    }
    else {
        $smss=base64_encode("Fail to delete candidates");
        header("location:candidates.php?smss=$smss");
    }
?>