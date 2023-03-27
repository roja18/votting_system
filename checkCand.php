

<?php

session_start();
if(empty($_SESSION['manager'])){
    header("location:login.php");
    exit;
}

error_reporting(0);
if(isset($_POST['Post'])){
    require_once("connection.php");
    $em =$_POST['myemail'];
    $cn =$_POST['cname'];
    $ep= $_POST['eplc'];
    $pt = $_POST['part'];
    $pst= $_POST['position']; 

    if(empty($pst)||empty($pt)){
        die("You must enter all form field");
    }
    else{
        $insert = "INSERT INTO candidates(email,candidate,electionPlace,part,position) VALUES('$em','$cn','$ep','$pt','$pst')";
        echo $insert;
        die();
        $query = mysqli_query($conn,$insert);
        if($query){
            $smg = base64_encode("Your Success to add candidate");
            header("location:candidates.php?sms=$smg");
        }
        else{
            die("fail to add candidate");
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
    <title>Candidates</title>
    <script type="text/javascript" src="javascript/validation.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript">
        function getName(val){
            $.ajax({
                type: "POST",
                url: "getName.php",
                date: 'name_id='+val,
                success:function(data){
                    $("#cname").html(data);
                    getPartie()
                }
            });
        }
        function getCeplace(val){
            $.ajax({
                type: "POST",
                url: "getCeplace.php",
                date: 'Ceplace_id='+val,
                success:function(data){
                    $("#ceplace").html(data);
                    getPartie()
                }
            });
        }
    </script>
    
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
.error{
	background-color: yellow;
	color: red;
	padding: 10;
	width: 100%;
}
    </style>
    <link rel="stylesheet" href="css/form_style.css">
    <link rel="stylesheet" href="css/xxx.css">
</head>
<body>
    <div class="all">
        <div class="left">
            <?php require_once("hed.php"); ?>
          
        </div>
        <div class="right">
            <div class="top">
            <?php require_once("admin_hed.php"); ?>
            </div>
            <div class="btn">
            <BR>                
            <div class="formz">
           <form action="add_candidates.php" method="POST" name="regg">
        <fieldset>
        	<div><H4>ADD CANDIDATES<H4></div>
            <div>Candidate Email: </div>
            <div><input type="email" name="myemail" id="email" placeholder="Write Candidate email used in regstiration"><span id="nsubj" class="error"></span></div>
            
            <div>Candidate Name: </div>
            <div><input type="text" name="cname" id="cname" onChange="getName(this.value);" ><span id="nsubj" class="error"></span></div>
            <div>Candidate Election Place: </div>
            <div><input type="text" name="eplc" id="eplc" placeholder="News Subject" ><span id="nsubj" class="error"></span></div>
            <div>Candidate Partie:</div>
            <div>
            <input type="text" name="part" id="eplc"  id="nsubj" class="error"></span></div>
            
           
            <div>Candidate Position:</div>
            <div><input type="text" name="position" id="position" placeholder="Enter Position"><span id="nsubj" class="error"></span></div>
            <div>
            	<input type="submit" name="Post" value="Regster">
            	<input type="reset" value="Clean">  
             </div>
        </fieldset>
    </form>
    </div>    

            </div>
            <div class="chin">
            <?php require_once("footer.php"); ?>
            </div>
        </div>
    </div>
  
</body>
</html>
