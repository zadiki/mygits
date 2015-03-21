<?php
//Oturumları başlatalım
session_start();

//Hata mesajlarını açalım
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

//Veri tabanı Bağlantısı
$host		= "localhost";
$dbuser		= "root";
$dbpass		= "";
$database	= "kargotakip";
$db			= @mysqli_connect($host, $dbuser, $dbpass, $database);

//Bağlantı başarılı değilse durdur
if(!$db)
{
	echo 'Baglanti hatasi';
	exit;
}
else
{
	//Karakter setimizi utf-8 yapalım
	mysqli_set_charset($db, "utf8");
}

$uyeno	= $_SESSION["uyeno"];
$adi	= $_SESSION["adi"];
$soyadi	= $_SESSION["soyadi"];
$eposta	= $_SESSION["eposta"];
?>