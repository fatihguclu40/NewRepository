<?php 



include 'baglan.php';


if (isset($_POST['ayarkaydet'])) {
	

	$id=0;


	$ayarkaydet=mysql_query("update ayarlar set ayar_title='".$_POST['ayar_title']."',ayar_description='".$_POST['ayar_description']."',ayar_keywords='".$_POST['ayar_keywords']."',ayar_telefon='".$_POST['ayar_telefon']."',ayar_facebook='".$_POST['ayar_facebook']."',ayar_twitter='".$_POST['ayar_twitter']."',ayar_footer='".$_POST['ayar_footer']."',ayar_adres='".$_POST['ayar_adres']."',ayar_mail='".$_POST['ayar_mail']."',ayar_fax='".$_POST['ayar_fax']."' where ayar_id='$id'");


		if (mysql_affected_rows()) {

			header("Location:../ayarlar.php?durum=ok");
		}
		else
		{ 
			header("Location:../ayarlar.php?durum=no");

		}



}


if ($_POST['login']) {
	
	$admin_kadi = $_POST['admin_kadi'];
	$admin_sifre = $_POST['admin_sifre'];


 
    if ($admin_kadi && $admin_sifre) {
    	
    	$sorgula=mysql_query("select * from admin where admin_kadi='$admin_kadi' and admin_sifre='$admin_sifre'");


    	$verisay=mysql_num_rows($sorgula);


    	if ($verisay>0) {
    		$_SESSION['admin_kadi'] = $admin_kadi;

    		header("Location:../index.php");
    	}
    	else
    	{
    		header("Location:../login.php?login=no");
    	}
    }

}


if (isset($_POST['menukaydet'])) {
	
	$menukaydet=mysql_query("insert into menuler (menu_ad,menu_link) VALUES ('".$_POST['menu_ad']."','".$_POST['menu_link']."')");


	if (mysql_affected_rows()) {
		

		header('Location:../menuekle.php?durum=ok');
	}

	else
	{
		header('Location:../menuekle.php?durum=no');
	}
}




if (isset($_POST['menuduzenle'])) {
	

	$menu_id=$_POST['menu_id'];


	$ayarkaydet=mysql_query("update menuler set menu_ad='".$_POST['menu_ad']."',menu_link='".$_POST['menu_link']."' where menu_id='$menu_id'");


		if (mysql_affected_rows()) {

			header("Location:../menuduzenle.php?durum=ok&menu_id=$menu_id");
		}
		else
		{ 
			header("Location:../menuduzenle.php?durum=no&menu_id=$menu_id");

		}



}

if ($_GET['menusil']=="ok") {
	

	$menusil=mysql_query("delete from menuler where menu_id='".$_GET['menu_id']."'");

	if (mysql_affected_rows()) {
		
		header('Location:../menuler.php?durum=ok');
	}
	else
	{
		header('Location:../menuler.php?durum=no');
	}
}


if (isset($_POST['sliderekle'])) {
	

	$uploads_dir = '../uploads';

	@$tmp_name = $_FILES['slidegorsel']["tmp_name"];

	@$name = $_FILES['slidegorsel']["name"];

	$benzersizsayi1=rand(20000,32000);

	$benzersizsayi2=rand(20000,32000);

	$benzersizsayi3=rand(20000,32000);

	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");






	$sliderekle=mysql_query("insert into slider (slider_resimyol,slider_url,slider_sira,slider_ad) VALUES ('".$refimgyol."','".$_POST['slider_url']."','".$_POST['slider_sira']."','".$_POST['slider_ad']."')");


	if (mysql_affected_rows()) {
		

		header('Location:../sliderekle.php?durum=ok');
	}

	else
	{
		header('Location:../sliderekle.php?durum=no');
	}
}



if ($_GET['slidersil']=="ok") {
	
	$slidersil=mysql_query("delete from slider where slider_id='".$_GET['slider_id']."'");

	if (mysql_affected_rows()) {

		$resimsil=$_GET['sliderresimsil'];
		unlink("../$resimsil");
		
		header('Location:../slider.php?durum=ok');
	}
	else
	{
		header('Location:../slider.php?durum=no');
	}
}


if (isset($_POST['sayfakaydet'])) {


	$zaman=date('Y-m-d H:i');
	
	$sayfakaydet=mysql_query("insert into sayfalar (sayfa_ad,sayfa_icerik,sayfa_sira,sayfa_anasayfa,sayfa_tarih) VALUES ('".$_POST['sayfa_ad']."','".$_POST['sayfa_icerik']."','".$_POST['sayfa_sira']."','".$_POST['sayfa_anasayfa']."','".$zaman."')");


	if (mysql_affected_rows()) {
		

		header('Location:../sayfalar.php?durum=ok');
	}

	else
	{
		header('Location:../sayfalar.php?durum=no');
	}
}

if ($_GET['sayfasil']=="ok") {
	

	$menusil=mysql_query("delete from sayfalar where sayfa_id='".$_GET['sayfa_id']."'");

	if (mysql_affected_rows()) {
		
		header('Location:../sayfalar.php?durum=ok');
	}
	else
	{
		header('Location:../sayfalar.php?durum=no');
	}
}


if (isset($_POST['sayfaduzenle'])) {
	

	$sayfa_id=$_POST['sayfa_id'];


	$sayfakaydet=mysql_query("update sayfalar set sayfa_ad='".$_POST['sayfa_ad']."',sayfa_icerik='".$_POST['sayfa_icerik']."',sayfa_sira='".$_POST['sayfa_sira']."',sayfa_anasayfa='".$_POST['sayfa_anasayfa']."' where sayfa_id='$sayfa_id'");


		if (mysql_affected_rows()) {

			header("Location:../sayfaduzenle.php?durum=ok&sayfa_id=$sayfa_id");
		}
		else
		{ 
			header("Location:../sayfaduzenle.php?durum=no&sayfa_id=$sayfa_id");

		}



}


 ?>