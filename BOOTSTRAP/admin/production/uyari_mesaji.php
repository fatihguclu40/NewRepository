
<?php include 'header.php'; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            
 

                      
              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Uyarı Mesajlarını Buradan Ekleyebilirsiniz. <small><br>
                     
                    </small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../../baglanti/islem.php" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                      

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Uyari_BASLIK" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Uyari_ICERIK" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Link<span></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Uyari_LINK"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                   
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="Uyari_Ekle" style="width: 20%;" class="btn btn-primary">Ekle</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
<div class="x_panel">
          <div class="x_title">
            <h2>Uyarı Mesajları</h2>
            
            <div class="clearfix"></div>
          </div>


          
          <div class="x_content">





            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                   
                    <th class="column-title">&nbsp&nbsp&nbspID</th>
                    <th class="column-title">BASLIK</th>
                    <th class="column-title">ICERIK</th>
                    <th class="column-title">LINK</th>
                    <th class="column-title">EKLENDİĞİ TARİH</th>
                    <th class="column-title"></th>
                    
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>





                <?php 
                       
                      $UyariSor=$db->prepare("SELECT * FROM uyari ORDER BY Uyari_ID ASC ");
                      $UyariSor->execute();
                while($UyariCek=$UyariSor->fetch(PDO::FETCH_ASSOC)) {?>
               
              

                <tbody>
                  <tr class="even pointer">
                   
                    <td class=" "><?php echo $UyariCek['Uyari_ID']; ?></td>
                    <td class=" "><?php echo $UyariCek['Uyari_BASLIK']; ?></td>
                    <td class=" "><?php echo $UyariCek['Uyari_ICERIK']; ?></td>
                    <td class=" "><?php echo $UyariCek['Uyari_LINK']; ?></td>
                    <td class=" "><?php echo $UyariCek['Uyari_ETARIH']; ?></td>
                   
                    <td><div class="MenuLogout" align="right" style="padding-top: 10px; padding-right: 20px;">
              <a href="../../baglanti/islem.php?uyarisil=ok&uyari_id=<?php echo $UyariCek['Uyari_ID']; ?>"><button type="submit" class="btn btn-danger" ">Delete</button></a></div></td>
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
