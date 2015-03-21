<?php

include "connect.php";
$email=test_input($_POST["email"]);
$message=test_input($_POST["textarea"]);


function test_input($data){
 //$data = mysqli_real_escape_string($link,$data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$query="CREATE TABLE message(email varchar(255),
message varchar(255))";

		$thequery= mysqli_query($link,$query);

$query="INSERT INTO message(email,message) VALUES('$email','$message')";
		$thequery= mysqli_query($link,$query);
		
		if($thequery){

echo $email."<br>".$message;
		}
?>