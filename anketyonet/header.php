<?php 
ob_start();
session_start();

include_once 'dbthings/conn.php';

error_reporting(0);


if(isset($_SESSION['kullanici'])){
	$kullanicisor=$db->prepare("SELECT * from yonetici WHERE Mail=:email");
	$kullanicisor->execute(array(
		'email'=>$_SESSION['kullanici']
	));
	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

	$yetki=$kullanicicek['Yetki'];
	if ($yetki==0) {

		include_once 'headerex.php';
	}else{

		header('Location:login.php?durum=no');
	} 
}else{
	header('Location:login.php');
}?>
