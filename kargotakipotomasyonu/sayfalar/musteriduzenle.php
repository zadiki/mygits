<?php
$musterino	= intval($_GET["musterino"]);

if($_GET["islem"])
{
	//Verilerimizi alalım
	$musteri_tcno		= $_POST["musteri_tcno"];
	$musteri_adi		= $_POST["musteri_adi"];
	$musteri_soyadi		= $_POST["musteri_soyadi"];
	$musteri_eposta		= $_POST["musteri_eposta"];
	$musteri_telno		= $_POST["musteri_telno"];
	$musteri_sehir		= $_POST["musteri_sehir"];
	$musteri_ilce		= $_POST["musteri_ilce"];
	$musteri_adres		= $_POST["musteri_adres"];
	
	if(!$musteri_tcno || !$musteri_adi || !$musteri_soyadi || !$musteri_eposta || !$musteri_telno || !$musteri_sehir || !$musteri_ilce || !$musteri_adres)
	{
		$mesaj	= "Lütfen müşteri bilgilerini eksiksiz giriniz.";
	}
	else
	{
		$musteri_tcno	= mysqli_real_escape_string($db, $musteri_tcno);
		$musteri_adi	= mysqli_real_escape_string($db, $musteri_adi);
		$musteri_soyadi	= mysqli_real_escape_string($db, $musteri_soyadi);
		$musteri_eposta	= mysqli_real_escape_string($db, $musteri_eposta);
		$musteri_telno	= mysqli_real_escape_string($db, $musteri_telno);
		$musteri_sehir	= mysqli_real_escape_string($db, $musteri_sehir);
		$musteri_ilce	= mysqli_real_escape_string($db, $musteri_ilce);
		$musteri_adres	= mysqli_real_escape_string($db, $musteri_adres);
		
		mysqli_query($db, "UPDATE musteriler SET musteri_tcno='$musteri_tcno', musteri_adi='$musteri_adi', musteri_soyadi='$musteri_soyadi', musteri_eposta='$musteri_eposta', musteri_telno='$musteri_telno', musteri_sehir='$musteri_sehir', musteri_ilce='$musteri_ilce', musteri_adres='$musteri_adres' WHERE musterino = '$musterino'");
		
		$mesaj	= "Müşteri başarıyla kayıt edildi.";
	}
}

$musteribilgileri_sorgu	= mysqli_query($db, "SELECT * FROM musteriler WHERE musterino = '$musterino'");
$musteribilgileri_sonuc	= mysqli_fetch_array($musteribilgileri_sorgu);
?>
<form action="anasayfa.php?sayfa=musteriduzenle&islem=kaydet&musterino=<?php echo $musteribilgileri_sonuc["musterino"]; ?>" method="POST">
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<td colspan="2">Müşteri Bilgileri</td>
</tr>
<tr>
	<td width="100"><b>Tc No</b></td>
	<td><input id="musteri_tcno" name="musteri_tcno" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_tcno"]; ?>"></td>
</tr>
<tr>
	<td><b>Adı</b></td>
	<td><input id="musteri_adi" name="musteri_adi" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_adi"]; ?>"></td>
</tr>
<tr>
	<td><b>Soyadı</b></td>
	<td><input id="musteri_soyadi" name="musteri_soyadi" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_soyadi"]; ?>"></td>
</tr>
<tr>
	<td><b>Eposta</b></td>
	<td><input id="musteri_eposta" name="musteri_eposta" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_eposta"]; ?>"></td>
</tr>
<tr>
	<td><b>Telefon</b></td>
	<td><input id="musteri_telno" name="musteri_telno" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_telno"]; ?>"></td>
</tr>
<tr>
	<td><b>Şehir</b></td>
	<td><input id="musteri_sehir" name="musteri_sehir" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_sehir"]; ?>"></td>
</tr>
<tr>
	<td><b>İlçe</b></td>
	<td><input id="musteri_ilce" name="musteri_ilce" type="text" value="<?php echo $musteribilgileri_sonuc["musteri_ilce"]; ?>"></td>
</tr>
<tr>
	<td><b>Adres</b></td>
	<td><textarea name="musteri_adres" id="musteri_adres"><?php echo $musteribilgileri_sonuc["musteri_adres"]; ?></textarea></td>
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
			<td align="center"><a href="anasayfa.php?sayfa=musteriler"><img src="images/table_48.png"><br>Müşteri Listesi</a></td>
			<td width="10"></td>
			<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</form>