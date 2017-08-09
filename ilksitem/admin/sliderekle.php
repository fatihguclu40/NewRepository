<?php include 'header.php';
      include 'sidebar.php';   ?>

   <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SLİDER EKLEME SAYFANIZ</h1>




                        <?php if($_GET['durum']=="ok") {?>

                        <h1 style="color: green;" class="page-subhead-line">Slider Başarıyla Eklendi... </h1>

                        <?php } elseif($_GET['durum']=="no") { ?>

                        <h1 style="color: red;" class="page-subhead-line">Slider Eklenemedi... </h1>

                        <?php } else { ?>

                        <h1  class="page-subhead-line">Sitenize Sliderlarınızı Bu Sayfadan Ekleyebilirsiniz...</h1>

                        <?php } ?>
                        

                    </div>
                </div>
                <!-- /. ROW  -->

                <form action="baglanti/islem.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-lg-4">Resim Yükleme</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değiştir</span><input type="file" name="slidegorsel"></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Kaldır</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Slider Adı</label>
                            <input class="form-control" type="text" name="slider_ad" placeholder="Slider Adını Giriniz..." >                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Slider Url</label>
                            <input class="form-control" type="text" name="slider_url" value="http://">                      
                        </div>                            
                    </div>

                     <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Slider Sıra</label>
                            <input class="form-control" type="number" name="slider_sira" placeholder="Slider Sırasını Giriniz...">                      
                        </div>                            
                    </div>

                    

                    <div class="col-md-12" >   
                        <div class="form-group col-md-3">
                            
                            <input style="width: 100%" class="btn btn-success" type="submit" name="sliderekle" value="Slider Ekle">                      
                        </div>                            
                    </div>










                </form>               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>




<?php include 'footer.php'; ?>