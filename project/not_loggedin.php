 <link type="text/css" rel="stylesheet" href="main.css" />
<div id="header_part"></div>
<div class ="main">
<div  class="log_in"><span id="loggin-top" class="star">

</span>
<form action="" method="post"><br>
<input type="text" name="username" placeholder="enter your email"   maxlength="30" size="25" >
<br>
 <br>
<input type="password" name="password" placeholder="password" maxlength="30" size="25">
<br><br>
<input type="submit" value="login">
</form><br><a href="lost_password.php">Password recovery</a>
</div><div class="log_in"><br>
</div><div id="main_part"><br><br><h3>Welcome to the mathematical engineering student portal!<br><br><h4>sign up  to use the student portal<br><br><hr class="horizon"><br>
 <form  autocomplete="on" method="post" action="register.php"   id="reg_form" onsubmit="return validateForm()"  enctype = "multipart/form-data"  >
 <legend>Register</legend><br>
 <input type="text" name="firstname" placeholder="first name"    pattern="[a-zA-Z]{3,}" title="Minimum 3 letters" required maxlength="30" size="25">
 <p class="star1">*</p><span class="star" id="fname"></span>
 <input type="text" name="middlename" placeholder="middle name"   pattern="[a-zA-Z]{3,}" title="Minimum 5 letters"   maxlength="30" size="25"><span class="star" id="middle name">
 </span><br><br>
<input type="text" name="lastname" placeholder="last name" pattern="[a-zA-Z]{3,}" title="Minimum 3 letters" required  maxlength="30" size="25"><p class="star1">*</p><span class="star" id="lname">
</span><br><br>
<input type="email" name="email" placeholder="email address" required maxlength="30" size="25"><p class="star1">*</p><span class="star" id="email_1">
</span>
<input type="email" name="email2" placeholder="confirm email" maxlength="30"  required size="25" ><p class="star1">*</p><span class="star" id="email_2">
</span><br><br>
<input type="password" name="password" placeholder="password" pattern=".{5,}" required title="minimum 5 character" maxlength="30" size="25"><p class="star1">*</p><span class="star" id="pass_1">
</span>
<input type="password" name="password2" placeholder="confirm password" pattern=".{5,}" required title="minimum 5 character" maxlength="30" size="25" ><p class="star1">*</p><span class="star" id="pass_2">
</span><br><br>
<input type="text" name="phonenumber" placeholder="phone number" pattern="[0-9].{10,12}" required maxlength="13" size="15" ><span class="star" id="phone"></span>
<br><br><input type="file" name="profile" class="custom-file-input"><br>
<br>
<label for="school">University of graduation:</label><select name="school" >
	<option value="YILDIZ TECHNICAL UNIVERSITY">yildiz Technical University</option>
	<option value="GUMUSHANE UNIVERSITY">Gumushane University</option>
	<option value="ISTANBUL TECHNICAL UNIVERSITY">Istanbul Technical University</option>
	<option value="ISHIK UNIVERSITY">Işık University</option>
	<option value="KULTUR UNIVERSITY">Kultur University</option>
	</select>year<select name="grad_year" value="year" size="1" >
	<option value="2000">2000</option>
	<option value="2001">2001</option>
	<option value="2002">2002</option>
	<option value="2003">2003</option>
	<option value="2004">2004</option>
	<option value="2005">2005</option>
	<option value="2006">2006</option>
	<option value="2007" >2007</option>
	<option value="2008">2008</option>
	<option value="2009">2009</option>
	<option value="2010">2010</option>
	<option value="2011">2011</option>
	<option value="2012">2012</option>
	<option value="2013">2013</option>
	<option value="2014">2014</option>
	<option value="2015">2015</option>
	<option value="2016">2016</option>
</select><br><input type="hidden" name="MAX_FILE_SIZE" value="102400"><br>
<input type="submit" name="sumbit" value="Submit">
 </form><br><br>
 </div>
 </div><script>
 function validateForm() { 
 document.getElementById('pass_2').innerHTML="";
 document.getElementById('fname').innerHTML="";
 document.getElementById('lname').innerHTML="";
  document.getElementById('email_1').innerHTML="";
  	document.getElementById('email_2').innerHTML="";
 
    var x = document.forms["reg_form"]["firstname"].value;
    if (x==null || x=="") {
       document.getElementById('fname').innerHTML='first name required';
        return false;
    }
	var y = document.forms["reg_form"]["lastname"].value;
	if (y==null || y=="") {
		
        document.getElementById('lname').innerHTML='last name required';
        return false;
		}
	var e_mail = document.forms["reg_form"]["email"].value;
	if (e_mail==null || e_mail==""){
	    
		document.getElementById('email_1').innerHTML='email required';
        return false;
		}
else{
var e_mail = document.forms["reg_form"]["email"].value; 
return validateEmail(e_mail);

}
 function validateEmail(e_mail1){


    var filter = /[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.)+[a-zA-Z0-9]{2,4}/;

    if (!filter.test(e_mail1.value)) { 
	document.getElementById('email_1').innerHTML='enter valid email';
	e_mail1.focus;
        return false;
    
 }
}
	 
	 
	 
	 
	 
 }
		var e_mail2 = document.forms["reg_form"]["email2"].value;
		if (e_mail2==null || e_mail2=="") {
		
		document.getElementById('email_1').innerHTML='confirm email';
        return false;
		}
		if(e_mail2 !== e_mail){
		document.getElementById('email_2').innerHTML='email does not match';
		return false;}
		var pass_word = document.forms["reg_form"]["password"].value;
	if (pass_word==null || pass_word=="") {

        document.getElementById('pass_1').innerHTML='password required';
        return false;
		}
	var pass_word2 = document.forms["reg_form"]["password2"].value;
	if (pass_word2==null || pass_word2=="") {
	
	document.getElementById('pass_1').innerHTML="";
        document.getElementById('pass_2').innerHTML='confirm password';
        return false;
		}
		if(pass_word !== pass_word2){
		document.getElementById('pass_2').innerHTML='password does not match';
		return false;
		}
	var fnumber = document.forms["reg_form"]["phone_number"].value;
	if (fnumber !== null && fnumber !== "") {
		
		if (isNaN(fnumber) || fnumber.length !== 11){
        document.getElementById('phone').innerHTML='enter a valid phone number';
        return false;}
		}
	
}
</script>
 <div id="footer">&copy  copyright of sadik hassan 2014<br>
contact<br>Tel:<a href="tel:+905070297010">+905070297010</a><br>email:<a href="mailto:zadikochola@yahoo.com">zadikochola@yahoo.com</a></div>