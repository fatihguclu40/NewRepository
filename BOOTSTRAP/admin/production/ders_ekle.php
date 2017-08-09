
<?php include 'header.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Ders Ekleme Sayfanız</h3>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ders Kodu</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="Örn : 415" required="required" name="Ders_ID">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Dersin Adı </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control"  placeholder="Örn : Computer Networks" required="required" name="Ders_AD">
              </div>
            </div>

              <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Ders Egitmeni ID</label>
            <div class="col-md-6 col-sm-6 col-xs-9">
              <select class="form-control" name="Kullanici_ID">


                <?php 
                      
                      $EgitmenSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_YETKI ='1' ORDER BY Kullanici_ID ASC ");
                      $EgitmenSor->execute();
                while($EgitmenCek=$EgitmenSor->fetch(PDO::FETCH_ASSOC)) {?>
               
                <option><?php echo $EgitmenCek['Kullanici_ID']; ?></option>
                 <?php } ?>
              </select>
            </div>
          </div>
             
               <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Dönem ID</label>
            <div class="col-md-6 col-sm-6 col-xs-9">
              <select class="form-control" name="Donem_ID">


                <?php 
                       
                      $DonemSor=$db->prepare("SELECT * FROM donem ORDER BY Donem_ID ASC ");
                      $DonemSor->execute();
                while($DonemCek=$DonemSor->fetch(PDO::FETCH_ASSOC)) {?>
               
                <option><?php echo $DonemCek['Donem_ID']; ?></option>
                 <?php } ?>
              </select>
            </div>
          </div>

        
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                <button style="width: 40%" type="submit" name="DersKaydet" class="btn btn-success">Kaydet</button>
              </div>
            </div>

          </form>


        </div>





      </div>
    </div>
  </div>

<div class="x_panel">
<div class="x_title">
            <h2>Dersler</h2>
            
            <div class="clearfix"></div>
          </div>
  <div class="x_content">





            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                   
                    <th class="column-title">&nbsp&nbsp&nbspID</th>
                    <th class="column-title">ADI</th>
                    <th class="column-title">EĞİTMEN ID</th>
                    <th class="column-title">DONEM ID</th>
                    <th class="column-title"></th>
                    
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>





                <?php 
                       
                      $DersSor=$db->prepare("SELECT * FROM dersler ORDER BY Ders_ID ASC ");
                      $DersSor->execute();
                while($DersCek=$DersSor->fetch(PDO::FETCH_ASSOC)) {?>
               
              

                <tbody>
                  <tr class="even pointer">
                   
                    <td class=" "><?php echo $DersCek['Ders_ID']; ?></td>
                    <td class=" "><?php echo $DersCek['Ders_AD']; ?></td>
                    <td class=" "><?php echo $DersCek['Kullanici_ID']; ?></td>
                    <td class=" "><?php echo $DersCek['Donem_ID']; ?></td>
                    </td>
                   
                    <td><div class="MenuLogout" align="right" style="padding-top: 10px; padding-right: 20px;">
              <a href="../../baglanti/islem.php?derssil=ok&ders_id=<?php echo $DersCek['Ders_ID']; ?>"><button type="submit" class="btn btn-danger" ">Delete</button></a></div></td>
                  </tr>

                      <?php } ?>

                </tbody>
              </table>
            </div>
            </div>


          </div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
