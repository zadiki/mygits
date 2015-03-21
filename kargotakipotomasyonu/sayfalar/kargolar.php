<?php
$ara	= $_POST["ara"];
?>
<form action="anasayfa.php?sayfa=kargolar" method="POST">
	<p align="left"><h2>Kayıtlarda Ara</h2></p>
	<p align="center">
		<input placeholder="Alıcı Adı, Alıcı Soyadı, Gönderen Adı, Gönderen Soyadı veya Kargo Numarasını Giriniz." name="ara" style="width:100%" type="text" value="<?php echo $ara; ?>">
	</p>
	<p align="right">
		<input onclick="location.href='anasayfa.php?sayfa=kargolar';" type="button" value="Temizle">
		<input type="submit" value="Kargo Bul">
	</p>
	<hr>
</form>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<thead>
	<tr height="30">
		<th style="text-align:left;" width="10%">Kargo No</th>
		<th style="text-align:left;" width="20%">Gönderen</th>
		<th style="text-align:left;" width="20%">Alıcı</th>
		<th style="text-align:left;" width="35%">Durum</th>
		<th style="text-align:left;" width="15%">İşlem</th>
	</tr>
</thead>
<tbody>
<?php
if($ara != "")
{
	$ara		= mysqli_real_escape_string($db, $ara);
	$mysqlek	= " WHERE gonderen_adi LIKE '%$ara%' OR alici_adi LIKE '%$ara%' OR gonderen_soyadi LIKE '%$ara%' OR alici_soyadi LIKE '%$ara%' OR kargono LIKE '%$ara%'";
}

$kargolistesi_say			= 0;
$kargolistesi_sorgu			= mysqli_query($db, "SELECT * FROM kargolar $mysqlek ORDER BY kargono ASC");
while($kargolistesi_sonuc	= mysqli_fetch_array($kargolistesi_sorgu))
{
	$kargolistesi_say++;
	
	$kargodurum_sorgu		= mysqli_query($db, "SELECT * FROM kargo_durumlar WHERE kargono = '".$kargolistesi_sonuc["kargono"]."' ORDER BY zaman DESC LIMIT 1");
	$kargodurum_sonuc		= mysqli_fetch_array($kargodurum_sorgu);
	
	echo '
	<tr>
		<td>'.$kargolistesi_sonuc["kargono"].'</td>
		<td>'.$kargolistesi_sonuc["gonderen_adi"].' '.$kargolistesi_sonuc["gonderen_soyadi"].'</td>
		<td>'.$kargolistesi_sonuc["alici_adi"].' '.$kargolistesi_sonuc["alici_soyadi"].'</td>
		<td>'.$kargodurum_sonuc["durum"].'</td>
		<td><a href="anasayfa.php?sayfa=kargoduzenle&kargono='.$kargolistesi_sonuc["kargono"].'">Detaylar</a></td>
	</tr>';
}

if($kargolistesi_say == 0)
{
	echo '
	<tr height="30">
		<td align="center" colspan="5">Kayıtlı kargo bulunamadı</td>
	</tr>';
}
?>
	<tr>
		<td align="center" colspan="5">
			<br><br>
			<table>
			<tr>
				<td align="center"><a href="anasayfa.php?sayfa=yenikargo"><img src="images/add_48.png"><br>Yeni Kargo Ekle</a></td>
				<td width="10"></td>
				<td align="center"><a href="anasayfa.php"><img src="images/cancel_48.png"><br>Kapat</a></td>
			</tr>
			</table>
		</td>
	</tr>
</tbody>
</table>