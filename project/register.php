<?php 
function test_input($data){
 //$data = mysqli_real_escape_string($link,$data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_FILES['profile']) === true){
if(empty($_FILES['profile']['name'])){$image = 'image/profile/b01deb340f46c842337d.jpg';}
	else{
		$allowed = array('png','jpeg','jpg','gif');
		$file_name = $_FILES["profile"]["name"];
		$image_extn = strtolower(end(explode('.',$file_name)));
		$file_temp = $_FILES['profile']['tmp_name'];
			if(in_array($image_extn,$allowed) === true){
			$image = 'image/profile/'.substr(md5(time()),0,20).'.'.$image_extn;
			}}}


if( ! empty($_POST["lastname"])&& ! empty($_POST["email"]) && ! empty($_POST["password"])&& ! empty($_POST["firstname"])){

$firstname = ucfirst(strtolower(test_input($_POST["firstname"])));
 
$middlename = ucfirst(strtolower(test_input($_POST["middlename"])));

$lastname = ucfirst(strtolower(test_input($_POST["lastname"])));

$password = md5(test_input($_POST["password"]));

$email = test_input($_POST["email"]);
$phone = test_input($_POST["phonenumber"]);
$username = $firstname.$lastname;
$university = ucwords(strtolower(test_input($_POST["school"]))); 
$graduation = test_input($_POST["grad_year"]);
$status = 0;
include "connect.php";



$query = "INSERT INTO users(username,firstname,middlename,lastname,email,password,phone,university,graduation,image,status,securityquestion,securityanswer,address)
		VALUES('$username','$firstname','$middlename','$lastname','$email','$password',$phone,'$university',$graduation,'$image',$status,0,0,0)";

		$thequery= mysqli_query($link,$query);
		
		
		if( !$thequery){

echo '<script>alert(" That user email already exist in our database")</script>';
die();}
		@move_uploaded_file($file_temp,$image);
		$userno = mysqli_insert_id($link);
		$userno = md5($userno);
		if (!file_exists("/image/profile/".$userno)){
    @mkdir("image/profile/".$userno,0777, true);
}
		
		
		echo "<script>alert( 'Thank you $firstname. for registering with us you can log in with your email and password to view more actions')</script>";
		
		
}

/*

$to      = 'zadikochola@yahoo.com';
$subject = 'the subject';
$message = 'hello zadiki you realyy suck at this<a href="http://www.k254.freeiz.com/project/">click here</a>';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);*/

?>