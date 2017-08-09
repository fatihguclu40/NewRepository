<?php include 'header.php';
include 'solbar.php';   ?>
		



		<!--MESAJ ALANI BAŞLANGIÇ -->   
		<!--MESAJIN GONDERİLDİĞİ YER -->
		<div class="col-md-7">					
			<div class="well">
				<form class="form-horizontal" action="baglanti/islem.php" method="POST">
					<div style="padding-left: 105px;">
					<?php if ($_GET['durum']=="yanlis") {
							echo "Kullanılan Şifreniz Doğru Girilmedi.";
						}
						elseif ($_GET['durum']=="ok") {
							echo "Şifreniz Başarıyla Değiştirildi.";
						}
						else{
							echo "Şifreniz Değiştirilemedi.";
							} ?>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Kullanılan Şifre</label>
						<div class="col-sm-10">
							<input name="Kullanici_ESKI" type="text" class="form-control" id="inputEmail3" placeholder="İlk Şifreniz Öğrenci Numaranızdır">
						</div>
					</div>
					<input type="hidden" name="Kullanici_KULLANILAN_SIFRE" value="<?php echo $KullaniciCek['Kullanici_SIFRE'] ?>">
					<input type="hidden" name="Kullanici_ID" value="<?php echo $KullaniciCek['Kullanici_ID'] ?>">
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Yeni Şifre</label>
						<div class="col-sm-10">
							<input name="Kullanici_YENI" type="password" class="form-control" id="inputPassword3" placeholder="">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" name="Sifre_Degistir">Değiştir</button>
						</div>
					</div>
				</form>
			</div>

		</div>

		<!--MESAJ ALANI BİTİŞ  -->



		<!--SAg bar alanının başlangıcı   -->

		<?php include 'sagbar.php'; 
		include 'footer.php';  ?>