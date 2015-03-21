<?php
$bayino		= intval($_GET["bayino"]);

if($_GET["islem"] == "kaydet")
{
	//Verilerimizi alalım
	$bayiadi		= $_POST["bayiadi"];
	$bayiyetkili	= $_POST["bayiyetkili"];
	$bayitelefon	= $_POST["bayitelefon"];
	$bayisehir		= $_POST["bayisehir"];
	$bayiilce		= $_POST["bayiilce"];
	$bayiadres		= $_POST["bayiadres"];
	
	if(!$bayiadi || !$bayiyetkili || !$bayitelefon || !$bayisehir || !$bayiilce || !$bayiadres)
	{
		$mesaj	= "Lütfen bayi bilgilerini eksiksiz giriniz.";
	}
	else
	{
		$bayiadi		= mysqli_real_escape_string($db, $bayiadi);
		$bayiyetkili	= mysqli_real_escape_string($db, $bayiyetkili);
		$bayitelefon	= mysqli_real_escape_string($db, $bayitelefon);
		$bayisehir		= mysqli_real_escape_string($db, $bayisehir);
		$bayiilce		= mysqli_real_escape_string($db, $bayiilce);
		$bayiadres		= mysqli_real_escape_string($db, $bayiadres);
		
		mysqli_query($db, "UPDATE bayiler SET bayi_adi='$bayiadi', bayi_yetkili='$bayiyetkili', bayi_telefon='$bayitelefon', bayi_sehir='$bayisehir', bayi_ilce='$bayiilce', bayi_adres='$bayiadres' WHERE bayino = '$bayino'");
		
		$mesaj	= "Bayi başarıyla güncellendi.";
	}
}

$bayibilgileri_sorgu	= mysqli_query($db, "SELECT * FROM bayiler WHERE bayino = '$bayino'");
$bayibilgileri_sonuc	= mysqli_fetch_array($bayibilgileri_sorgu);
?>
<form action="anasayfa.php?sayfa=bayiduzenle&islem=kaydet&bayino=<?php echo $bayibilgileri_sonuc["bayino"]; ?>" method="POST">
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<td colspan="2">Bayi Bilgileri</td>
</tr>
<tr>
	<td width="100"><b>Bayi Adı</b></td>
	<td><input id="bayiadi" name="bayiadi" type="text" value="<?php echo $bayibilgileri_sonuc["bayi_adi"]; ?>"></td>
</tr>
<tr>
	<td><b>Bayi Yetkili</b></td>
	<td><input id="bayiyetkili" name="bayiyetkili" type="text" value="<?php echo $bayibilgileri_sonuc["bayi_yetkili"]; ?>"></td>
</tr>
<tr>
	<td><b>Bayi Telefon</b></td>
	<td><input id="bayitelefon" name="bayitelefon" type="text" value="<?php echo $bayibilgileri_sonuc["bayi_telefon"]; ?>"></td>
</tr>
<tr>
	<td><b>Bayi Şehir</b></td>
	<td><input id="bayisehir" name="bayisehir" type="text" value="<?php echo $bayibilgileri_sonuc["bayi_sehir"]; ?>"></td>
</tr>
<tr>
	<td><b>Bayi İlçe</b></td>
	<td><input id="bayiilce" name="bayiilce" type="text" value="<?php echo $bayibilgileri_sonuc["bayi_ilce"]; ?>"></td>
</tr>
<tr>
	<td><b>Bayi Adres</b></td>
	<td><textarea id="bayiadres" name="bayiadres"><?php echo $bayibilgileri_sonuc["bayi_adres"]; ?></textarea></td>
</tr>
<tr>
	<td colspan="2">
		<input type="submit" value="Kaydet"><br><br>
		<b><?php if($mesaj) { echo '* '.$mesaj; } ?></b>
	</td>
</tr>
<tr>
	<td align="center" colspan="2">
		<br><br>
		<table>
		<tr>
			<td align="center"><a href="anasayfa.php?sayfa=bayiler"><img src="images/table_48.png"><br>Bayi Listesi</a></td>
			<td width="10"></td>
			<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</form>