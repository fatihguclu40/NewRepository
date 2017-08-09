<?php include 'header.php';
      include 'sidebar.php';   ?>

   <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SITE GENEL AYARLARI</h1>




                        <?php if($_GET['durum']=="ok") {?>

                        <h1 style="color: green;" class="page-subhead-line">Kayıtlar başarıyla güncellendi... </h1>

                        <?php } elseif($_GET['durum']=="no") { ?>

                        <h1 style="color: red;" class="page-subhead-line">Kayıtlar güncellenemedi muhtemelen değişiklik yapmadınız... </h1>

                        <?php } else { ?>

                        <h1  class="page-subhead-line">Sitenizin Genel Ayarlarını Burdan yapabilirsiniz...</h1>

                        <?php } ?>
                        

                    </div>
                </div>
                <!-- /. ROW  -->

                <form action="baglanti/islem.php" method="POST">


                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Site Başlığı</label>
                            <input class="form-control" type="text" name="ayar_title" value="<?php echo $ayarcek['ayar_title']; ?>" >                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Site Açıklaması</label>
                            <input class="form-control" type="text" name="ayar_description" value="<?php echo $ayarcek['ayar_description']; ?>">                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Site Anahtar Kelimeleri</label>
                            <input class="form-control" type="text" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords']; ?>">                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        
                        <div class="form-group col-md-3">
                            <label>Telefon</label>
                            <input class="form-control" type="text" name="ayar_telefon" value="<?php echo $ayarcek['ayar_telefon']; ?>">                      
                        </div>

                        <div class="form-group col-md-3">
                            <label>Facebook Adresi</label>
                            <input class="form-control" type="text" name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook']; ?>">                      
                        </div> 

                        <div class="form-group col-md-3">
                            <label>Twitter Adresi</label>
                            <input class="form-control" type="text" name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter']; ?>">                      
                        </div>                             
                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-12">
                            <label>Site Footer</label>
                            <input class="form-control" type="text" name="ayar_footer" value="<?php echo $ayarcek['ayar_footer']; ?>">                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-12">
                            <label>Adresiniz</label>
                            <input class="form-control" type="text" name="ayar_adres" value="<?php echo $ayarcek['ayar_adres']; ?>">                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        
                        <div class="form-group col-md-6">
                            <label>Mail Adresiniz</label>
                            <input class="form-control" type="text" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail']; ?>">                      
                        </div>

                        <div class="form-group col-md-6">
                            <label>Fax Numaranız</label>
                            <input class="form-control" type="text" name="ayar_fax" value="<?php echo $ayarcek['ayar_fax']; ?>">                      
                        </div>

                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            
                            <input style="width: 100%" class="btn btn-success" type="submit" name="ayarkaydet" value="Ayarları Kaydet">                      
                        </div>                            
                    </div>










                </form>               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>




<?php include 'footer.php'; ?>