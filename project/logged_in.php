<?php @session_start();
if(!($_SESSION["USERID"]>=1)){
header("location: http://localhost/project/index.php");}
?><div id="main_center">
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
	<a href="#"><I><?php echo $_SESSION["USER_NO"];?></I> user online</a></li> <li id="last">
	<a href="#">personal</a>
		<ul><li><a href="#"  onclick="imageshow()">my photo's</a></li>
			<li><a href="#">upload photo</a></li>
			<li><a href="#" onclick="formshow()">change info</a></li>
			<li><a href="logg_out.php">loggout</a></li>
</ul></li>
</ul>
</div></div><div id="logged_in_part"><div id="logged_in_part1"><img src="<?PHP echo $_SESSION["profile"];?>"  alt="no image" class="prof_picture" width="100%" height="100em">
</img><div id="personal_info"><br><span><strong><I><?php echo $_SESSION["username"];?></I></strong></span></br>
	<ul>	
		<li><strong>Graduated from</strong><span><br><a href="#"><?PHP echo $_SESSION["UNIVERSITY"]?></a></span></li>
		<li><strong>year</strong> <?PHP echo $_SESSION["GRADUATION"];?></li>
		<li><strong>Department</strong> <br>Math engineering</li>
		<li><strong>contact</strong> </li>
		<li><strong>address</strong><br> yeni mahale<br> bakirkoy<br> istanbul </li>
		<li><strong>phone</strong> <a href="tel:<?PHP echo $_SESSION["PHONE"];?>"><?PHP echo $_SESSION["PHONE"];?></a></li>		
		<li><strong>email</strong></li> 
				
	</ul><a href='mailto:<?PHP echo $_SESSION["USEREMAIL"];?>'><?PHP echo $_SESSION["USEREMAIL"];?></a>
</div>
<a><img src="image/profile/image13.jpg"></img></a>
</div>

<div id="aside"><a><img src="image/profile/image11.jpg"></img></a><p>san jose</p>
<a><img src="image/profile/image12.jpg"></img></a>
</div>
</div><div  id="center"><div id="table"><?php
if(isset($_POST["form_search"]) && !empty($_POST["form_search"])){


function testinput($data){
 //$data = mysql_real_escape_string($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$search_name = explode(" ",strtolower(testinput($_POST["form_search"])));


@$search_name[0] = ucfirst($search_name[0]);
@$search_name[1] = ucfirst($search_name[1]);
@$search_name[2] = ucfirst($search_name[2]);
include "connect.php";
 
 $query = "SELECT id,firstname,lastname,email,phone,image FROM users WHERE username LIKE '%$search_name[0]%' or username LIKE '%$search_name[1]%'";
 $search_result = mysqli_query($link,$query);
 echo "<table>";
 echo "<tr><td class = 'table'   >Firstname</td><td  class = 'table' >Lastname</td><td  class = 'table'  >Email</td><td  class = 'table'  >Phone</td><td  class = 'table'  >Photo</td> ";
 while($searchresult = mysqli_fetch_row($search_result)){
 $member = $searchresult[0];
 $Firstname = $searchresult[1];
 $Lastname = $searchresult[2];
 $email = $searchresult[3];
 $phone = $searchresult[4];
 $image = $searchresult[5];
echo "<tr><td class = 'table'><a href = 'members.php?u=".$member."'>".$Firstname."<a></td><td class ='table'><a href='members.php?u=".$member."'>".$Lastname."</a></td><td class ='table'>".$email."</td><td class ='table'>".$phone."</td><td class ='tablephoto'><img src='".$image."'><img></td></tr>";
 
  
 
 }echo "</table>";

 
}


?></div><div id = "photos">
<?php include "logged_in_form_update.php";?>
<div id="footer">&copy  copyright of sadik hassan 2014<br>
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
	