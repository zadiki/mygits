<?php

include "connect.php";

$query="CREATE TABLE members(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fname text NOT NULL,mname text ,lname text NOT NULL,
	email varchar(255) NOT NULL UNIQUE KEY,
	password varchar(255),
phone BIGINT

) ENGINE=MyISAM";

		$thequery= mysqli_query($link,$query);



if(isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['password']) && isset($_POST['phone'])){
	$email=test_input($_POST["email"]);
	
	if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
		
		
			echo "<script>alert('please enter a valid email')</script>";
die();}

		
		
	}
	
	
	
	
	
$email1=test_input($_POST["email1"]);

if($email!=$email1){
	echo "<script>alert('your emails do not match')</script>";
die();}


$password=md5(test_input($_POST["password"]));
$password1=md5(test_input($_POST["password1"]));


if($password!=$password1){echo "<script>alert('your passwords do not match')</script>";
die();}


$fname=test_input($_POST["fname"]);
$mname=test_input($_POST["mname"]);
$lname=test_input($_POST["lname"]);
$phone=test_input($_POST["phone"]);


function test_input($data){
 //$data = mysqli_real_escape_string($link,$data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



$query="INSERT INTO members(fname,mname,lname,email,password,phone) VALUES('$fname','$mname','$lname','$email','$password','$phone')";
		$thequery= mysqli_query($link,$query);
		
		if(!$thequery){
echo  "A user with that email already exist";
}}else header("location: index.php");
?>