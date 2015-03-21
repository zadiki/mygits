<?php
if($_GET["islem"] == "kaydet")
{
	$gonderen_tcno			= $_POST["gonderen_tcno"];
	$gonderen_adi			= $_POST["gonderen_adi"];
	$gonderen_soyadi		= $_POST["gonderen_soyadi"];
	$gonderen_telefon		= $_POST["gonderen_telefon"];
	$gonderen_eposta		= $_POST["gonderen_eposta"];
	$gonderen_adres			= $_POST["gonderen_adres"];
	$gonderen_ilce			= $_POST["gonderen_ilce"];
	$gonderen_sehir			= $_POST["gonderen_sehir"];
	
	$gonderen_bayino		= $_POST["gonderen_bayino"];
	$gonderen_tarih			= $_POST["gonderen_tarih"];
	$tmpgt					= explode('-', $gonderen_tarih);
	$gonderen_tarih			= $tmpgt[2].'-'.$tmpgt[1].'-'.$tmpgt[0];
	
	$alici_tcno				= $_POST["alici_tcno"];
	$alici_adi				= $_POST["alici_adi"];
	$alici_soyadi			= $_POST["alici_soyadi"];
	$alici_telefon			= $_POST["alici_telefon"];
	$alici_eposta			= $_POST["alici_eposta"];
	$alici_adres			= $_POST["alici_adres"];
	$alici_ilce				= $_POST["alici_ilce"];
	$alici_sehir			= $_POST["alici_sehir"];
	
	$alici_bayino			= $_POST["alici_bayino"];
	$alici_tarih			= $_POST["alici_tarih"];
	$tmpat					= explode('-', $alici_tarih);
	$alici_tarih			= $tmpat[2].'-'.$tmpat[1].'-'.$tmpat[0];
	
	$faturano				= $_POST["faturano"];
	$urun					= $_POST["urun"];
	$miktar					= $_POST["miktar"];
	$agirlik				= $_POST["agirlik"];
	$tutar					= $_POST["tutar"];
	
	if(!$faturano || !$urun || !$miktar || !$agirlik || !$tutar || !$gonderen_tcno || !$gonderen_adi || !$gonderen_soyadi || !$gonderen_telefon || !$gonderen_adres || !$gonderen_ilce || !$gonderen_sehir || !$alici_tcno || !$alici_adi || !$alici_soyadi || !$alici_telefon || !$alici_adres || !$alici_ilce || !$alici_sehir)
	{
		$mesaj	= "Lütfen kargo bilgilerini eksiksiz giriniz.";
	}
	else
	{
		$gonderen_tcno		= mysqli_real_escape_string($db, $gonderen_tcno);
		$gonderen_adi		= mysqli_real_escape_string($db, $gonderen_adi);
		$gonderen_soyadi	= mysqli_real_escape_string($db, $gonderen_soyadi);
		$gonderen_telefon	= mysqli_real_escape_string($db, $gonderen_telefon);
		$gonderen_eposta	= mysqli_real_escape_string($db, $gonderen_eposta);
		$gonderen_adres		= mysqli_real_escape_string($db, $gonderen_adres);
		$gonderen_ilce		= mysqli_real_escape_string($db, $gonderen_ilce);
		$gonderen_sehir		= mysqli_real_escape_string($db, $gonderen_sehir);
		$gonderen_bayino	= mysqli_real_escape_string($db, $gonderen_bayino);
		$gonderen_tarih		= mysqli_real_escape_string($db, $gonderen_tarih);
		
		$alici_tcno			= mysqli_real_escape_string($db, $alici_tcno);
		$alici_adi			= mysqli_real_escape_string($db, $alici_adi);
		$alici_soyadi		= mysqli_real_escape_string($db, $alici_soyadi);
		$alici_telefon		= mysqli_real_escape_string($db, $alici_telefon);
		$alici_eposta		= mysqli_real_escape_string($db, $alici_eposta);
		$alici_adres		= mysqli_real_escape_string($db, $alici_adres);
		$alici_ilce			= mysqli_real_escape_string($db, $alici_ilce);
		$alici_sehir		= mysqli_real_escape_string($db, $alici_sehir);
		$alici_bayino		= mysqli_real_escape_string($db, $alici_bayino);
		$alici_tarih		= mysqli_real_escape_string($db, $alici_tarih);
		
		$faturano			= mysqli_real_escape_string($db, $faturano);
		$urun				= mysqli_real_escape_string($db, $urun);
		$miktar				= mysqli_real_escape_string($db, $miktar);
		$agirlik			= mysqli_real_escape_string($db, $agirlik);
		$tutar				= mysqli_real_escape_string($db, $tutar);
		
		$gonderenkontrol_sorgu	= mysqli_query($db, "SELECT COUNT(*) FROM musteriler WHERE musteri_tcno = '$gonderen_tcno'");
		$gonderenkontrol_sonuc	= mysqli_fetch_row($gonderenkontrol_sorgu);
		$gonderensonuc			= $gonderenkontrol_sonuc[0];
		
		if($gonderensonuc > 0)
		{
			mysqli_query($db, "UPDATE FROM musteriler SET musteri_adi='$gonderen_adi', musteri_soyadi='$gonderen_soyadi', musteri_eposta='$gonderen_eposta', musteri_telno='$gonderen_telefon', musteri_sehir='$gonderen_sehir', musteri_ilce='$gonderen_ilce', musteri_adres='$gonderen_adres' WHERE musteri_tcno = '$gonderen_tcno'");
		}
		else
		{
			mysqli_query($db, "INSERT INTO musteriler (musteri_tcno, musteri_adi, musteri_soyadi, musteri_eposta, musteri_telno, musteri_sehir, musteri_ilce, musteri_adres) VALUES ('$gonderen_tcno', '$gonderen_adi', '$gonderen_soyadi', '$gonderen_eposta', '$gonderen_telefon', '$gonderen_sehir', '$gonderen_ilce', '$gonderen_adres')");
		}
		
		$alicikontrol_sorgu		= mysqli_query($db, "SELECT COUNT(*) FROM musteriler WHERE musteri_tcno = '$alici_tcno'");
		$alicikontrol_sonuc		= mysqli_fetch_row($alicikontrol_sorgu);
		$alicisonuc				= $alicikontrol_sonuc[0];
		
		if($alicisonuc > 0)
		{
			mysqli_query($db, "UPDATE FROM musteriler SET musteri_adi='$alici_adi', musteri_soyadi='$alici_soyadi', musteri_eposta='$alici_eposta', musteri_telno='$alici_telefon', musteri_sehir='$alici_sehir', musteri_ilce='$alici_ilce', musteri_adres='$alici_adres' WHERE musteri_tcno = '$alici_tcno'");
		}
		else
		{
			mysqli_query($db, "INSERT INTO musteriler (musteri_tcno, musteri_adi, musteri_soyadi, musteri_eposta, musteri_telno, musteri_sehir, musteri_ilce, musteri_adres) VALUES ('$alici_tcno', '$alici_adi', '$alici_soyadi', '$alici_eposta', '$alici_telefon', '$alici_sehir', '$alici_ilce', '$alici_adres')");
		}
		
		mysqli_query($db, "INSERT INTO kargolar (faturano, urun, miktar, agirlik, tutar, gonderen_tcno, gonderen_adi, gonderen_soyadi, gonderen_telefon, gonderen_eposta, gonderen_adres, gonderen_ilce, gonderen_sehir, gonderen_bayino, gonderen_tarih, alici_tcno, alici_adi, alici_soyadi, alici_telefon, alici_eposta, alici_adres, alici_ilce, alici_sehir, alici_bayino, alici_tarih) VALUES ('$faturano', '$urun', '$miktar', '$agirlik', '$tutar', '$gonderen_tcno', '$gonderen_adi', '$gonderen_soyadi', '$gonderen_telefon', '$gonderen_eposta', '$gonderen_adres', '$gonderen_ilce', '$gonderen_sehir', '$gonderen_bayino', '$gonderen_tarih', '$alici_tcno', '$alici_adi', '$alici_soyadi', '$alici_telefon', '$alici_eposta', '$alici_adres', '$alici_ilce', '$alici_sehir', '$alici_bayino', '$alici_tarih')");
		mysqli_query($db, "INSERT INTO kargo_durumlar (kargono, durum, zaman) VALUES ('".mysqli_insert_id($db)."', 'Kargo alındı ve paketlendi.', '".time()."')");
		
		$mesaj	= "Kargo başarıyla kayıt edildi.";
	}
}
?>
<script type="text/javascript">
function popupURL(Link, WinID) {
	popupWin = window.open(Link, WinID, "width=500,height=400,toolbar=0,scrollbars=1,status=0,resizable=1,location=0,menuBar=0");
	popupWin.focus();
	return false;
}
</script>
<form action="anasayfa.php?sayfa=yenikargo&islem=kaydet" method="POST">
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<td colspan="3"><b>Yeni Kargo Oluştur</b></td>
</tr>
<tr>
	<td>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr height="30">
			<td colspan="2"><u>Gönderen Bilgileri</u></td>
		</tr>
		<tr height="30">
			<td>TC No</td>
			<td><input id="gonderen_tcno" name="gonderen_tcno" type="text" value="<?php echo $gonderen_tcno; ?>"><input onclick="popupURL('musteriler.php?tur=gonderen', 'gonderen');" type="button" value="Bul"></td>
		</tr>
		<tr height="30">
			<td>Adı</td>
			<td><input id="gonderen_adi" name="gonderen_adi" type="text" value="<?php echo $gonderen_adi; ?>"></td>
		</tr>
		<tr height="30">
			<td>Soyadı</td>
			<td><input id="gonderen_soyadi" name="gonderen_soyadi" type="text" value="<?php echo $gonderen_soyadi; ?>"></td>
		</tr>
		<tr height="30">
			<td>Telefon</td>
			<td><input id="gonderen_telefon" name="gonderen_telefon" type="text" value="<?php echo $gonderen_telefon; ?>"></td>
		</tr>
		<tr height="30">
			<td>Eposta</td>
			<td><input id="gonderen_eposta" name="gonderen_eposta" type="text" value="<?php echo $gonderen_eposta; ?>"></td>
		</tr>
		<tr height="30">
			<td>Gönderen Bayi</td>
			<td>
				<select id="gonderen_bayino" name="gonderen_bayino" required>
				<option value="">Şube Seçiniz</option>
				<?php
				$bayilistesi_sorgu			= mysqli_query($db, "SELECT * FROM bayiler ORDER BY bayi_adi ASC");
				while($bayilistesi_sonuc	= mysqli_fetch_array($bayilistesi_sorgu))
				{
					if($gonderen_bayino == $bayilistesi_sonuc["bayino"])
					{
						echo '<option selected="selected" value="'.$bayilistesi_sonuc["bayino"].'">'.$bayilistesi_sonuc["bayi_adi"].'</option>';
					}
					else
					{
						echo '<option value="'.$bayilistesi_sonuc["bayino"].'">'.$bayilistesi_sonuc["bayi_adi"].'</option>';
					}
				}
				?>
				</select>
			</td>
		</tr>
		<tr height="30">
			<td>Tarih</td>
			<td><input id="gonderen_tarih" name="gonderen_tarih" type="text" value="<?php echo date("d-m-Y"); ?>"></td>
		</tr>
		<tr height="30">
			<td>Adres</td>
			<td><textarea id="gonderen_adres" name="gonderen_adres"><?php echo $gonderen_adres; ?></textarea></td>
		</tr>
		<tr height="30">
			<td>İlçe</td>
			<td><input id="gonderen_ilce" name="gonderen_ilce" type="text" value="<?php echo $gonderen_ilce; ?>"></td>
		</tr>
		<tr height="30">
			<td>Şehir</td>
			<td><input id="gonderen_sehir" name="gonderen_sehir" type="text" value="<?php echo $gonderen_sehir; ?>"></td>
		</tr>
		</table>
	</td>
	<td></td>
	<td>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr height="30">
			<td colspan="2"><u>Alıcı Bilgileri</u></td>
		</tr>
		<tr height="30">
			<td>TC No</td>
			<td><input id="alici_tcno" name="alici_tcno" type="text" value="<?php echo $alici_tcno; ?>"><input onclick="popupURL('musteriler.php?tur=alici', 'alici');" type="button" value="Bul"></td>
		</tr>
		<tr height="30">
			<td>Adı</td>
			<td><input id="alici_adi" name="alici_adi" type="text" value="<?php echo $alici_adi; ?>"></td>
		</tr>
		<tr height="30">
			<td>Soyadı</td>
			<td><input id="alici_soyadi" name="alici_soyadi" type="text" value="<?php echo $alici_soyadi; ?>"></td>
		</tr>
		<tr height="30">
			<td>Telefon</td>
			<td><input id="alici_telefon" name="alici_telefon" type="text" value="<?php echo $alici_telefon; ?>"></td>
		</tr>
		<tr height="30">
			<td>Eposta</td>
			<td><input id="alici_eposta" name="alici_eposta" type="text" value="<?php echo $alici_eposta; ?>"></td>
		</tr>
		<tr height="30">
			<td>Alıcı Bayi</td>
			<td>
				<select id="alici_bayino" name="alici_bayino" required>
				<option value="">Şube Seçiniz</option>
				<?php
				$bayilistesi_sorgu			= mysqli_query($db, "SELECT * FROM bayiler ORDER BY bayi_adi ASC");
				while($bayilistesi_sonuc	= mysqli_fetch_array($bayilistesi_sorgu))
				{
					if($alici_bayino == $bayilistesi_sonuc["bayino"])
					{
						echo '<option selected="selected" value="'.$bayilistesi_sonuc["bayino"].'">'.$bayilistesi_sonuc["bayi_adi"].'</option>';
					}
					else
					{
						echo '<option value="'.$bayilistesi_sonuc["bayino"].'">'.$bayilistesi_sonuc["bayi_adi"].'</option>';
					}
				}
				?>
				</select>
			</td>
		</tr>
		<tr height="30">
			<td>Tarih</td>
			<td><input id="alici_tarih" name="alici_tarih" type="text" value="<?php echo date("d-m-Y"); ?>"></td>
		</tr>
		<tr height="30">
			<td>Adres</td>
			<td><textarea id="alici_adres" name="alici_adres"><?php echo $alici_adres; ?></textarea></td>
		</tr>
		<tr height="30">
			<td>İlçe</td>
			<td><input id="alici_ilce" name="alici_ilce" type="text" value="<?php echo $alici_ilce; ?>"></td>
		</tr>
		<tr height="30">
			<td>Şehir</td>
			<td><input id="alici_sehir" name="alici_sehir" type="text" value="<?php echo $alici_sehir; ?>"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="3"><hr><u>Kargo Detayları</u></td>
