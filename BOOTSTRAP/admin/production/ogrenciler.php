
<?php include 'header.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">






    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Öğrenci İşlemleri <small><br>

            </small></h2>

            <div class="clearfix"></div>
          </div>








          
          
          <div class="form-group col-md-12">
           <label class="control-label col-md-2 col-sm-3 col-xs-12">Ders Seçiniz!</label>
           <div class="dropdown">

            <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-expanded="true">
              Ders Adı
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
             <?php 
             $DersSor=$db->prepare("SELECT * FROM dersler ORDER BY Ders_ID ASC ");
             $DersSor->execute();
             while($DersCek=$DersSor->fetch(PDO::FETCH_ASSOC)) {  ?>
             <li role="presentation"><a role="menuitem" tabindex="-1" href="ogrenciler.php?id=<?php echo $DersCek['Ders_ID']; ?>"><?php echo $DersCek['Ders_AD']; ?></a></li>
             <?php } ?>
           </ul>
         </div>

       </div>
       <br/> <br/> <br/>


       <div class="x_title">
        <h2 style="padding-left: 350px;"><?php $id=$_GET['id'];
        $DersSor=$db->prepare("SELECT * FROM dersler WHERE Ders_ID = $id ");
         $DersSor->execute();
         $DersCek=$DersSor->fetch(PDO::FETCH_ASSOC);
         echo $DersCek['Ders_AD']; ?><small><br>

       </small></h2>

       <div class="clearfix"></div>
     </div>



     <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">

          <div class="well">
            <form action="../../baglanti/islem.php" method="POST">
              <input type="hidden" name="Ogrenci_Tumu" value="<?php echo $id; ?>">
              <div style=" float: left;"> <strong style="color: red; padding-right: 50px;"> Dikkat !</strong> Tüm Öğrencileri Sil</div>
              <div style="float: right; "><button type="submit" class="btn btn-success" name="OgrenciSil_Tumu" style="float: right;">Uygula</button></div>
            </form>

          </div>


          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Öğrenci No</th>
                <th>Adı</th>
                <th>Soyadı</th>
                <th></th>

              </tr>
            </thead>







            <tbody>
              <?php 
              $id=$_GET['id'];
              $OgrenciSor=$db->prepare("SELECT * FROM alinandersler WHERE Ders_ID=$id");
              $OgrenciSor->execute();
              while ($OgrenciCek=$OgrenciSor->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <?php
                $id=$_GET['id'];
                $Kullanici_ID=$OgrenciCek['Kullanici_ID'];
                $KullaniciSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_ID=$Kullanici_ID");
                $KullaniciSor->execute();
                $KullaniciCek=$KullaniciSor->fetch(PDO::FETCH_ASSOC);
                ?>
                <td><?php echo $OgrenciCek['Kullanici_ID'] ?></td>
                <td><?php echo $KullaniciCek['Kullanici_AD']; ?></td>
                <td><?php echo $KullaniciCek['Kullanici_SOYAD']; ?></td>
                <td><div class="MenuLogout" align="right" style=" padding-right: 20px;">
                  <a href="../../baglanti/islem.php?ogrencisil=ok&ders_id=<?php echo $id; ?>&ogrenci_id=<?php echo $KullaniciCek['Kullanici_ID']; ?>"><button type="submit" class="btn btn-danger" ">Delete</button></a></div></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>






















    </div>
  </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
