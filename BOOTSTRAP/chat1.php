<?php include 'header.php';
include 'solbar.php';  ?>





			<!--MESAJ ALANI BAŞLANGIÇ -->   
			<!--MESAJIN GONDERİLDİĞİ YER -->
			<div class="col-md-7">		
				<div class="MADersAdı">Mesaj Gönder</div>


				<div class="well">

					<div class="modal-header">
						<?php if ($_GET['durum']=="yok") {
							echo "Mesaj Atılacak Kişiyi Seçiniz.";
						} ?>

						<h4 style="text-align: center;" class="modal-title" id="myModalLabel">
							<?php 

							$Hedef_ID=$_GET['alici'];
							

							$HedefSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_ID='$Hedef_ID' ");
							$HedefSor->execute();
							$HedefCek=$HedefSor->fetch(PDO::FETCH_ASSOC);
							echo $HedefCek['Kullanici_AD']." ".$HedefCek['Kullanici_SOYAD'];

							?>
						</h4>
					</div>
					<div class="modal-body edit-content" style="overflow-y:scroll; height: 350px;">


						<?php 
						$id3=$_GET['id4'];
						$id4=$id3;
						
						$KMesajSor=$db->prepare("SELECT * FROM kmesaj WHERE (Kullanici_ID1='$Hedef_ID' AND Kullanici_ID2='$Kullanici_ID') OR (Kullanici_ID1 = '$Kullanici_ID' AND Kullanici_ID2 = '$Hedef_ID')  ORDER BY KMesaj_ID desc ");
						$KMesajSor->execute();
						



						while ($KMesajCek=$KMesajSor->fetch(PDO::FETCH_ASSOC)) { ?>

						

						<div class="kullanici col-md-7" style="float: right;">
							<div>
								<div class="adsoyad" ><?php $Kullanici_ID1 = $KMesajCek['Kullanici_ID1'];
									$AdSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_ID='$Kullanici_ID1'");
									$AdSor->execute();
									$AdCek=$AdSor->fetch(PDO::FETCH_ASSOC);
									echo $AdCek['Kullanici_AD']." ".$AdCek['Kullanici_SOYAD']; ?></div>
									<div class="zaman"><?php echo $KMesajCek['KMesaj_TARIH']; ?></div>
								</div>

								<div class="msgyazi" style="word-wrap: break-word; width: 500px;"><?php echo $KMesajCek['KMesaj_MESAJ'];
									echo "<br/>";
									echo "<a href='".$KMesajCek['KMesaj_DSYOL']."'>".$KMesajCek['KMesaj_DSYOL']."</a>"; ?></div>
								</div>

								<?php  } ?>



							</div>

							<form action="baglanti/islem.php" method="POST" enctype="multipart/form-data">
								<div class="modal-footer">

									<div class="form-group ">
										<input type="hidden" name="KMesaj_GONDEREN" value="<?php echo $KullaniciCek['Kullanici_ID']; ?>">
										<input type="hidden" name="KMesaj_ALICI"  value="<?php echo $HedefCek['Kullanici_ID']; ?>">
										<input type="hidden" name="KMesaj_DERS"  value="<?php echo $_GET['id']; ?>">


										<input type="text" class="form-control" id="recipient-name" name="KMesaj_MESAJ">
									</div>
									<div class="GAMesajButton">
										<i class="fa fa-smile-o" aria-hidden="true"></i>
										<span class="btn btn-default btn-file">Dosya Ekle <input type="file" name="KMesaj_DSYOL"></span>


										<button type="submit" class="btn btn-primary" name="KMesaj_Gonder">Gönder</button>
									</div>



								</div>
							</form>
						</div>

					</div>

					<!--MESAJ ALANI BİTİŞ  -->



					<!--SAg bar alanının başlangıcı   -->

				<?php include 'sagbar.php'; 
				include 'footer.php';  ?>

	<?php
	$verici=$_GET['verici'];
	echo $verici;
	$degistir=$db->prepare("UPDATE kmesaj SET KMesaj_OKUNDU = :okundu WHERE KMesaj_ID =$verici");
	$degistir->execute(array('okundu' => 1 )); ?>