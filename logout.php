<?php
session_start();
session_destroy();
// $smg ="You successufful logout";
header("location:login.php ");
exit();

?>