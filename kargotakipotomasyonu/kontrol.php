<?php
require("inc/mysql.php");

$kullaniciadi	= $_POST["kullaniciadi"];
$sifre			= $_POST["sifre"];

$kullaniciadi	= mysqli_real_escape_string($db, $kullaniciadi);
$sifre			= mysqli_real_escape_string($db, $sifre);

$kullanicisorgu	= mysqli_query($db, "SELECT * FROM uyeler WHERE kullaniciadi = '$kullaniciadi' AND sifre = '$sifre'");
$kullanicisonuc = mysqli_fetch_array($kullanicisorgu);

if($kullanicisonuc["uyeno"] > 0)
{
	$_SESSION["uyeno"]	= $kullanicisonuc["uyeno"];
	$_SESSION["adi"]	= $kullanicisonuc["adi"];
	$_SESSION["soyadi"]	= $kullanicisonuc["soyadi"];
	$_SESSION["eposta"]	= $kullanicisonuc["eposta"];
	
	header('Location: anasayfa.php');
	exit;
}
else
{
	header('Location: index.php?hatamesaj=1');
	exit;
}
?>