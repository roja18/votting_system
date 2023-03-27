<?php
define("server","localhost");
define("user","root");
define("password","@roja18");
define("database","voter");

$conn = mysqli_connect(server,user,password,database) or die("can not connect");
?>