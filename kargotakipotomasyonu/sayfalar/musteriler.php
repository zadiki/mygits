<table border="0" cellpadding="5" cellspacing="0" width="100%">
<thead>
	<tr height="30">
		<th style="text-align:left;" width="10%">No</th>
		<th style="text-align:left;" width="30%">Adı Soyadı</th>
		<th style="text-align:left;" width="30%">Eposta</th>
		<th style="text-align:left;" width="15%">Telefon</th>
		<th style="text-align:left;" width="15%">İşlem</th>
	</tr>
</thead>
<tbody>
<?php
if($_GET["islem"] == "sil")
{
	$musterino	= intval($_GET["musterino"]);
	mysqli_query($db, "DELETE FROM musteriler WHERE musterino = '$musterino'");
}

$musterilistesi_say			= 0;
$musterilistesi_sorgu		= mysqli_query($db, "SELECT * FROM musteriler ORDER BY musteri_adi ASC, musteri_soyadi ASC");
while($musterilistesi_sonuc	= mysqli_fetch_array($musterilistesi_sorgu))
{
	$musterilistesi_say++;
	
	echo '
	<tr>
		<td>'.$musterilistesi_sonuc["musterino"].'</td>
		<td>'.$musterilistesi_sonuc["musteri_adi"].' '.$musterilistesi_sonuc["musteri_soyadi"].'</td>
		<td>'.$musterilistesi_sonuc["musteri_eposta"].'</td>
		<td>'.$musterilistesi_sonuc["musteri_telno"].'</td>
		<td><a href="anasayfa.php?sayfa=musteriduzenle&musterino='.$musterilistesi_sonuc["musterino"].'">Düzenle</a> | <a href="anasayfa.php?sayfa=musteriler&islem=sil&musterino='.$musterilistesi_sonuc["musterino"].'">Sil</a></td>
	</tr>';
}

if($musterilistesi_say == 0)
{
	echo '
	<tr height="30">
		<td align="center" colspan="5">Kayıtlı müşteri bulunamadı</td>
	</tr>';
}
?>
	<tr>
		<td align="center" colspan="5">
			<br><br>
			<table>
			<tr>
				<td align="center"><a href="anasayfa.php?sayfa=yenimusteri"><img src="images/user_add_48.png"><br>Yeni Müşteri Ekle</a></td>
				<td width="10"></td>
				<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
			</tr>
			</table>
		</td>
	</tr>
</tbody>
</table>