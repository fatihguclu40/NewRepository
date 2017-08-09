<?php include 'header.php';
      include 'sidebar.php';   ?>

   <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">MENÜ EKLEME SAYFANIZ</h1>




                        <?php if($_GET['durum']=="ok") {?>

                        <h1 style="color: green;" class="page-subhead-line">Menü Başarıyla Eklendi... </h1>

                        <?php } elseif($_GET['durum']=="no") { ?>

                        <h1 style="color: red;" class="page-subhead-line">Menü Eklenemedi... </h1>

                        <?php } else { ?>

                        <h1  class="page-subhead-line">Sitenize Menülerinizi Bu Sayfadan Ekleyebilirsiniz...</h1>

                        <?php } ?>
                        

                    </div>
                </div>
                <!-- /. ROW  -->

                <form action="baglanti/islem.php" method="POST">


                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Menü Adı</label>
                            <input class="form-control" type="text" name="menu_ad" placeholder="Menü Adını Giriniz.." >                      
                        </div>                            
                    </div>

                    <div class="col-md-12" >   
                        <div class="form-group col-md-6">
                            <label>Menü Link</label>
                            <input class="form-control" type="text" name="menu_link" value="http://">                      
                        </div>                            
                    </div>

                    

                    <div class="col-md-12" >   
                        <div class="form-group col-md-3">
                            
                            <input style="width: 100%" class="btn btn-success" type="submit" name="menukaydet" value="Menü Ekle">                      
                        </div>                            
                    </div>










                </form>               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>




<?php include 'footer.php'; ?>