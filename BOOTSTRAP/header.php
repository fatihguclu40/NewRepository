<?php 
ob_start();
session_start();
include 'baglanti/baglan.php';


if (!($_SESSION['Kullanici_KADI'])) {
	header('Location:login.php');
	$id0=$_GET['id0'];
}
date_default_timezone_set('Europe/Istanbul');



$KullaniciSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_KADI= :kad");
$KullaniciSor->execute(array('kad' => $_SESSION['Kullanici_KADI']));
$KullaniciCek=$KullaniciSor->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Message Site</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/stil.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/myjs.js"></script>
	<style>    
		/* Set black background color, white text and some padding */
		footer {
			background-color: #555;
			color: white;
			padding: 15px;
		}
	</style>
</head>
<body style="background-image: url();
background-repeat: no-repeat;
background-attachment: fixed;
-moz-background-size: 100% 100%;
-o-background-size: 100% 100%;
-webkit-background-size: 100% 100%;
background-size: 100% 100%;" 
>

<nav class="container navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<div style="padding-top: 7px; padding-right: 10px;"><img src="img/ekranalintisi.png" style="width: 35px; height: 35px; border-radius: 5px;"> </div>

		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<?php 
				$Kullanici_ID=$KullaniciCek['Kullanici_ID'];

				$KDersSor=$db->prepare("SELECT *FROM alinandersler WHERE Kullanici_ID=$Kullanici_ID");
				$KDersSor->execute();
				$KDersCek=$KDersSor->fetch(PDO::FETCH_ASSOC);
				$id5=$KDersCek['Ders_ID'];
				?>

				<li class="active"><a href="index.php?id=<?php echo $id5; ?>">Anasayfa</a></li>
				<?php 
				$Kullanici_ID=$KullaniciCek['Kullanici_ID'];
				$KMesajSor=$db->prepare("SELECT * FROM kmesaj WHERE Kullanici_ID2 = '$Kullanici_ID' AND KMesaj_OKUNDU='0' ORDER BY KMesaj_ID ASC ") ;
				$KMesajSor->execute();
				$KMesajCek=$KMesajSor->fetch(PDO::FETCH_ASSOC);
				$count=$KMesajSor->rowCount(); ?>
				<li><a href="messages.php">Mesajlar<span class="badge"><?php echo $count; ?></span></a></li>
			</ul>
			<div class="MenuLogout">
				<div class="dropdown">
					<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						<?php echo $KullaniciCek['Kullanici_AD']; ?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="sifredegistir.php">Şifre Değiştir</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Çıkış Yap</a></li>
					</ul>
				</div>
			</div>


		</div>
	</div>
</nav>