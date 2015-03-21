<?php @session_start();
if(!($_SESSION["USERID"]>=1)){
header("location: http://wwww.k254.freeiz.com/project/index.php");}


if(!empty($_GET["u"])){
	function test_input($data){
 //$data = mysql_real_escape_string($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
     $u = $_GET["u"];
	$member = test_input($u);
	
	
	}else {header("location: http://www.k254.freeiz.com/project/index.php");}

include "connect.php";
$query = "SELECT * FROM users WHERE id = $member";
 $id = mysqli_query($link,$query);
 
 if(!$id){ echo "none existing user";
 }
 $row = @mysqli_fetch_row($id);
 $firstname = $row[2];
 $middlename = $row[3];
 $lastname = $row[4];
 $email= $row[5];
 $phone = $row[7];
 $university = $row[8];
 $graduation = $row[9];
 $image = $row[10];
 $lastseen = $row[11];
 
 
 
 
 
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
<div id="main_center">
  <link type="text/css" rel="stylesheet" href ="maincss.css" />
  <div id="nav">   
<div id="wrapper">
<ul> 
<form method="post" action="" id="form">
<input type="text" name="form_search" placeholder="search for people"  required title="please insert something" maxlength="30" size="40" >
<input type="submit" value="search">
</form>
<li><a href="index.php">Home</a></li><li> 
	<a href ="#">Our sponsers</a>
	   <ul>
	   <li><a href="http://www.yildiz.edu.tr/en/">Yildiz Technical University</a></li>
	   <li><a href="http://www.itu.edu.tr/en/">Istanbul Technical University</a></li>
	   <li><a href="http://www.gumushane.edu.tr/2/en/">Gumushane University</li></a>
	   <li> <a href="http://www.isikun.edu.tr/en">Ishik University</li></a>
	   <li> <a href="http://www.iku.edu.tr/index.php">Istanbul Kultur University</li></a>
	   </ul></li><li>
	<a href="#"><I>1</I> user online</a></li> <li id="last">
	<a href="#">personal</a>
		<ul><li><a href="#"  onclick="imageshow()">my photo's</a></li>
			<li><a href="#">upload photo</a></li>
			<li><a href="#" onclick="formshow()">change info</a></li>
			<li><a href="logg_out.php">loggout</a></li>
</ul></li>
</ul>
</div></div><div id="logged_in_part"><div id="logged_in_part1"><img src="<?php echo $image;?>"  alt="no image" class="prof_picture" width="100%" height="100em">
</img><div id="personal_info"><br><span><strong><I>Zadiki	Zasdds</I></strong></span></br>
	<ul>	
		<li><strong>Graduated from</strong><span><br><a href="#"><?php echo $university;?></a></span></li>
		<li><strong>year</strong> <?php echo $graduation;?> </li>
		<li><strong>Department</strong> <br>Math engineering</li>
		<li><strong>contact</strong> </li>
		<li><strong>address</strong><br> yeni mahale<br> bakirkoy<br> istanbul </li>
		<li><strong>phone</strong> <a href="<?php echo $phone;?>"><?php echo $phone;?></a></li>		
		<li><strong>email</strong></li> 
				
	</ul><a href='<?php echo $email;?>'><?php echo $email;?></a>
</div>
<a><img src="image/profile/image13.jpg"></img></a>
</div>

<div id="aside"><a><img src="image/profile/image11.jpg"></img></a><p>san jose</p>
<a><img src="image/profile/image12.jpg"></img></a>
</div><?php
$imagedir = $member;
$imagedir = md5($imagedir);
$dir = "image/profile/".$imagedir;
$scanned_directory = array_diff(scandir($dir), array('..', '.'));
$a = 0;
foreach($scanned_directory as $scanned_directory){
 

echo "<img id = '".$a."' class = 'photos' src ='image/profile/".$imagedir.'/'.$scanned_directory."' onclick ='imagemagnify(".$a.")' onmouseout ='imagemagnify1(".$a.")' ></img>";
$a++;
}
?>
</div>

</div></div>
</div>
  <footer><div id="footer">&copy  copyright of sadik hassan 2014<br>
contact<br>Tel:<a href="tel:+905070297010">+905070297010</a><br>email:<a href="mailto:zadikochola@yahoo.com">zadikochola@yahoo.com</a></div>
</footer>
<script>
function imageshow(){
	var ozy = document.querySelector("#photos");
	ozy.style.display = "block";
	var table = document.querySelector("#table");
	table.style.display = "none";
	
	}
	var a;
function imagemagnify(a){
	  document.getElementById(a).style.width="200px";
    document.getElementById(a).style.height="200px";
	
	}

function imagemagnify1(a){
	  document.getElementById(a).style.width="100px";
    document.getElementById(a).style.height="100px";
	
	}
function formshow(){
	var b = document.querySelector("#form_update");
	b.style.display = "block";
	var table = document.querySelector("#table");
	table.style.display = "none";
	var ozy = document.querySelector("#photos");
	ozy.style.display = "none";
	
	}
	
	
	 function validateForm() {
    	
if(email !== null){

validateEmail(email);
}
 function validateEmail(e_mail1){ 
 var atpos = e_mail.indexOf("@");
 var dotpos = e_mail.indexOf("."); 
 if (atpos< 1 || dotpos<atpos+4 || dotpos+2>=e_mail.length){ 
 document.getElementById('email_1').innerHTML="";
 document.getElementById('email_1').innerHTML='enter valid email';
        return false;
    }
 }

	
}


</script>
	</body></html>