</tr>
<tr>
	<td colspan="3">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr height="30">
			<td>Fatura No</td>
			<td><input id="faturano" name="faturano" type="text" value="<?php echo $faturano; ?>"></td>
		</tr>
		<tr height="30">
			<td>Ürün</td>
			<td>
				<select id="urun" name="urun" required>
					<option value="">Ürün Seçiniz</option>
					<option <?php if($urun == "Dosya"){ echo 'selected="selected"'; } ?> value="Dosya">Dosya</option>
					<option <?php if($urun == "Koli"){ echo 'selected="selected"'; } ?> value="Koli">Koli</option>
				</select>
			</td>
		</tr>
		<tr height="30">
			<td>Adet</td>
			<td><input id="miktar" name="miktar" type="number" value="<?php echo $miktar; ?>"></td>
		</tr>
		<tr height="30">
			<td>Ağırlık</td>
			<td><input id="agirlik" name="agirlik" type="text" value="<?php echo $agirlik; ?>"></td>
		</tr>
		<tr height="30">
			<td>Tutar</td>
			<td><input id="tutar" name="tutar" type="text" value="<?php if($tutar > 0) { echo number_format($tutar, 2); } else { echo '0.00'; } ?>"> TL</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="3">
		<input type="submit" value="Kaydet"><br><br>
		<b><?php if($mesaj) { echo '* '.$mesaj; } ?></b>
	</td>
</tr>
<tr>
	<td align="center" colspan="3">
		<br><br>
		<table>
		<tr>
			<td align="center"><a href="anasayfa.php?sayfa=kargolar"><img src="images/table_48.png"><br>Kargo Listesi</a></td>
			<td width="10"></td>
			<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</form>