<?php

session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}

require_once("connection.php");
if(isset($_POST['regster'])){
    $chama=$_POST['chama'];
    $email=$_POST['email'];
   
   
    
    if(empty($chama)||empty($email)){
        $msgz="You must enter all form fild ";
    }
    else{
        $select = "SELECT * FROM instution WHERE email='$email' and typez='voter'";
        $quer = mysqli_query($conn,$select);
        $array=mysqli_fetch_array($quer);
        $fname=$array['iname'];
        $place=$array['place'];
        $pick = $array['image'];

        $selec ="SELECT position1 FROM eplace INNER JOIN instution on eplace.nameplace=instution.place WHERE instution.email='$email'";
        $que = mysqli_query($conn,$selec);
        $array=mysqli_fetch_array($que);
        $post=$array['position1'];


        $insert = "INSERT INTO candidates(email,candidate,electionPlace,part,position) VALUES('$email','$fname','$place','$chama','$post')";
        // echo $insert;
        // die;
        $query = mysqli_query($conn,$insert);
        if($query){
            $smg = base64_encode("Your Success to add Candidate");
            header("location:candidates.php?sms=$smg");
        }
        else{
            $msgz= "Your Fail to add election Place";
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OVS | Candidate</title>
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
    <div class="col-md-10 ">
        <div class="card-deck-wrapper">
            <div class="card-deck">
                <div class="card col-md-6">
                    <form action="add_candidates.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">ADD CANDIDATE FORM<H4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            error_reporting(0);
                        
                            if(isset($msgz)){
                                echo"<div class='alert alert-danger col-lg-12'>
                                <strong>Error! </strong>".$msgz."</div>";
                                
                            }
                            
  

?>
                        <div class="form-group">
                        <div>Candidate Email: </div>
                    <div><input type="email" name="email" id="email" placeholder="Write Candidate email used in regstiration" class="form-control"><span id="isms" class="error"></span></div>
                    <div>Political Parties: </div>
                    <div>
                    <?php
                    
                    $selec = "SELECT * FROM parties";
                    $quer = mysqli_query($conn,$selec);
                    echo "<div><select name='chama' id='chama' class='form-control'>";
                    echo "<option>---Select Partie---</option>";
                    while($row=mysqli_fetch_array($quer)){
                        echo "<option value='".$row['pname']."'>".$row['pname']."</option>";
                    }
                    
                    echo "</select>";
                    
                
                    ?>
                    
                    <div><br></div>
                        <input type="submit" name="regster" class="btn bg-success" value="Regster" onclick="return checkMy()">
                        <input type="reset" class="btn bg-warning" value="Clean">      
                    </div>    
                        
                    </div> 
                    </div>
                    </form>
                </div>
            </div>
        </div>

       
        </div>
    </div> 
    <!-- right end -->
    
</div>
 
   
    </div>
    
</body>
</html>


<?php

?>