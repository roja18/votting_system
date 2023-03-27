<?php
$xvote=$_GET['vid'];
session_start();
if(empty($_SESSION['voter'])){
    header("location:login.php");
    exit;
}
require_once("connection.php");
$mtu = $_SESSION['voter'];
   $sel="SELECT * FROM candidates WHERE email='$xvote'";
        $quer=mysqli_query($conn,$sel);
        $arry=mysqli_fetch_array($quer);
        $plc=$arry['email'];
        $cand=$arry['candidate'];
        $eplace=$arry['electionPlace'];
        $part=$arry['part'];
        $posi=$arry['position'];

        $kula="voted";
        // die;

    $insert = "INSERT INTO result(candidate,kula,cand,eplace,part,position) VALUES('$plc','$kula','$cand','$eplace','$part','$posi')";
    //    echo $insert;
    //    die;
        $query = mysqli_query($conn,$insert);
        if($query){
            $smg = base64_encode("Your Success to  Vote");
            header("location:result.php ? sms=$smg");
        }
        else{
            die("fail to vote");
        }

?>