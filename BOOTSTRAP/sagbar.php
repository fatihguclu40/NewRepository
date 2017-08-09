<div class="col-md-2 well" style="float:right;">
					<div class="thumbnail" style="background-color: #f5f5f5;">
						<p>Sosyal Medya Ve Diğerleri:</p>
						<a href="http://www.facebook.com"><img src="img/Facebook-icon.png" alt="Facebook" align="left"></a>
						<a href="http://www.twitter.com"><img src="img/Twitter-icon.png" alt="Twitter"></a>
						<a href="http://www.youtube.com"><img src="img/Youtube-icon.png" alt="Youtube" align="left"></a>
						<a href="http://www.cu.edu.tr"><img src="img/cu-icon.png" alt="ÇÜ" style="height: 60px; width: 60px; border-radius: 50%;"></a>

					</div>  
					<div style="padding-left: 25px;"><p><b>Arkadaslar</b></p></div>    
					<div class="well" style="margin-top: 10px; 

					overflow-y:scroll;
					" class="">




					<div style="height: 200px;">
						<?php 
						$id=$_GET['id'];
						if (isset($_POST['arama'])) {
							$aranan=$_POST['aranan'];
							$KullaniciSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_AD LIKE '%$aranan%' ORDER BY Kullanici_ID");
							$KullaniciSor->execute();
						}
						else{
							
							$Kullanici_ID=$KullaniciCek['Kullanici_ID'];
							$KullaniciSor=$db->prepare("SELECT * FROM alinandersler WHERE Ders_ID=$id AND Kullanici_ID!=$Kullanici_ID");
							$KullaniciSor->execute();


						}


						while($KullaniciCek=$KullaniciSor->fetch(PDO::FETCH_ASSOC)) {?>
						<?php $id=$_GET['id']; ?>
						<p><a  href="chat1.php?alici=<?php echo $KullaniciCek['Kullanici_ID']; ?>&id=<?php echo $id; ?>"   ><?php
							$Kullanici_ID = $KullaniciCek['Kullanici_ID'];
							$KullaniciSor1=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_ID=$Kullanici_ID");
							$KullaniciSor1->execute();
							$KullaniciCek1=$KullaniciSor1->fetch(PDO::FETCH_ASSOC);


							echo $KullaniciCek1['Kullanici_AD']." ".$KullaniciCek1['Kullanici_SOYAD']; ?></a></p>


							<?php } ?>		

						</div>


					</div>
					<form action="" method="POST">
						<div class="input-group">
							<input type="text" class="form-control" name="aranan" placeholder="Aranacak kişi">
							<span class="input-group-btn">
								<button class="btn btn-default" name="arama" type="submit">Ara!</button>
							</span>
						</div><!-- /input-group -->
					</form>
				</div><!-- /.col-lg-6 -->

			</div>


		</div>
	</div>