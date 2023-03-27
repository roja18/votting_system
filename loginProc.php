<?php
require_once("connection.php");
if(isset($_POST['login'])){
    $uname = $_POST['email'];
    $pass = $_POST['password'];
     
    $logg = "SELECT passwordz,typez,statuz FROM instution WHERE email='$uname'";
    $query = Mysqli_query($conn,$logg);
    $row = mysqli_fetch_array($query);
    $passw = $row['passwordz'];
    $types = $row['typez'];
    $statuz = $row['statuz'];
   

    if(password_verify($pass,$passw)){
        if($types=="manager" && $statuz=="active"){
        session_start();
        $_SESSION['manager']=$uname;
        header("location:admin_home.php");
        die();
        }
        elseif($types=="voter" && $statuz=="active"){
        session_start();
        $_SESSION['voter']=$uname;
        header("location:vote.php");
        die();
        }
        elseif($types=="admin"){
        session_start();
        $_SESSION['admin']=$uname;
        header("location:admin_home.php");
        die();
        }
        elseif($types=="voter" && $statuz=="inactive"){
        $sms = base64_encode("you have to wait for your manager to acticate your account inorder to login");
        header("location:login.php?sms=$sms");
        die();
        }
        else{
        $sms = base64_encode("you must activate your account inorder to login");
        header("location:login.php?sms=$sms");
        die();
        }
        
    }
    else{
        $sms = base64_encode("wrong Username or password");
        header("location:login.php?sms=$sms");
        die();
    }
}
?>