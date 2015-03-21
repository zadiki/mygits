

<?php
session_start();

include "connect.php";


function test_input($data){

  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





if(!empty($_POST["username"]) && !empty($_POST["password"])){
$password1 = test_input($_POST["password"]);
$password = md5($password1);
$email = test_input($_POST["username"]);
$db = "user";



$query = "SELECT * FROM users WHERE email = '$email'";
 $id = mysqli_query($link,$query);
 $row = mysqli_fetch_row($id);
 
 
 
 $query1 = "SELECT COUNT(*) as userno FROM users WHERE status = '1'";
 
 
 $users_no = mysqli_query($link,$query1);
 $users_no = mysqli_fetch_assoc($users_no);
 
 
 if($row[0]>0){
 
 if($row[6] === $password){
 setcookie("email",$email,time()+60*3*60,"/");
 setcookie("password",$password1,time()+60*2*60,"/");
 $_SESSION["USER_NO"] = $users_no["userno"];
 $_SESSION["USERID"] = $row[0];
 $_SESSION["username"] = $row[1]; 
 $_SESSION["firstname"] = $row[2]; 
 $_SESSION["middlename"] = $row[3]; 
 $_SESSION["lastname"] = $row[4]; 
 
 $_SESSION["USEREMAIL"] = $row[5];
 $_SESSION["USERPASSWORD"] = $row[6];
  $_SESSION["PHONE"] = $row[7]; 
  $_SESSION["UNIVERSITY"] = $row[8];
  $_SESSION["GRADUATION"] = $row[9];
 $_SESSION["profile"] = $row[10];
 $_SESSION['lastseen'] = $row[11];
 $status_update ="UPDATE users SET status = 1 WHERE id = $row[0]";
 @mysqli_query($status_update);
$logg_error ="logged in";
 }else{
 $logg_error= "<br>your email password combination <br>is not right";}
 }
else { $logg_error = "user doesn't exist";}}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="sadik hassan proje tasarim" />
<meta name="keywords" content="zadik hassan,Yildiz Teknik Üniversitesi,ytu,proje tasarim,matematik mühendisliği,matematical engineering" />
<meta name="robots" content="no-cache" />
<meta name="Author" content="zadiki ochola hassan,mathematical engineering,matematik mühendisliği" />
<meta http-equiv="Conten-type" content="text/html; charset=utf-8" />
  <title>Yildiz technical university  student profile</title>
 </head>

<body>




 <?php if(!empty($_SESSION['username'])){include "logged_in.php";
}
else{include "not_loggedin.php";}

?>
</body></html>