<div class="container">    
	<div class="row">

		<!--SOLBAR BİTİŞ -->
		<div class="col-md-3">
			<div class="well">


				<div class="well1">
					<form action="baglanti/islem.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="ResimSil" value="<?php echo $KullaniciCek['Kullanici_PRFLYOL']; ?>">
						<div class="ana"><img src="<?php echo $KullaniciCek['Kullanici_PRFLYOL']; ?>" alt="Avatar" class="prflimg"></div>
						<div class="ara" style="width: 220px; height: 110px;">
							<input type="hidden" value="<?php echo $KullaniciCek['Kullanici_ID']; ?>" name="Kullanici_ID" />
							<div class="yazılar" style="font-size: 15px;"><p style="font-size: 15px;">Profil Resmi Yükle</p><input type="file" name="Kullanici_PRFLYOL" /></div>
							<div class="yazılar"><input type="submit" name="KProfile" value="Değiştir" style="color: black; size: 50px;" /></div>
						</div>
					</form>

				</div>




				<div class="well">
					<div class="list-group">
						<a href="#" class="list-group-item active">
							Derslerim
						</a>
						<?php 

						$Kullanici_ID=$KullaniciCek['Kullanici_ID'];
						$Kullanici_YETKI=$KullaniciCek['Kullanici_YETKI'];

						if ($Kullanici_YETKI==0) {
							

							$DersSor=$db->prepare("SELECT * FROM alinandersler WHERE Kullanici_ID=$Kullanici_ID");
							$DersSor->execute();
							while($DersCek=$DersSor->fetch(PDO::FETCH_ASSOC)) {?>
							<a href="index.php?id=<?php echo $DersCek['Ders_ID'] ?>" class="list-group-item"><?php
								$Ders_ID=$DersCek['Ders_ID'];
								$DersSor2=$db->prepare("SELECT * FROM dersler WHERE Ders_ID=$Ders_ID");
								$DersSor2->execute();
								$DersCek2=$DersSor2->fetch(PDO::FETCH_ASSOC);
								echo $DersCek2['Ders_AD'];

								?></a>
								<?php } } else {

									$DersSor=$db->prepare("SELECT * FROM dersler ORDER BY Ders_ID ASC");
									$DersSor->execute();
									while($DersCek=$DersSor->fetch(PDO::FETCH_ASSOC)) {?>
									<a href="index.php?id=<?php echo $DersCek['Ders_ID'] ?>" class="list-group-item"><?php
										$Ders_ID=$DersCek['Ders_ID'];
										$DersSor2=$db->prepare("SELECT * FROM dersler WHERE Ders_ID=$Ders_ID");
										$DersSor2->execute();
										$DersCek2=$DersSor2->fetch(PDO::FETCH_ASSOC);
										echo $DersCek2['Ders_AD'];

										?></a>

									<?php }}	?>
									</div>
								</div>

								<?php 
								$UyariSor=$db->prepare("SELECT * FROM uyari ORDER BY Uyari_ETARIH DESC");
								$UyariSor->execute();
								while($UyariCek=$UyariSor->fetch(PDO::FETCH_ASSOC)) {?>
								<div class="alert alert-danger">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<p><strong><?php echo $UyariCek['Uyari_BASLIK']; ?></strong></p>
									<?php echo $UyariCek['Uyari_ICERIK']; ?>
									<a href="<?php echo $UyariCek['Uyari_LINK']; ?>" ><?php echo $UyariCek['Uyari_LINK']; ?></a>
								</div>
								<?php } ?>

							</div>
						</div>