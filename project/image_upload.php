<form action="" method="post"  enctype = "multipart/form-data"  ><br><input type="file" name="profile" ><br><br>



<input type="submit" name="sumbit" value="Submit">
</form>
<?php
if(isset($_POST['submit'])){
if(empty($_FILES['profile']['name'])){$image = "";}
	else{
		$allowed = array('png','jpeg','jpg','gif');
		$file_name = $_FILES["profile"]["name"];
		$image_extn = strtolower(end(explode('.',$file_name)));
		$file_temp = $_FILES['profile']['tmp_name'];
			if(in_array($file_extn,$allowed) === true){
			$image = 'images/profile/'.substr(md5(time()),0,10).'.'.$image_extn;
			move_uploaded_file($file_temp,$image);
			
														}}}?>