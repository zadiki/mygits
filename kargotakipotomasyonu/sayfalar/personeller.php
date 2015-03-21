<table border="0" cellpadding="5" cellspacing="0" width="100%">
<thead>
	<tr height="30">
		<th style="text-align:left;" width="10%">No</th>
		<th style="text-align:left;" width="25%">Adı Soyadı</th>
		<th style="text-align:left;" width="15%">Kullanıcı Adı</th>
		<th style="text-align:left;" width="20%">Eposta</th>
		<th style="text-align:left;" width="10%">Şifre</th>
		<th style="text-align:left;" width="20%">İşlem</th>
	</tr>
</thead>
<tbody>
<?php
if($_GET["islem"] == "sil")
{
	$gelenuyeno	= intval($_GET["uyeno"]);
	mysqli_query($db, "DELETE FROM uyeler WHERE uyeno = '$gelenuyeno'");
}

$personellistesi_say			= 0;
$personellistesi_sorgu			= mysqli_query($db, "SELECT * FROM uyeler ORDER BY adi ASC, soyadi ASC");
while($personellistesi_sonuc	= mysqli_fetch_array($personellistesi_sorgu))
{
	$personellistesi_say++;
	
	echo '
	<tr>
		<td>'.$personellistesi_sonuc["uyeno"].'</td>
		<td>'.$personellistesi_sonuc["adi"].' '.$personellistesi_sonuc["soyadi"].'</td>
		<td>'.$personellistesi_sonuc["kullaniciadi"].'</td>
		<td>'.$personellistesi_sonuc["eposta"].'</td>
		<td>*****</td>
		<td><a href="anasayfa.php?sayfa=personelduzenle&uyeno='.$personellistesi_sonuc["uyeno"].'">Düzenle</a> | <a href="anasayfa.php?sayfa=personeller&islem=sil&uyeno='.$personellistesi_sonuc["uyeno"].'">Sil</a></td>
	</tr>';
}

if($personellistesi_say == 0)
{
	echo '
	<tr height="30">
		<td align="center" colspan="6">Kayıtlı müşteri bulunamadı</td>
	</tr>';
}
?>
	<tr>
		<td align="center" colspan="6">
			<br><br>
			<table>
			<tr>
				<td align="center"><a href="anasayfa.php?sayfa=yenipersonel"><img src="images/user_add_48.png"><br>Yeni Personel Ekle</a></td>
				<td width="10"></td>
				<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
			</tr>
			</table>
		</td>
	</tr>
</tbody>
</table>