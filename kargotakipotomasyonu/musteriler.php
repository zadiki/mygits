<?php
require("inc/mysql.php");
require("inc/oturumkontrolu.php");

$arama	= $_GET["arama"];
$tur	= $_GET["tur"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="tr" class="std">
<head>
	<title>Müşteri Bul</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
	body
	{
		background-attachment: fixed;
		background-image: url(images/arabg.jpg);
		background-position: center center;
		background-repeat: no-repeat;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		font-family:Verdana;
		font-size:12px;
		text-align:left;
	}
	
	a {
		text-decoration:none;
	}
	
	a:hover {
		text-decoration:underline;
	}
	</style>
	<script type="text/javascript">
	var AnaPencere = window.opener;
	
	function musterisec(tcno, adi, soyadi, telefon, eposta, adres, ilce, sehir)
	{
		if(AnaPencere && !AnaPencere.closed) {
			if("<?php echo $tur; ?>" == "gonderen") {
				AnaPencere.document.getElementById("gonderen_tcno").value		= tcno;
				AnaPencere.document.getElementById("gonderen_adi").value		= adi;
				AnaPencere.document.getElementById("gonderen_soyadi").value		= soyadi;
				AnaPencere.document.getElementById("gonderen_telefon").value	= telefon;
				AnaPencere.document.getElementById("gonderen_eposta").value		= eposta;
				AnaPencere.document.getElementById("gonderen_adres").value		= adres;
				AnaPencere.document.getElementById("gonderen_ilce").value		= ilce;
				AnaPencere.document.getElementById("gonderen_sehir").value		= sehir;
			}
			else
			{
				AnaPencere.document.getElementById("alici_tcno").value			= tcno;
				AnaPencere.document.getElementById("alici_adi").value			= adi;
				AnaPencere.document.getElementById("alici_soyadi").value		= soyadi;
				AnaPencere.document.getElementById("alici_telefon").value		= telefon;
				AnaPencere.document.getElementById("alici_eposta").value		= eposta;
				AnaPencere.document.getElementById("alici_adres").value			= adres;
				AnaPencere.document.getElementById("alici_ilce").value			= ilce;
				AnaPencere.document.getElementById("alici_sehir").value			= sehir;
			}
			
			window.close();
		}
	}
	</script>
</head>
<body leftmargin="0" topmargin="0" rightmargin="0" marginwidth="0" marginheight="0">
	<table border="0" cellpadding="10" cellspacing="0" width="100%">
	<tr bgcolor="#F5F5F0">
		<td width="100"><b>Müşteri Bul</b></td>
		<td width="50">:</td>
		<td>
			<form action="musteriler.php">
				<input name="tur" type="hidden" value="<?php echo $tur; ?>">
				<input name="arama" type="text" value="<?php echo $arama; ?>">
				<input type="submit" value="Bul">
			</form>
		</td>
	</tr>
	<tr>
		<td colspan="3">
		<table border="0" cellpadding="5" cellspacing="0" width="100%">
		<?php
		$arama	= mysqli_real_escape_string($db, $arama);
		$musterilistesi_say			= 0;
		$musterilistesi_sorgu		= mysqli_query($db, "SELECT * FROM musteriler WHERE musteri_adi LIKE '%$arama%' OR musteri_soyadi LIKE '%$arama%' OR musteri_tcno LIKE '%$arama%'");
		while($musterilistesi_sonuc	= mysqli_fetch_array($musterilistesi_sorgu))
		{
			$musterilistesi_say++;
			
			echo '
			<tr bgcolor="#FFFFFF">
				<td width="175">'.$musterilistesi_sonuc["musteri_tcno"].'</td>
				<td><a href="javascript:void(0)" onclick="musterisec(\''.$musterilistesi_sonuc["musteri_tcno"].'\', \''.$musterilistesi_sonuc["musteri_adi"].'\', \''.$musterilistesi_sonuc["musteri_soyadi"].'\', \''.$musterilistesi_sonuc["musteri_telno"].'\', \''.$musterilistesi_sonuc["musteri_eposta"].'\', \''.$musterilistesi_sonuc["musteri_adres"].'\', \''.$musterilistesi_sonuc["musteri_ilce"].'\', \''.$musterilistesi_sonuc["musteri_sehir"].'\')">'.$musterilistesi_sonuc["musteri_adi"].' '.$musterilistesi_sonuc["musteri_soyadi"].'</a></td>
			</tr>';
		}
		
		if($musterilistesi_say == 0)
		{
			echo '
			<tr bgcolor="#FFFFFF">
				<td colspan="2"><a href="javascript:void(0)" onclick="musterisec(\''.$arama.'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\')">'.$arama.' için yeni kayıt oluştur.</a></td>
			</tr>';
		}
		?>
		</table>
		</td>
	</tr>
	</table>
</body>
</html>