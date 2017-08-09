<?php include 'header.php';
include 'solbar.php';   ?>




			<!--MESAJ ALANI BAŞLANGIÇ -->   
			<!--MESAJIN GONDERİLDİĞİ YER -->
			<div class="col-md-7">		

				<div class="MADersAdı">Mesajlar</div>
				<div class="well">
					<form action="baglanti/islem.php" method="POST">
						<input type="hidden" name="Okundu_Tumu" value="<?php echo $KullaniciCek['Kullanici_ID']; ?>">
						<button type="submit" class="btn btn-danger" name="KMesaj_Tumu" style="margin-top: 0px; float: right;">Uygula</button>
					</form>
					<p style="padding-left: 300px; padding-top: 5px;">Tümünü Okundu Olarak İşaretle</p>
				</div>	

				<div class="well">

					
					


					<?php
					$Kullanici_ID=$KullaniciCek['Kullanici_ID']; 

					$KMesajSor=$db->prepare("SELECT * FROM kmesaj WHERE Kullanici_ID2 = '$Kullanici_ID' AND KMesaj_OKUNDU='0' ORDER BY KMesaj_ID ASC ") ;
					$KMesajSor->execute();
					while ($KMesajCek=$KMesajSor->fetch(PDO::FETCH_ASSOC)) {


						?>


						<div class="row">
							<div class="col-sm-3">
								<div class="well1">
									

									<?php 
									$Gonderen=$KMesajCek['Kullanici_ID1'];

									$KullaniciSorPrfl=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_ID='$Gonderen'");
									$KullaniciSorPrfl->execute();
									$KullaniciCekPrfl=$KullaniciSorPrfl->fetch(PDO::FETCH_ASSOC);


									?>

									<p style="padding-left: 30px;"><?php echo $KullaniciCekPrfl['Kullanici_AD']." ".$KullaniciCekPrfl['Kullanici_SOYAD']; ?></p>
									<div style="padding-left: 30px; padding-bottom: 15px;"><img src="<?php echo $KullaniciCekPrfl['Kullanici_PRFLYOL']; ?>" class="img-circle" height="60" width="60" alt="Avatar"></div>
								</div>
							</div>
							
							<a href="chat1.php?alici=<?php echo $KMesajCek['Kullanici_ID1']; ?>&verici=<?php echo $KMesajCek['KMesaj_ID'];  ?>"><div class="col-sm-9">
								<div class="well" style="height: 110px;">
									<div style="float: right;"><?php echo date("d-m-Y",strtotime($KMesajCek['KMesaj_TARIH'])); ?></div><br>
									<div style="word-wrap: break-word; width: 400px;"><?php echo substr($KMesajCek['KMesaj_MESAJ'], 0, 121); ?></div>
								</div>
							</div> </a>
						</div>

						<?php 	} ?>




					</div>

				</div>

				<!--MESAJ ALANI BİTİŞ  -->



				<!--SAg bar alanının başlangıcı   -->

				<?php include 'sagbar.php'; 
				include 'footer.php';  ?>
