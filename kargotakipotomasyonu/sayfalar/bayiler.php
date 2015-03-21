<table border="0" cellpadding="5" cellspacing="0" width="100%">
<thead>
	<tr height="30">
		<th style="text-align:left;" width="10%">Bayi No</th>
		<th style="text-align:left;" width="30%">Bayi Adı</th>
		<th style="text-align:left;" width="30%">Yetkili Bilgileri</th>
		<th style="text-align:left;" width="15%">Telefon</th>
		<th style="text-align:left;" width="15%">İşlem</th>
	</tr>
</thead>
<tbody>
<?php
if($_GET["islem"] == "sil")
{
	$bayino	= intval($_GET["bayino"]);
	mysqli_query($db, "DELETE FROM bayiler WHERE bayino = '$bayino'");
}

$bayilistesi_say			= 0;
$bayilistesi_sorgu			= mysqli_query($db, "SELECT * FROM bayiler ORDER BY bayi_adi ASC");
while($bayilistesi_sonuc	= mysqli_fetch_array($bayilistesi_sorgu))
{
	$bayilistesi_say++;
	
	echo '
	<tr>
		<td>'.$bayilistesi_sonuc["bayino"].'</td>
		<td>'.$bayilistesi_sonuc["bayi_adi"].'</td>
		<td>'.$bayilistesi_sonuc["bayi_yetkili"].'</td>
		<td>'.$bayilistesi_sonuc["bayi_telefon"].'</td>
		<td><a href="anasayfa.php?sayfa=bayiduzenle&bayino='.$bayilistesi_sonuc["bayino"].'">Düzenle</a> | <a href="anasayfa.php?sayfa=bayiler&islem=sil&bayino='.$bayilistesi_sonuc["bayino"].'">Sil</a></td>
	</tr>';
}

if($bayilistesi_say == 0)
{
	echo '
	<tr height="30">
		<td align="center" colspan="5">Kayıtlı bayi bulunamadı</td>
	</tr>';
}
?>
	<tr>
		<td align="center" colspan="5">
			<br><br>
			<table>
			<tr>
				<td align="center"><a href="anasayfa.php?sayfa=yenibayi"><img src="images/add_48.png"><br>Yeni Bayi Ekle</a></td>
				<td width="10"></td>
				<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
			</tr>
			</table>
		</td>
	</tr>
</tbody>
</table>