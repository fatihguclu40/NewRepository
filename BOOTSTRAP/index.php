<?php include 'header.php'; ?>



<!--SOLBAR BAŞLANGIÇ-->

<?php include 'solbar.php'; ?>




<!--MESAJ ALANI BAŞLANGIÇ -->   
<!--MESAJIN GONDERİLDİĞİ YER -->
<div class="col-md-7">					
	<div class="row">
		<div class="col-md-12">

			<?php 

			$id=$_GET['id'];

			$id2=$_GET['durum'];

			$DersSor=$db->prepare("SELECT * FROM dersler WHERE Ders_ID='$id' or Ders_ID='$id2'");
			$DersSor->execute();
			while($DersCek=$DersSor->fetch(PDO::FETCH_ASSOC)) {?>

			<div class="MADersAdı"><?php echo $DersCek['Ders_AD']; ?></div>

			<?php } ?>




			<div class="GonderiAlanı">

				<div class="GAResimAlanı">
					<div><img class="GAResmi" src="<?php echo $KullaniciCek['Kullanici_PRFLYOL']; ?>" align="left"></div>
				</div>

				<form class="form-inline" action="baglanti/islem.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="Kullanici_ID" value="<?php echo $KullaniciCek['Kullanici_ID']; ?>">
					<input type="hidden" name="Ders_ID" value="<?php echo $_GET['id']; ?>">
					<div class="form-group GAText">
						<input type="text" class="form-control" name="Mesaj_ICERIK" placeholder="Mesaj Yaz" style="width: 540px;" autocomplete="off" >
					</div>

					<div class="GAMesajButton">
						<i class="fa fa-smile-o" aria-hidden="true"></i>
						<span class="btn btn-default btn-file">Dosya Ekle <input type="file" name="Mesaj_DSYOL"></span>


						<button type="submit" class="btn btn-primary" name="MesajGonder">Gönder</button>
					</div>
				</form>




			</div>
		</div>
	</div>


	<!--MESAJIN GELDİĞİ YER -->
	<?php

	$id=$_GET['id'];
	$id2=$_GET['durum'];

	$MesajSor=$db->prepare("SELECT k.Kullanici_AD,k.Kullanici_SOYAD,k.Kullanici_YETKI,k.Kullanici_PRFLYOL,m.Ders_ID,m.Mesaj_ID,m.Kullanici_ID,m.Mesaj_ICERIK,m.Mesaj_TARIH,m.Mesaj_DSYOL
		FROM kullanici AS k INNER JOIN mesaj AS m ON m.Kullanici_ID=k.Kullanici_ID WHERE m.Ders_ID='$id' or m.Ders_ID='$id2' ORDER BY Mesaj_ID DESC");
	$MesajSor->execute();		
	while($MesajCek=$MesajSor->fetch(PDO::FETCH_ASSOC)) {?>

	<div class="row">
		<div class="col-md-12">
			<?php if ($MesajCek['Kullanici_YETKI']==1) { ?>
			<div class="MesajKutusuAlanı" style="background-color: #41dbce;">


				<div class="MKProfilAlanı" >
					<div class="MKPRAlanı"><img class="MKProfilResmi" src="<?php echo $MesajCek['Kullanici_PRFLYOL'];  ?>" align="left"></div>

					<div class="MKAd" style="color: red; "><strong><?php echo $MesajCek['Kullanici_AD']." ".$MesajCek['Kullanici_SOYAD'];  ?></strong></div>


					<div class="MKTarih"><?php   echo $MesajCek['Mesaj_TARIH']; ?></div>
				</div>

				<hr class="HR">

				<div class="MKMesaj" style="word-wrap: break-word;">
					<p style="width: 540px;"><?php echo $MesajCek['Mesaj_ICERIK'];
						echo "<br/>";
						echo "<a href='".$MesajCek['Mesaj_DSYOL']."'>".$MesajCek['Mesaj_DSYOL']."</a>"; ?>
						
					<div style="padding-bottom: 15px;">
							<div class="dropdown" style="float: right; padding-right: 15px;">


							<span class="glyphicon glyphicon-menu-down" data-toggle="dropdown" aria-expanded="true"></span>

								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<form action="baglanti/islem.php" method="POST">
									<input type="hidden" name="Mesaj_Kullanici" value="<?php echo $MesajCek['Kullanici_ID']; ?>">
									<input type="hidden" name="Mesaj_ID" value="<?php echo $MesajCek['Mesaj_ID']; ?>">
									<input type="hidden" name="Session_Kullanici" value="<?php echo $KullaniciCek['Kullanici_ID']; ?>">
									<input type="hidden" name="Ders_ID" value="<?php echo $MesajCek['Ders_ID']; ?>">
									<input  type="submit" name="Mesaj_Sil" value="Mesajı Sil">
									</form>
								</ul>
							</div>
							</div>



						


					</div>

					

					





				</div>
				<?php	} else {  ?>
				<div class="MesajKutusuAlanı">


					<div class="MKProfilAlanı">
						<div class="MKPRAlanı"><img class="MKProfilResmi" src="<?php echo $MesajCek['Kullanici_PRFLYOL'];  ?>" align="left"></div>
						<div class="MKAd"><?php echo $MesajCek['Kullanici_AD']." ".$MesajCek['Kullanici_SOYAD'];  ?></div> 
						<div class="MKTarih"><?php   echo $MesajCek['Mesaj_TARIH']; ?></div>
					</div>

					<hr class="HR">

					<div class="MKMesaj" style="word-wrap: break-word;">
						<p style="width: 540px;"><?php echo $MesajCek['Mesaj_ICERIK'];
							echo "<br/>";
							echo "<a href='".$MesajCek['Mesaj_DSYOL']."'>".$MesajCek['Mesaj_DSYOL']."</a>"; ?>

						


						</div>
						<div style="padding-bottom: 15px;">
							<div class="dropdown" style="float: right; padding-right: 15px;">


							<span class="glyphicon glyphicon-menu-down" data-toggle="dropdown" aria-expanded="true"></span>

								<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<form action="baglanti/islem.php" method="POST">
									<input type="hidden" name="Mesaj_Kullanici" value="<?php echo $MesajCek['Kullanici_ID']; ?>">
									<input type="hidden" name="Mesaj_ID" value="<?php echo $MesajCek['Mesaj_ID']; ?>">
									<input type="hidden" name="Session_Kullanici" value="<?php echo $KullaniciCek['Kullanici_ID']; ?>">
									<input type="hidden" name="Kullanici_YETKI" value="<?php echo $KullaniciCek['Kullanici_YETKI']; ?>">
									<input type="hidden" name="Ders_ID" value="<?php echo $MesajCek['Ders_ID']; ?>">
									<input  type="submit" name="Mesaj_Sil" value="Mesajı Sil">
									</form>
								</ul>
							</div>
							</div>





					</div>
					<?php } ?>

				</div>
			</div>
			<?php } ?>

		</div>

		<!--MESAJ ALANI BİTİŞ  -->



		<!--SAg bar alanının başlangıcı   -->

		<?php include 'sagbar.php'; ?>

		<!--SAg bar alanının bitişi   -->




		<!-- FOOTER  -->
		<?php include 'footer.php'; ?>