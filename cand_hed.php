<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/css/addition.css">
  
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <title>Admin Header</title>
    
</head>
<body>
    <div class="hedd">
    <div>
    <?php
    error_reporting(0);
    session_start();
    if(empty($_SESSION['voter'])){
        header("location:login.php");
        exit;
    }
    $chukua=$_SESSION['voter'];
    $select = "SELECT image FROM instution WHERE email='$chukua'";
    $quer = mysqli_query($conn,$select);
    $array=mysqli_fetch_array($quer);
        $img = $array['image'];
        echo "<img src='imagez/".$img."'width='100vh' height='100vh''>";
        
    ?>    
    </div>
    <div><a href="vote_home.php">Home</a> </div>
    <!-- <div><a href="news.php"class="text-light">News</a></div> -->
    <div><a href="vote.php">Vote</a></div>
    <div><a href="result.php">Result</a></div>
    <div><a href="voter_cpass.php">Change Password</a></div>
    <div><a href="logout.php"class="text-light">Logout</a></div>
    </div>
</body>
</html>