<?php
session_start();

if(!($_SESSION["USERID"]>=1)){
header("location: http://localhost/project/index.php");}



function test_input($data){
 $data = mysqli_real_escape_string($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include "connect.php";
 
 if(!empty($_POST["firstname"]) || !empty($_POST["middlename"])|| !empty($_POST["lastname"])|| !empty($_POST["address"])|| !empty($_FILES["profile"]) || !empty($_POST["security"]) || !empty($_POST["email1"])|| !empty($_POST["email2"]) || !empty($_POST["security_answer"]) || !empty($_POST["school"]) ){
	$id = $_SESSION["USERID"];
$firstname = ucfirst(test_input(strtolower($_POST["firstname"])));
$query="UPDATE users SET firstname = '$firstname' WHERE id = $id";
$middlename = ucfirst(test_input(strtolower($_POST["middlename"])));
$query1="UPDATE users SET middlename = '$middlename' WHERE id = $id";
$lastname = ucfirst(test_input(strtolower($_POST["lastname"])));
$query2="UPDATE users SET lastname = '$lastname' WHERE id = $id";
$address = "no";
$address = test_input($_POST["address"]);
$query3="UPDATE users SET address = '$address' WHERE id = $id";
$security = test_input($_POST["security"]);
$query4="UPDATE users SET  securityquestion = '$security' WHERE id = $id";
$school = ucwords(strtolower(test_input($_POST["school"])));

$query5="UPDATE users SET  university= '$school' WHERE id = $id";
$graduation = test_input($_POST["grad_year"]);
$query11="UPDATE users SET  graduation = '$graduation' WHERE id = $id";
$security_answer = test_input($_POST["security_answer"]);
$query6="UPDATE users SET securityanswer = '$security_answer' WHERE id = $id";
$email = $_SESSION["USEREMAIL"];
$email1 = test_input($_POST["email1"]);
$email2 = test_input($_POST["email2"]);
$current_password = md5(test_input($_POST["password"])); 
$new_password = test_input($_POST["password1"]); 
$same_new_password = test_input($_POST["password2"]);
$userpassword= $_SESSION["USERPASSWORD"];
if(($current_password == $userpassword) &&( $same_new_password == $new_password )){$userpassword = md5($new_password);}
if($email2 == $email1){
	
	if(!empty($email1)){$email = $email1;}}
$profile = $_SESSION["profile"];
$query7="UPDATE users SET email = '$email' WHERE id = $id";
$query8="UPDATE users SET password = '$userpassword' WHERE id = $id";
$phone = test_input($_POST["phone"]);
$query9="UPDATE users SET phone = '$phone' WHERE id = $id";
if(isset($_FILES["profile"]) === true){
	if(!empty($_FILES['profile']['name'])){
	
		$allowed = array('png','jpeg','jpg','gif');
		$file_name = $_FILES["profile"]["name"];
		$image_extn = strtolower(end(explode('.',$file_name)));
		$file_temp = $_FILES['profile']['tmp_name'];
			if(in_array($image_extn,$allowed) === true){
				$a =strpos($profile,".");
				$image = substr($profile,0,$a);
			$profile = $image.".".$image_extn;
			}
			@unlink($profile);
			@move_uploaded_file($file_temp,$profile);
			
			}
	
	
	
}
$query10="UPDATE users SET image = '$profile' WHERE id = $id";
	mysqli_query($link,$query);
	mysqli_query($link,$query1);mysqli_query($link,$query2);mysqli_query($link,$query3);mysqli_query($link,$query4);mysqli_query($link,$query5);mysqli_query($link,$query6);
mysqli_query($link,$query7);mysqli_query($link,$query8);mysqli_query($link,$query9);mysqli_query($link,$query10);mysqli_query($link,$query11);
 }
 
 mysqli_close();
 echo "<script>alert('you have successfully changed your information')</script>";
 header("location: http://www.k254.freeiz.com/project/index.php");
 
 ?>