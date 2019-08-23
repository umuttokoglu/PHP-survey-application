<?php 
include 'conn.php';
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');



//Session kontrolü
if (isset($_POST['giris'])) {

	$kullanici=$_POST['email'];
	$sifre=md5(sha1(md5($_POST['sifre'])));



	if (isset($kullanici) && isset($sifre)) {

		$kullanicisor=$db->prepare("SELECT * FROM yonetici WHERE Mail=:mail AND Sifre=:sifre");
		$kullanicisor->execute(array(
			'mail'=>$kullanici,
			'sifre'=>$sifre
		));

		$say=$kullanicisor->rowCount();

		if ($say>0) {

			$_SESSION['kullanici'] =$kullanici ;

			header('Location:../index.php');
		}
		else{
			header('Location:../login.php?durum=no');
		}
	}
}
//Session kontrolü



//Anket CRUD
if (isset($_POST['anketekle'])) {
	$zaman_damgası=strtotime($_POST['Anket_Tarih_Son']);
	$tarih = date("Y-m-d H:i:s", $zaman_damgası);

	if (isset($_POST['Anket_Onay']) && isset($_POST['Isim_Onay'])){
		$kaydet=$db->prepare("INSERT INTO anket SET 
			Anket_Ad=:adi,
			Anket_Ad_en=:Ad_en,
			Anket_Aciklama=:Aciklama,
			Anket_Aciklama_en=:Aciklama_en,
			Anket_Onay=:onay,
			Isim_Onay=:isim_onay,
			Anket_Tarih_Son=:tarih
			");

		$insert=$kaydet->execute(array(
			'adi'=>$_POST['Anket_Ad'],
			'Ad_en'=>$_POST['Anket_Ad_en'],
			'Aciklama'=>$_POST['Anket_Aciklama'],
			'Aciklama_en'=>$_POST['Anket_Aciklama_en'],
			'onay'=>$_POST['Anket_Onay'],
			'isim_onay'=>$_POST['Isim_Onay'],
			'tarih'=>$tarih
		));

		if ($insert) {
			Header("Location:../index.php?ekle=ok");
		}
		else{
			Header("Location:../index.php?ekle=no");
		}
	}else if(!isset($_POST['Anket_Onay']) && isset($_POST['Isim_Onay'])){
		$kaydet=$db->prepare("INSERT INTO anket SET 
			Anket_Ad=:adi,
			Anket_Ad_en=:Ad_en,
			Anket_Aciklama=:Aciklama,
			Anket_Aciklama_en=:Aciklama_en,
			Isim_Onay=:isim_onay,
			Anket_Tarih_Son=:tarih
			");

		$insert=$kaydet->execute(array(
			'adi'=>$_POST['Anket_Ad'],
			'Ad_en'=>$_POST['Anket_Ad_en'],
			'Aciklama'=>$_POST['Anket_Aciklama'],
			'Aciklama_en'=>$_POST['Anket_Aciklama_en'],
			'isim_onay'=>$_POST['Isim_Onay'],
			'tarih'=>$tarih
		));

		if ($insert) {
			Header("Location:../index.php?ekle=ok");
		}
		else{
			Header("Location:../index.php?ekle=no");
		}
	}else if(isset($_POST['Anket_Onay']) && !isset($_POST['Isim_Onay'])){
		$kaydet=$db->prepare("INSERT INTO anket SET 
			Anket_Ad=:adi,
			Anket_Ad_en=:Ad_en,
			Anket_Aciklama=:Aciklama,
			Anket_Aciklama_en=:Aciklama_en,
			Anket_Onay=:onay,
			Anket_Tarih_Son=:tarih
			");

		$insert=$kaydet->execute(array(
			'adi'=>$_POST['Anket_Ad'],
			'Ad_en'=>$_POST['Anket_Ad_en'],
			'Aciklama'=>$_POST['Anket_Aciklama'],
			'Aciklama_en'=>$_POST['Anket_Aciklama_en'],
			'onay'=>$_POST['Anket_Onay'],
			'tarih'=>$tarih
		));

		if ($insert) {
			Header("Location:../index.php?ekle=ok");
		}
		else{
			Header("Location:../index.php?ekle=no");
		}
	}else{
		$kaydet=$db->prepare("INSERT INTO anket SET 
			Anket_Ad=:adi,
			Anket_Ad_en=:Ad_en,
			Anket_Aciklama=:Aciklama,
			Anket_Aciklama_en=:Aciklama_en,
			Anket_Tarih_Son=:tarih
			");

		$insert=$kaydet->execute(array(
			'adi'=>$_POST['Anket_Ad'],
			'Ad_en'=>$_POST['Anket_Ad_en'],
			'Aciklama'=>$_POST['Anket_Aciklama'],
			'Aciklama_en'=>$_POST['Anket_Aciklama_en'],
			'tarih'=>$tarih
		));

		if ($insert) {
			Header("Location:../index.php?ekle=ok");
		}
		else{
			Header("Location:../index.php?ekle=no");
		}
	}
}
if (isset($_POST['anketduzenle'])) {

	$Id = $_POST['Id'];
	$zaman_damgası=strtotime($_POST['Anket_Tarih_Son']);
	$tarih = date("Y-m-d H:i:s", $zaman_damgası);

	$duzenle=$db->prepare("UPDATE anket SET 
		Anket_Ad=:Ad,
		Anket_Ad_en=:Ad_en,
		Anket_Aciklama=:Aciklama,
		Anket_Aciklama_en=:Aciklama_en,
		Anket_Tarih_Son=:tarih,
		Isim_Onay=:Isim,
		Anket_Onay=:Onay
		WHERE Id=$Id");

	$update=$duzenle->execute(array(
		'Ad'=>$_POST['Anket_Ad'],
		'Ad_en'=>$_POST['Anket_Ad_en'],
		'Aciklama'=>$_POST['Anket_Aciklama'],
		'Aciklama_en'=>$_POST['Anket_Aciklama_en'],
		'tarih'=>$tarih,
		'Isim'=>$_POST['Isim_Onay'],
		'Onay'=>$_POST['Anket_Onay']
	));

	if ($update) {
		Header("Location:../index.php?guncel=ok");
	}
	else{
		Header("Location:../index.php?guncel=no");
	}
}
if (isset($_POST['anketsil'])) {
	$sil=$db->prepare("DELETE FROM anket WHERE Id=:Id");

	$kontrol=$sil->execute(array(
		'Id'=>$_POST['Id']
	));
	if ($kontrol) {
		Header("Location:../index.php?sil=ok");
	}
	else{
		Header("Location:../index.php?sil=no");

	}
}
//Anket CRUD



//Soru CRUD
if (isset($_POST['soruekle'])) {
	$tarih = date('Y.m.d s:i:H');        
	$Id=$_POST['Anket_Id'];
	if ($_POST['Anket_Id']!=0){
		$kaydet=$db->prepare("INSERT INTO soru SET 
			Anket_Id=:Id,
			Soru_Detay=:Detay,
			Soru_Detay_en=:Detay_en
			");

		$insert=$kaydet->execute(array(
			'Id'=>$_POST['Anket_Id'],
			'Detay'=>$_POST['Soru_Detay'],
			'Detay_en'=>$_POST['Soru_Detay_en']
		));

		if ($insert) {
			Header("Location:../anketdetay.php?soruekle=ok&Id=$Id");
		}
		else{
			Header("Location:../anketdetay.php?soruekle=no&Id=$Id");
		}
	}else{
		
		Header("Location:../anketdetay.php?soruekle=no&Id=$Id");

	}
}
if (isset($_POST['soruduzenle'])) {

	$Id = $_POST['Id'];

	$duzenle=$db->prepare("UPDATE soru SET 
		Soru_Detay=:Detay,
		Soru_Detay_en=:Detay_en
		WHERE Id=$Id");

	$update=$duzenle->execute(array(
		'Detay'=>$_POST['Soru_Detay'],
		'Detay_en'=>$_POST['Soru_Detay_en']
	));

	if ($update) {
		Header("Location:../soruduzenle.php?guncel=ok&Id=$Id");
	}
	else{
		Header("Location:../soruduzenle.php?guncel=no&Id=$Id");
	}
}
if (isset($_POST['sorusil'])) {
	$sil=$db->prepare("DELETE FROM soru WHERE Id=:Id");

	$kontrol=$sil->execute(array(
		'Id'=>$_POST['Id']
	));
	if ($kontrol) {
		Header("Location:../index.php?sil=ok");
	}
	else{
		Header("Location:../index.php?sil=no");

	}
}
//Soru CRUD



//Anket Gönder
if (isset($_POST['anketgonder'])) {

	$Soru_Id = $_POST["Soru_Id"]; 
	$Cevap = $_POST["Cevap"];   
	$Deger = $_POST["deger"];        
	$toplam =count($Cevap);

	if (isset($Cevap)){

		$IPekle=$db->prepare("INSERT INTO ip_kontrol SET 
			Anket_Id=:Id,
			Ip=:Ip
			");

		$kayitkontrol=$IPekle->execute(array(
			'Id'=>$_POST['Anket_Id'],
			'Ip'=>$_POST['Ip']
		));

		if ($kayitkontrol) {
			for ($i=0; $i < $toplam ; $i++) { 
				if ($Cevap[$i] == 1) {
					$anketsor=$db->prepare("UPDATE soru SET Cevap_Evet = Cevap_Evet + 1, Deger = Deger + $Deger[$i] WHERE Id = '$Soru_Id[$i]'");
					$anketsor->execute();

				}else{
					$anketsor=$db->prepare("UPDATE soru SET Cevap_Hayir = Cevap_Hayir + 1, Deger = Deger + $Deger[$i] WHERE Id = '$Soru_Id[$i]'");
					$anketsor->execute();
				}
			}
			Header("Location:../../index.php?submit=ok");
		}
		else{
			Header("Location:../../index.php?submit=no");
		}
	}
}
if (isset($_POST['Isimligonder'])) {


	$SoruId = $_POST["Soru_Id"]; 
	$Cevaplar = $_POST["Cevap"];   
	$Degerler = $_POST["deger"];        
	$toplamcevap =count($Cevaplar);

	$IPekle=$db->prepare("INSERT INTO ip_kontrol SET 
		Anket_Id=:Id,
		Ip=:Ip
		");

	$kayitkontrol=$IPekle->execute(array(
		'Id'=>$_POST['Anket_Id'],
		'Ip'=>$_POST['Ip']
	));

	if ($kayitkontrol){
		if ($toplamcevap>0) {
			for ($i=0; $i <$toplamcevap; $i++) { 
				if ($Cevaplar[$i]==1) {
					$kaydet=$db->prepare("INSERT INTO cevap SET 
						Soru_Id=:Id,
						Isim=:ad,
						Evet=:cevap_evet,
						Deger=:soru_deger
						");

					$insert=$kaydet->execute(array(
						'Id'=>$SoruId[$i],
						'ad'=>$_POST['Isim'],
						'cevap_evet'=>1,
						'soru_deger'=>$Degerler[$i]
					));
					if ($insert) {


						header("Location:../../index.php?gonder=basarili");

					}else{
						header("Location:../../index.php?gonder=basarisiz");
					}
				}else{
					$kaydet=$db->prepare("INSERT INTO cevap SET 
						Soru_Id=:Id,
						Isim=:ad,
						Hayir=:cevap_hayir,
						Deger=:soru_deger
						");

					$insert=$kaydet->execute(array(
						'Id'=>$SoruId[$i],
						'ad'=>$_POST['Isim'],
						'cevap_hayir'=>1,
						'soru_deger'=>$Degerler[$i]
					));
				}
				if ($insert) {


					header("Location:../../index.php?gonder=basarili");

				}else{
					header("Location:../../index.php?gonder=basarisiz");
				}
			}
		}else{
			header("Location:../../index.php?gonder=basarisiz");
		}
	}else{
		header("Location:../../index.php?gonder=basarisiz");
	}	
}
//Anket Gönder



?>