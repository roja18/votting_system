<?php
    error_reporting(0);
    session_start();
    if(empty($_SESSION['manager'])){
        header("location:login.php");
        exit;
    }
    $pid = $_GET['pid'];
    require_once("connection.php");

    $select = "SELECT * FROM eplace WHERE id='$pid'";
    $query = mysqli_query($conn,$select);
    $array=mysqli_fetch_array($query);
    $pname = $array['nameplace'];
    $city = $array['city'];
    $pos = $array['position1'];
    $udate = $array['udate'];
    // echo $pos;
    // die;
    if($pos=="Diwani"){
        $sel1="selected='selected'";
    }
    elseif($pos=="Mbunge"){
        $sel2="selected='selected'";
    }
    elseif($pos=="rais"){
        $sel3="selected='selected'";
    }
    else{
        $sel4="selected='selected'";
    }

    // ===========================update===========================
    if(isset($_POST['regster'])){
        $pname=$_POST['pname'];
        $city=$_POST['city'];
        $pos1=$_POST['pos1'];
        $rid=$_POST['myid'];
       
        
        if(empty($pname)||empty($city)||empty($pos1)){
            $msgz="You must enter place name,city and  position ";
        }
        else{
            $insert = "UPDATE eplace SET nameplace='$pname',city='$city',position1='XXXXXX' WHERE id='$rid'";
            // echo $insert;
            // die();
            $query = mysqli_query($conn,$insert);
            if($query){
                $smg = base64_encode("Your Success to Update Election Place");
                header("location:reg_center.php?sms=$smg");
            }
            else{
                $msgz= "Your Fail to Update election Place";
                
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
    <title>OVS | Regstration Center</title>
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
                    <form action="edit_reg_center.php" method="POST" name="reg" enctype="multipart/form-data">
                    <div class="card-title bg-warning">
                    <H4 class="text-center">UPDATE ELECTION PLACE FORM<H4>
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
                        <div>Name Of Place: </div>
                    <div><input type="text" name="pname" id="pname" value="<?php echo $pname; ?>" class="form-control"><span id="isms" class="error"></span></div>
                    <div>City: </div>
                    <div><input type="text" name="city" id="city"  value="<?php echo $city; ?>" class="form-control" ><span id="dsms" class="error"></span></div>
                    <div>Election Position: </div>
                    <div><select name="pos1" class="form-control">
                    <option><?php echo $sel1; ?></option>
                    <option><?php echo $sel2; ?></option>
                    <option><?php echo $sel3; ?></option>
                    <option><?php echo $sel4; ?></option>
                    </select></div>
                    <div><input type="hidden" name="myid" value="<?php echo $pid; ?>"></div>
                   
                    
                    <div><br></div>
                        <input type="submit" name="regster" class="btn bg-success" value="Regster" onclick="return checkMy()">
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
