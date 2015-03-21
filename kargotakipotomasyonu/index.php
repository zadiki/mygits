<?php
require("inc/mysql.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="tr" class="std">
<head>
	<title>Kargo Takip Otomasyonu - Giriş</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
	body
	{
		background-attachment: fixed;
		background-image: url(images/bg.jpg);
		background-position: center center;
		background-repeat: no-repeat;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		font-family:Verdana;
		font-size:11px;
		text-align:left;
		overflow-y: scroll;
	}
	
	h1 {
		font-size:13px;
		font-weight:bold;
	}
	
	input
	{
		color:#000000;
		border: 1px solid navy;
		background-color:#F7F7F7;
		font-size: 13px;
		font-weight: normal;
		font-family: Tahoma,Verdana,arial,Helvetica,sans-serif;
		padding:0px
	}

	input:hover
	{
		background: #FFFFFF;
	}
	
	table {
		padding: 15px;
		border-radius: 10px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
	}
	
	.mesaj {
		color:#ea0101;
	}
	
	.fill {
		width:100%;
	}
	</style>
</head>
<body leftmargin="0" topmargin="0" rightmargin="0" marginwidth="0" marginheight="0">
<br><br><br><br><br><br><br>
<table bgcolor="#FFFFFF" align="center" width="300">
<tr>
	<td>
	<h1>Otomasyon Girişi</h1><br>
	<form action="kontrol.php" method="POST">
		Kullanıcı Adı:<br><input class="fill" type="text" name="kullaniciadi"><br><br>
		Şifre:<br><input class="fill" type="password" name="sifre"><br><br>
		<input type="submit" value="Giriş Yap"><br><br>
		<?php
		if($_GET["hatamesaj"] == 1)
		{
			echo '<span class="mesaj">Hatalı kullanıcı adı veya şifre girdiniz.</span>';
		}
		?>
	</form>
	</td>
</tr>
</table>
</body>
</html>