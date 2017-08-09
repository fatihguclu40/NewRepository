<?php
ob_start();
session_start();
include 'baglan.php';
date_default_timezone_set('Europe/Istanbul');


	if (isset($_POST['login'])) { // Login işlemi

		$Kullanici_KADI = $_POST['Kullanici_KADI'];
		$Kullanici_SIFRE = md5($_POST['Kullanici_SIFRE']);



		if ($Kullanici_KADI && $Kullanici_SIFRE) {

			$KullaniciSor = $db->prepare("SELECT * FROM kullanici WHERE Kullanici_KADI = :kad and Kullanici_SIFRE = :sifre");

			$KullaniciSor->execute(array( 'kad' => $Kullanici_KADI , 'sifre' => $Kullanici_SIFRE));

			


			$say=$KullaniciSor->rowCount();
			

			if ($say > 0) {


				$_SESSION['Kullanici_KADI']=$Kullanici_KADI;

				$KullaniciCek=$KullaniciSor->fetch(PDO::FETCH_ASSOC);
				$Kullanici_ID=$KullaniciCek['Kullanici_ID'];

				$KDersSor=$db->prepare("SELECT *FROM alinandersler WHERE Kullanici_ID=$Kullanici_ID");
				$KDersSor->execute();
				$KDersCek=$KDersSor->fetch(PDO::FETCH_ASSOC);
				$id=$KDersCek['Ders_ID'];
				$id0=$KDersCek['Ders_ID'];
				

				header("Location:../index.php?id=$id");
			}
			else{
				header('Location:../login.php?durum=no');
				
			}
			
		}


	}

	if (isset($_POST['Kaydet'])) {  // Kullanıcı Kaydı Ve Sorgusu

		$Ogrenci_ID = $_POST['Kullanici_ID'];

		if ($Ogrenci_ID){

			$OgrenciSor = $db->prepare("SELECT * FROM ogrenciler WHERE Ogrenci_ID = :id");

			$OgrenciSor->execute(array( 'id' => $Ogrenci_ID ));

			$say1 = $OgrenciSor->rowCount();
			if ($say1 > 0) {


				$Kullanici_SIFRE = md5($_POST['Kullanici_SIFRE']);
				$Kullanici_PRFLYOL='../img/df.jpg';
				
				$KullaniciEkle = $db->prepare("INSERT INTO kullanici SET
					Kullanici_AD      = :ad,
					Kullanici_SOYAD   = :soyad,
					Kullanici_ID      = :id,
					Kullanici_KADI    = :kadi,
					Kullanici_SIFRE   = :sifre,
					Kullanici_PRFLYOL = :resim");
				$Ekle = $KullaniciEkle->execute(array(
					"ad"       => $_POST['Kullanici_AD'],
					"soyad"    => $_POST['Kullanici_SOYAD'],
					"id"       => $_POST['Kullanici_ID'],
					"kadi"     => $_POST['Kullanici_KADI'],
					"sifre"    => $Kullanici_SIFRE,
					"resim"    => $Kullanici_PRFLYOL));

				if ($Ekle) {
					header("Location:../kayit_sayfasi.php?durum=ok");
				}
				else{
					header("Location:../kayit_sayfasi.php?durum=no");
				}

			}

			else{
				$message = "Dikkat !! BölümümÜzde Böyle Bir Öğrenci Bulunmamaktadır.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				exit();
			}




		}
		
	}


		if (isset($_POST['login_yonetici'])) { // Login işlemi

			$Kullanici_KADI = $_POST['Kullanici_KADI'];
			$Kullanici_SIFRE = md5($_POST['Kullanici_SIFRE']);



			if ($Kullanici_KADI && $Kullanici_SIFRE) {

				$KullaniciSor = $db->prepare("SELECT * FROM kullanici WHERE Kullanici_KADI = :kad and Kullanici_SIFRE = :sifre");

				$KullaniciSor->execute(array( 'kad' => $Kullanici_KADI , 'sifre' => $Kullanici_SIFRE));

				$KullaniciCek=$KullaniciSor->fetch(PDO::FETCH_ASSOC);



				$say=$KullaniciSor->rowCount();


				if ($say > 0) {


					$_SESSION['Kullanici_KADI']=$Kullanici_KADI;
					$_SESSION['Kullanici_YETKI']=$KullaniciCek['Kullanici_YETKI'];


					header('Location:../admin/production/donem_ekle.php');
				}
				else{
					header('Location:../login_yonetici.php?durum=no');

				}

			}


		}


		if (isset($_POST['DersKaydet'])) {

			
			$DersEkle = $db->prepare("INSERT INTO dersler SET Ders_ID = :id , Ders_AD = :ad , Kullanici_ID = :kid, Donem_ID = :did");
			$Ekle = $DersEkle -> execute(array('id'  => $_POST['Ders_ID'],
				'ad'  => $_POST['Ders_AD'],
				'kid' => $_POST['Kullanici_ID'],
				'did' => $_POST['Donem_ID']
				)); 


			if ($Ekle) {
				header("Location:../admin/production/ders_ekle.php?durum=ok");
			}
			else{
				header("Location:../admin/production/ders_ekle.php?durum=no");
			}
		}


		if ($_GET['derssil']=="ok") {
			
			$Sil=$db->prepare("DELETE FROM dersler WHERE Ders_ID = :id");
			$Kontrol=$Sil->execute(array('id' => $_GET['ders_id']));

			if ($Kontrol) {
				header("Location:../admin/production/ders_ekle.php?durum=ok");
			}
			else{
				header("Location:../admin/production/ders_ekle.php?durum=no");
			}
		}



		if (isset($_POST['KProfile'])) {

			if ($_FILES['Kullanici_PRFLYOL']["size"] > 0){ 

				$KID=$_POST['Kullanici_ID'];

				$uploads = '../img/profile';
				@$tmp_name = $_FILES['Kullanici_PRFLYOL']["tmp_name"];
				@$name = $_FILES['Kullanici_PRFLYOL']["name"];


				$benzersizsayi1 = rand(20000,32000);
				$benzersizsayi2 = rand(20000,32000);
				$benzersizsayi3 = rand(20000,32000);
				$benzersizsayi4 = rand(20000,32000);

				$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

				$PRFLYOL = substr($uploads, 3)."/".$benzersizad.$name;

			$PRFLYOL = strtolower($PRFLYOL); //büyük harfleri küçük harf yapar 
			


			@move_uploaded_file($tmp_name, "$uploads/$benzersizad$name");

			$ResimGuncelle = $db->prepare("UPDATE kullanici SET Kullanici_PRFLYOL = :yeni_resim WHERE Kullanici_ID = $KID");

			$Guncelle = $ResimGuncelle->execute(array("yeni_resim" => $PRFLYOL));

			if ($Guncelle) {
				$ResimSilUnlink=$_POST['ResimSil'];
				unlink("../img/profile/$ResimSilUnlink");
				header("Location:../index.php?durum=ok");
			}
			else{
				header("Location:../index.php?durum=no");
			}
		}
		else { header("Location:../index.php?durum=no"); }
	}

	if (isset($_POST['Egitmen_Ekle'])) {

		$Egitmen_SIFRE = md5($_POST['Kullanici_SIFRE']);



		$EgitmenEkle = $db->prepare("INSERT INTO kullanici SET
			Kullanici_AD      = :ad,
			Kullanici_SOYAD   = :soyad,
			Kullanici_ID      = :id,
			Kullanici_KADI    = :kadi,
			Kullanici_SIFRE   = :sifre,

			Kullanici_YETKI   = :yetki");
		$Ekle = $EgitmenEkle->execute(array(
			"ad"       => $_POST['Kullanici_AD'],
			"soyad"    => $_POST['Kullanici_SOYAD'],
			"id"       => $_POST['Kullanici_ID'],
			"kadi"     => $_POST['Kullanici_KADI'],
			"sifre"    => $Egitmen_SIFRE,

			"yetki"    => $_POST['Kullanici_YETKI']));

		if ($Ekle) {
			header("Location:../admin/production/egitmen_ekle.php?durum=ok");
		}
		else{
			header("Location:../admin/production/egitmen_ekle.php?durum=no");
		}

	}


	if ($_GET['egitmensil']=="ok") {

		$Sil=$db->prepare("DELETE FROM kullanici WHERE Kullanici_ID=:id" );
		$Kontrol=$Sil->execute(array('id' => $_GET['egitmen_id'] ));

		if ($Kontrol) {
			header("Location:../admin/production/egitmen_ekle.php?durum=ok");
		}
		else{
			header("Location:../admin/production/egitmen_ekle.php?durum=no");
		}
	}


	if (isset($_POST['MesajGonder'])) {

		if ($_FILES['Mesaj_DSYOL']["size"] > 0) {


			$uploads = '../uploads';
			@$tmp_name = $_FILES['Mesaj_DSYOL']["tmp_name"];
			@$name = $_FILES['Mesaj_DSYOL']["name"];


			$benzersizsayi1 = rand(20000,32000);
			$benzersizsayi2 = rand(20000,32000);
			$benzersizsayi3 = rand(20000,32000);
			$benzersizsayi4 = rand(20000,32000);

			$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$DSYOL = substr($uploads, 3)."/".$benzersizad.$name;


			@move_uploaded_file($tmp_name, "$uploads/$benzersizad$name");

			$Ders_ID=$_POST['Ders_ID'];
			$MesajEkle = $db->prepare("INSERT INTO mesaj SET
				Mesaj_ICERIK    = :icerik,
				Mesaj_DSYOL     = :dsyol,
				Kullanici_ID    = :kid,
				Ders_ID         = :did");
			$Ekle = $MesajEkle->execute(array(
				"icerik"  => $_POST['Mesaj_ICERIK'],
				"dsyol"   => $DSYOL,
				"kid"     => $_POST['Kullanici_ID'],
				"did"     => $Ders_ID));

			if ($Ekle) {
				header("Location:../index.php?id=$Ders_ID");

			}
			else{
				header("Location:../index.php?durum=no");
			}


		}

		else{
			$Ders_ID=$_POST['Ders_ID'];
			$MesajEkle = $db->prepare("INSERT INTO mesaj SET
				Mesaj_ICERIK    = :icerik,
				Kullanici_ID    = :kid,
				Ders_ID         = :did");
			$Ekle = $MesajEkle->execute(array(
				"icerik"  => $_POST['Mesaj_ICERIK'],
				"kid"     => $_POST['Kullanici_ID'],
				"did"     => $Ders_ID));

			if ($Ekle) {

				header("Location:../index.php?id=$Ders_ID");

			}
			else{
				header("Location:../index.php?durum=no");
			}

		}
	}


	if (isset($_POST['Uyari_Ekle'])) {

		$UyariEkle = $db->prepare("INSERT INTO uyari SET Uyari_BASLIK = :baslik,
			Uyari_ICERIK = :icerik,
			Uyari_LINK   = :link");
		$Ekle = $UyariEkle->execute(array('baslik' =>$_POST['Uyari_BASLIK'] ,
			'icerik' =>$_POST['Uyari_ICERIK'],
			'link'   =>$_POST['Uyari_LINK']));

		if ($Ekle) {
			header("Location:../admin/production/uyari_mesaji.php?durum=ok");
		}
		else{
			header("Location:../admin/production/uyari_mesaji.php?durum=no");
		}

	}


	if ($_GET['uyarisil']=="ok") {

		$Sil=$db->prepare("DELETE FROM uyari WHERE Uyari_ID=:id" );
		$Kontrol=$Sil->execute(array('id' => $_GET['uyari_id'] ));

		if ($Kontrol) {
			header("Location:../admin/production/uyari_mesaji.php?durum=ok");
		}
		else{
			header("Location:../admin/production/uyari_mesaji.php?durum=no");
		}
	}




	if (isset($_POST['DonemKaydet'])) {

		$DersEkle = $db->prepare("INSERT INTO donem SET Donem_YIL = :yil , Donem_DONEM = :donem , Donem_SINIF = :sinif");
		$Ekle = $DersEkle -> execute(array(
			'yil'  => $_POST['Donem_YIL'],
			'donem' => $_POST['Donem_DONEM'],
			'sinif' => $_POST['Donem_SINIF'])); 


		if ($Ekle) {
			header("Location:../admin/production/donem_ekle.php?durum=ok");
		}
		else{
			header("Location:../admin/production/donem_ekle.php?durum=no");
		}
	}

	if ($_GET['donemsil']=="ok") {

		$Sil=$db->prepare("DELETE FROM donem WHERE Donem_ID=:id" );
		$Kontrol=$Sil->execute(array('id' => $_GET['donem_id'] ));

		if ($Kontrol) {
			header("Location:../admin/production/donem_ekle.php?durum=ok");
		}
		else{
			header("Location:../admin/production/donem_ekle.php?durum=no");
		}
	}


	if (isset($_POST['Sifre_Degistir'])) {


		$Kullanici_YENI=md5($_POST['Kullanici_YENI']);

		$Kullanici_ESKI=md5($_POST['Kullanici_ESKI']);

		if ($Kullanici_ESKI==$_POST['Kullanici_KULLANILAN_SIFRE']) {

			$Kullanici_ID=$_POST['Kullanici_ID'];

			$SifreGuncelle=$db->prepare("UPDATE kullanici SET Kullanici_SIFRE = :sifre WHERE Kullanici_ID = $Kullanici_ID");
			$Guncelle=$SifreGuncelle->execute(array('sifre' =>$Kullanici_YENI  ));
			if ($Guncelle) {
				header("Location:../sifredegistir.php?durum=ok");
			}
			else{
				header("Location:../sifredegistir.php?durum=no");
			}

		}
		else{
			header("Location:../sifredegistir.php?durum=yanlis");
		}
	}



	if (isset($_POST['KMesaj_Gonder'])) {




		if ($_FILES['KMesaj_DSYOL']["size"] > 0) {


			$uploads = '../uploads/kmesaj';
			@$tmp_name = $_FILES['KMesaj_DSYOL']["tmp_name"];
			@$name = $_FILES['KMesaj_DSYOL']["name"];



			$benzersizsayi1 = rand(20000,32000);
			$benzersizsayi2 = rand(20000,32000);
			$benzersizsayi3 = rand(20000,32000);


			$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3;

			$DSYOL = substr($uploads, 3)."/".$benzersizad.$name;


			@move_uploaded_file($tmp_name, "$uploads/$benzersizad$name");

			$KMesaj_DERS=$_POST['KMesaj_DERS'];


			$KMesaj_GONDEREN=$_POST['KMesaj_GONDEREN'];
			$KMesaj_ALICI=$_POST['KMesaj_ALICI'];
			$MesajEkle = $db->prepare("INSERT INTO kmesaj SET
				KMesaj_MESAJ    = :icerik,
				KMesaj_DSYOL     = :dsyol,
				Kullanici_ID1    = :kid1,
				Kullanici_ID2    = :kid2");
			$Ekle = $MesajEkle->execute(array(
				"icerik"  => $_POST['KMesaj_MESAJ'],
				"dsyol"   => $DSYOL,
				"kid1"     => $KMesaj_GONDEREN,
				"kid2"     => $KMesaj_ALICI));

			if ($Ekle) {
				header("Location:../chat1.php?id=$KMesaj_DERS&alici=$KMesaj_ALICI");

			}
			else{
				header("Location:../chat1.php?durum=no");
			}


		}

		else{

			$KMesaj_DERS=$_POST['KMesaj_DERS'];


			$KMesaj_GONDEREN=$_POST['KMesaj_GONDEREN'];
			$KMesaj_ALICI=$_POST['KMesaj_ALICI'];






			$MesajEkle = $db->prepare("INSERT INTO kmesaj SET
				KMesaj_MESAJ    = :icerik,

				Kullanici_ID1    = :kid1,
				Kullanici_ID2    = :kid2");
			$Ekle = $MesajEkle->execute(array(
				"icerik"  => $_POST['KMesaj_MESAJ'],

				"kid1"     => $KMesaj_GONDEREN,
				"kid2"     => $KMesaj_ALICI));

			if ($Ekle) {
				header("Location:../chat1.php?id=$KMesaj_DERS&alici=$KMesaj_ALICI");

			}
			else{
				header("Location:../chat1.php?durum=no");
			}


		}

	}


	if (isset($_POST['KMesaj_Tumu'])) {
		$Kullanici_ID=$_POST['Okundu_Tumu'];
		$Mesaj_Okundu=$db->prepare("UPDATE kmesaj SET KMesaj_OKUNDU = :okundu1 WHERE Kullanici_ID2=$Kullanici_ID");
		$Mesaj_Guncelle=$Mesaj_Okundu->execute(array('okundu1' => 1 ));
		if ($Mesaj_Guncelle) {
			header("Location:../messages.php?durum=ok");
		}
		else{
			header("Location:../messages.php?durum=no");
		}
	}



	if (isset($_POST['Mesaj_Sil'])) {

		$Mesaj_Kullanici = $_POST['Mesaj_Kullanici']; 
		$Session_Kullanici = $_POST['Session_Kullanici']; 
		$Mesaj_ID = $_POST['Mesaj_ID']; 
		$Kullanici_YETKI = $_POST['Kullanici_YETKI'];
		$Ders_ID = $_POST['Ders_ID'];

		if (($Session_Kullanici == $Mesaj_Kullanici) OR ($Kullanici_YETKI == 1) ) {

			$MesajSil=$db->prepare("DELETE FROM mesaj WHERE Mesaj_ID =:msg");
			$Sil=$MesajSil->execute(array('msg' => $Mesaj_ID ));
			if ($Sil) {
				header("Location:../index.php?id=$Ders_ID");
			}
			else{
				header("Location:../index.php?id=$Ders_ID");
			}

		}
		else{
			header("Location:../index.php?id=$Ders_ID");
		}





	}


	if ($_GET['ogrencisil']=="ok") {

		
		echo $id=$_GET['ders_id'];

		$Sil=$db->prepare("DELETE FROM kullanici WHERE Kullanici_ID=:kid" );
		$Kontrol=$Sil->execute(array('kid' => $_GET['ogrenci_id'] ));

		if ($Kontrol) {
			header("Location:../admin/production/ogrenciler.php?durum=ok&id=$id");
		}
		else{
			header("Location:../admin/production/ogrenciler.php?durum=no");
		}

		
	}




	if (isset($_POST['OgrenciSil_Tumu'])) {

		$id= $_POST['Ogrenci_Tumu'];

		$DersSor= $db->prepare("SELECT * FROM alinandersler WHERE Ders_ID = :did ");
		$DersSor->execute(array('did' => $id ));
		while ($SorguSil=$DersSor->fetch(PDO::FETCH_ASSOC)) {
			
			$Kullanici_ID = $SorguSil['Kullanici_ID'];
			$KullaniciSil = $db->prepare("DELETE * FROM kullanici WHERE Kullanici_ID = :kid");
			$Sil=$KullaniciSil->execute(array('kid' => $Kullanici_ID ));
			$say = $Sil->rowCount();  

		}
		if ( $say > 0) {
			
			header("Location:../admin/production/ogrenciler.php?durum=ok&id=$id");
		}
		else {

			header("Location:../admin/production/ogrenciler.php?durum=no");
		}
	}



			

	?>













