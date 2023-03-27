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
    if(empty($_SESSION['manager'])){
        header("location:login.php");
        exit;
    }
    $chukua=$_SESSION['manager'];
    $select = "SELECT image FROM instution WHERE email='$chukua'";
    $quer = mysqli_query($conn,$select);
    $array=mysqli_fetch_array($quer);
        $img = $array['image'];
        echo "<img src='imagez/".$img."'width='100vh' height='100vh''>";
        
    ?>    
    </div>
    <div><a href="admin_home.php" class="text-light">Home</a> </div>
    <!-- <div><a href="news.php"class="text-light">News</a></div> -->
    <div><a href="reg_instution.php"class="text-light">Manager</a></div>
    <div><a href="parties.php"class="text-light">Parties</a></div>
    <div><a href="reg_center.php"class="text-light">Regstration Center</a></div>
    <div><a href="candidates.php"class="text-light">Candidates</a></div>
    <div><a href="voter.php"class="text-light">Voters</a></div>
    <div><a href="mresurt.php"class="text-light">Result</a></div>
    <div><a href="edit_pelson.php"class="text-light">Edit Profile</a></div>
    <div><a href="logout.php"class="text-light">Logout</a></div>
    </div>
</body>
</html>