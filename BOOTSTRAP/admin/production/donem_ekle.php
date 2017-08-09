
<?php include 'header.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Dönem Ekleme Sayfanız</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          
           <div class="form-group input-group">
            <?php if ($_GET['durum']=="no") {
                echo "Ders Eklenemedi.";
              }
              elseif ($_GET['durum']=="ok") {
                 echo "Ders Başarıyla Eklendi.";
               } ?>
            </div>

<div class="x_content">

            <form class="form-horizontal form-label-left input_mask col-md-6" action="../../baglanti/islem.php" method="POST" enctype="multipart/form-data">



              <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Yıl Seçiniz</label>
            <div class="col-md-6 col-sm-6 col-xs-9">
              <select class="form-control" name="Donem_YIL">
                <option>2016-2017</option>
                <option>2017-2018</option>
                <option>2018-2019</option>
                <option>2019-2020</option>
                 
              </select>
            </div>
          </div>
              <div class="col-md-offset-3">
                      <label>Dönem</label>
                      <p>
                        Güz:
                        <input type="radio" class="flat" name="Donem_DONEM"  value="0"  required /> Bahar:
                        <input type="radio" class="flat" name="Donem_DONEM"  value="1" checked="" />
                      </p>
                     </div>

              <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Sınıf Seçiniz</label>
            <div class="col-md-6 col-sm-6 col-xs-9">
              <select class="form-control" name="Donem_SINIF">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                 
              </select>
            </div>
          </div>       

            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                <button style="width: 40%" type="submit" name="DonemKaydet" class="btn btn-success">Kaydet</button>
              </div>
            </div>

          </form>
</div>

<div class="x_content">
<div class="title_left">
        <h3>Dönemler</h3>
      </div>
  
   <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">ID</th>
                    <th class="column-title">Yıl Bilgisi</th>
                    <th class="column-title">Dönem Bilgisi</th>
                    <th class="column-title">Sınıf Bilgisi</th>
                    <th class="column-title"></th>
                    
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>





                <?php 
                       
                      $DonemSor=$db->prepare("SELECT * FROM donem ORDER BY Donem_ID ASC ");
                      $DonemSor->execute();
                while($DonemCek=$DonemSor->fetch(PDO::FETCH_ASSOC)) {?>
               
              

                <tbody>
                  <tr class="even pointer">
                    <td class=" "><?php echo $DonemCek['Donem_ID']; ?></td>
                    <td class=" "><?php echo $DonemCek['Donem_YIL']; ?></td>
                    <td class=" "><?php if ($DonemCek['Donem_DONEM']==0) {
                      echo "Güz";
                    }
                    else{
                      echo "Bahar";
                      } ?></td>
                      <td class=" "><?php echo $DonemCek['Donem_SINIF']; ?></td>
                    
                   
                    <td><div class="MenuLogout" align="right" style="padding-top: 10px; padding-right: 20px;">
              <a href="../../baglanti/islem.php?donemsil=ok&donem_id=<?php echo $DonemCek['Donem_ID']; ?>"><button type="submit" class="btn btn-danger" ">Delete</button></a></div></td>
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
<!-- /page content -->

<?php include 'footer.php'; ?>
