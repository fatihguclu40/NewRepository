<?php include 'header.php';
include 'sidebar.php';   ?>

<head>
    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
</head>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SAYFA EKLEME SAYFANIZ</h1>




                <?php if($_GET['durum']=="ok") {?>

                <h1 style="color: green;" class="page-subhead-line">Sayfa Başarıyla Eklendi... </h1>

                <?php } elseif($_GET['durum']=="no") { ?>

                <h1 style="color: red;" class="page-subhead-line">Sayfa Eklenemedi... </h1>

                <?php } else { ?>

                <h1  class="page-subhead-line">Sitenize Sayfalarınızı Bu Sayfadan Ekleyebilirsiniz...</h1>

                <?php } ?>
                

            </div>
        </div>
        <!-- /. ROW  -->

        <form action="baglanti/islem.php" method="POST">


            <div class="col-md-12" >   
                <div class="form-group col-md-6">
                    <label>Sayfa Adı</label>
                    <input class="form-control" type="text" name="sayfa_ad" placeholder="Sayfa Adını Giriniz..." >                      
                </div>                            
            </div>

            <div class="col-md-12" >   
                <div class="form-group col-md-12">
                    <label>Sayfa İçerik</label>
                    <textarea name="sayfa_icerik" class="ckeditor"></textarea>                     
                </div>                            
            </div>

            <div class="col-md-12" >   
                <div class="form-group col-md-6">
                    <label>Sayfa Sıra</label>
                    <input class="form-control" type="text" name="sayfa_sira" >                      
                </div>                            
            </div>
            <div class="col-md-12" >
                <div class="form-group col-md-3">
                    <label>Anasayfada Göster</label>
                    <select class="form-control" name="sayfa_anasayfa">
                        <option value="0">HAYIR</option>
                        <option value="1">EVET</option>
                        
                    </select>
                </div>
            </div>

            

            <div class="col-md-12" >   
                <div class="form-group col-md-3">
                    
                    <input style="width: 100%" class="btn btn-success" type="submit" name="sayfakaydet" value="Sayfa Ekle">                      
                </div>                            
            </div>










        </form>               

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>




<?php include 'footer.php'; ?>