<?php
session_start();
 setcookie("email",$email,-3000,"/");
 setcookie("password",$password1,-3000,"/");
session_destroy();
header('location: http://www.k254.freeiz.com/project/index.php');
?>