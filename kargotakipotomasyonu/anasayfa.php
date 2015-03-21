<?php
require("inc/mysql.php");
require("inc/oturumkontrolu.php");

$sayfa	= $_GET["sayfa"];
?>
<html>
<head>
	<title>Kargo Takip Otomasyonu</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
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
		font-size:12px;
		text-align:left;
	}
	
	a {
		text-decoration:none;
	}
	
	a:hover {
		text-decoration:underline;
	}
	
	h1 {
		font-size:14px;
		padding:0px;
		margin:0px;
		margin-left:10px;
	}
	
	.hosgeldin {
		font-size:12px;
		margin-left:10px;
	}
	
	ul {
		margin:0px;
		padding:10px;
		list-style-type: none;
		list-style-image: none;
	}
	
	li {
		padding:3px;
	}
	
	table {
		font-size:12px;
	}
	
	</style>
</head>
<body>
	<table align="center" bgcolor="#FFFFFF" width="1000">
	<tr height="80">
		<td colspan="2"><h1>Kargo Takip Otomasyonu</h1><br><span class="hosgeldin">Hoşgeldin, <?php echo $adi.' '.$soyadi; ?></span></td>
	</tr>
	<tr>
		<td width="250" valign="top">
			<ul>
				<li><a href="anasayfa.php?sayfa=yenikargo"><img border="0" src="images/add_48.png" width="24" height="24"> Yeni Kargo</a></li>
				<li><a href="anasayfa.php?sayfa=kargolar"><img border="0" src="images/box_48.png" width="24" height="24"> Kargolar</a></li>
				<li><a href="anasayfa.php?sayfa=musteriler"><img border="0" src="images/users_two_48.png" width="24" height="24"> Müşteriler</a></li>
				<li><a href="anasayfa.php?sayfa=bayiler"><img border="0" src="images/table_48.png" width="24" height="24"> Bayiler</a></li>
				<li><a href="anasayfa.php?sayfa=personeller"><img border="0" src="images/table_48.png" width="24" height="24"> Personel Listesi</a></li>
				<li><a href="cikis.php"><img border="0" src="images/cancel_48.png" width="24" height="24"> Çıkış</a></li>
			</ul>
		</td>
		<td bgcolor="#F5F5F0" valign="top">
		<?php
		switch($sayfa)
		{
			case 'bayiler';
				require("sayfalar/bayiler.php");
			break;
			case 'bayiduzenle';
				require("sayfalar/bayiduzenle.php");
			break;
			case 'yenibayi';
				require("sayfalar/yenibayi.php");
			break;
			case 'kargolar';
				require("sayfalar/kargolar.php");
			break;
			case 'kargoduzenle';
				require("sayfalar/kargoduzenle.php");
			break;
			case 'yenikargo';
				require("sayfalar/yenikargo.php");
			break;
			case 'musteriler';
				require("sayfalar/musteriler.php");
			break;
			case 'musteriduzenle';
				require("sayfalar/musteriduzenle.php");
			break;
			case 'personeller';
				require("sayfalar/personeller.php");
			break;
			case 'personelduzenle';
				require("sayfalar/personelduzenle.php");
			break;
			case 'yenipersonel';
				require("sayfalar/yenipersonel.php");
			break;
			case 'yenimusteri';
				require("sayfalar/yenimusteri.php");
			break;
			case 'yenikargo';
				require("sayfalar/yenikargo.php");
			break;
			default;
				require("sayfalar/anasayfa.php");
			break;
		}
		?>
		</td>
	</tr>
	</table>
</body>
</html>