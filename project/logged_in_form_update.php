<?php      
$imagedir = $_SESSION["USERID"];
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
<div id="form_update">
<form  autocomplete="on" method="POST" action="changeinfo.php"   id="reg_form" onsubmit="return validateForm()"    enctype = "multipart/form-data"   ><legend>change info</legend><br><legend>Firstname</legend>
 <input type="text" name="firstname" value="<?php echo $_SESSION["firstname"]?>"    pattern="[a-zA-Z]{3,}" title="Minimum 3 letters"  maxlength="30" size="25">
 <span class="star" id="fname"></span><br><br>
 <legend>Middle name</legend>
 <input type="text" name="middlename" value="<?php echo $_SESSION["middlename"]?>"   pattern="[a-zA-Z]{3,}" title="Minimum 5 letters"   maxlength="30" size="25"><span class="star" id="middle name">
 </span><br><br>
 <legend>Last name</legend>
<input type="text" name="lastname" value="<?php echo $_SESSION["lastname"]?>" pattern="[a-zA-Z]{5,}" title="Minimum 3 letters"   maxlength="30" size="25"><span class="star" id="lname">
</span><br><br>
<legend>Email</legend>
<input type="email" name="email" value="<?php echo $_SESSION["USEREMAIL"]?>" maxlength="30" size="25"><span class="star" id="email_1">
</span><br><br>
<legend>New email</legend>
<input type="email" name="email1" placeholder="New email" maxlength="30" size="25" ><span class="star" id="email_2">
</span><br><br>
<legend>Confirm new email</legend>
<input type="email" name="email2" placeholder="confirm new email" maxlength="30" size="25" ><span class="star" id="email_2">
</span><br><br>
<legend>password</legend>
<input type="password" name="password" placeholder="curent password" pattern=".{5,}" title="minimum 5 character" maxlength="30" size="25"><span class="star" id="pass_1">
</span><br><br>
<input type="password" name="password1" placeholder="new password" pattern=".{5,}" title="minimum 5 character" maxlength="30" size="25" ><span class="star" id="pass_2">
</span><br><br>
<input type="password" name="password2" placeholder="confirm password" pattern=".{5,}" title="minimum 5 character" maxlength="30" size="25" ><span class="star" id="pass_2">
</span><br><br>
<legend>Phone number</legend>
<input type="text" name="phone" value="<?php echo $_SESSION["PHONE"]?>" pattern=".{10,12}"  maxlength="12" size="15" ><span class="star" id="phone"></span>
<br><br><input type="file" name="profile" class="custom-file-input"><br>
<br>
<label for="school">University of graduation:</label><select name="school"  >
	<option value="YILDIZ TECHNICAL UNIVERSITY">yildiz Technical University</option>
	<option value="GUMUSHANE UNIVERSITY">Gumushane University</option>
	<option value="ISTANBUL TECHNICAL UNIVERSITY">Istanbul Technical University</option>
	<option value="ISHIK UNIVERSITY">Ishik University</option>
	<option value="KULTUR UNIVERSITY">Kultur University</option>
	</select>year<select name="grad_year" >
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
</select><br><br>security question<select name="security">
<option value="who was your best teacher in high school">who was your best teacher in high school</option>
<option value="what's your best aunts first name">what's your best aunt's first name</option>
<option value="where did your first boyfriend come from">where did your first boyfriend come from</option>
<option value="what model was your first smart phone">whatmodel was your first smart phone</option>
<option value=""></option>
</select><br><br>
<input type="text" name="security_answer" placeholder="answer"  maxlength="10" size="25"><br>
<input type="hidden" name="MAX_FILE_SIZE" value="102400"><br><label>Address</label><br>
<textarea name="address" cols="40" rows="5" ></textarea>
<br><br>
<input type="submit" name="sumbit" value="Submit">
 </form><br><br>


</div>

</div></div>
</div>
  <footer>