<?php
$gelenuyeno	= intval($_GET["uyeno"]);

if($_GET["islem"])
{
	//Verilerimizi alalım
	$personel_kullaniciadi	= $_POST["personel_kullaniciadi"];
	$personel_sifre			= $_POST["personel_sifre"];
	$personel_eposta		= $_POST["personel_eposta"];
	$personel_adi			= $_POST["personel_adi"];
	$personel_soyadi		= $_POST["personel_soyadi"];
	
	if(!$personel_kullaniciadi || !$personel_sifre || !$personel_eposta || !$personel_adi || !$personel_soyadi)
	{
		$mesaj	= "Lütfen müşteri bilgilerini eksiksiz giriniz.";
	}
	else
	{
		$personel_kullaniciadi	= mysqli_real_escape_string($db, $personel_kullaniciadi);
		$personel_sifre			= mysqli_real_escape_string($db, $personel_sifre);
		$personel_eposta		= mysqli_real_escape_string($db, $personel_eposta);
		$personel_adi			= mysqli_real_escape_string($db, $personel_adi);
		$personel_soyadi		= mysqli_real_escape_string($db, $personel_soyadi);
		
		mysqli_query($db, "UPDATE uyeler SET kullaniciadi='$personel_kullaniciadi', sifre='$personel_sifre', eposta='$personel_eposta', adi='$personel_adi', soyadi='$personel_soyadi' WHERE uyeno = '$gelenuyeno'");
		
		$mesaj	= "Personel başarıyla kayıt edildi.";
	}
}

$personelbilgileri_sorgu	= mysqli_query($db, "SELECT * FROM uyeler WHERE uyeno = '$gelenuyeno'");
$personelbilgileri_sonuc	= mysqli_fetch_array($personelbilgileri_sorgu);
?>
<form action="anasayfa.php?sayfa=personelduzenle&islem=kaydet&uyeno=<?php echo $personelbilgileri_sonuc["uyeno"]; ?>" method="POST">
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<td colspan="2">Personel Bilgileri</td>
</tr>
<tr>
	<td width="100"><b>Kullanıcı Adı</b></td>
	<td><input id="personel_kullaniciadi" name="personel_kullaniciadi" type="text" value="<?php echo $personelbilgileri_sonuc["kullaniciadi"]; ?>"></td>
</tr>
<tr>
	<td><b>Şifre</b></td>
	<td><input id="personel_sifre" name="personel_sifre" type="text" value="<?php echo $personelbilgileri_sonuc["sifre"]; ?>"></td>
</tr>
<tr>
	<td><b>Eposta</b></td>
	<td><input id="personel_eposta" name="personel_eposta" type="text" value="<?php echo $personelbilgileri_sonuc["eposta"]; ?>"></td>
</tr>
<tr>
	<td><b>Adı</b></td>
	<td><input id="personel_adi" name="personel_adi" type="text" value="<?php echo $personelbilgileri_sonuc["adi"]; ?>"></td>
</tr>
<tr>
	<td><b>Soyadı</b></td>
	<td><input id="personel_soyadi" name="personel_soyadi" type="text" value="<?php echo $personelbilgileri_sonuc["soyadi"]; ?>"></td>
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
			<td align="center"><a href="anasayfa.php?sayfa=personeller"><img src="images/table_48.png"><br>Personel Listesi</a></td>
			<td width="10"></td>
			<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</form>