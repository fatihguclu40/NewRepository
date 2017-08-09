
<?php include 'header.php'; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

           
                  
                      

                   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Eğitmen Ekleme Sayfanız <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../../baglanti/islem.php" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                      

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Kullanici_ID" required="required" class="form-control col-md-7 col-xs-12" placeholder="TC Kimlik Numarasının ilk 10 rakamı">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Kullanici_AD" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Kullanici_SOYAD" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kullanıcı Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Kullanici_KADI" name="last-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Eğitmen Adı">
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Şifresi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="Kullanici_SIFRE" name="last-name" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                     
                      
                      <div class="col-md-offset-3">
                      <label>Yetki:(Admin paneline erişim için)</label>
                      <p>
                        0:
                        <input type="radio" class="flat" name="Kullanici_YETKI"  value="0"  required /> 1:
                        <input type="radio" class="flat" name="Kullanici_YETKI"  value="1" checked="" />
                      </p>
                     </div>

                   
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="Egitmen_Ekle" style="width: 20%;" class="btn btn-primary">Ekle</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>



                  <div class="x_panel">
          <div class="x_title">
            <h2>Egitmenler</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">





            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                   
                    <th class="column-title">&nbsp&nbsp&nbspID</th>
                    <th class="column-title">AD </th>
                    <th class="column-title">SOYAD</th>
                    <th class="column-title">K.ADI</th>
                    <th class="column-title">SIFRE </th>
                    <th class="column-title">YETKI</th>
                    
                    <th class="column-title"></th>
                    
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>





                <?php 
                       $Kullanici_YETKI = 1;
                      $EgitmenSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_YETKI='$Kullanici_YETKI' ORDER BY Kullanici_ID ASC ");
                      $EgitmenSor->execute();
                while($EgitmenCek=$EgitmenSor->fetch(PDO::FETCH_ASSOC)) {?>
               
              

                <tbody>
                  <tr class="even pointer">
                   
                    <td class=" "><?php echo $EgitmenCek['Kullanici_ID']; ?></td>
                    <td class=" "><?php echo $EgitmenCek['Kullanici_AD']; ?></td>
                    <td class=" "><?php echo $EgitmenCek['Kullanici_SOYAD']; ?></td>
                    <td class=" "><?php echo $EgitmenCek['Kullanici_KADI']; ?></td>
                    <td class=" "><?php echo $EgitmenCek['Kullanici_SIFRE']; ?></td>
                    <td class=" "><?php echo $EgitmenCek['Kullanici_YETKI']; ?></td>
                    
                    <td><div class="MenuLogout" align="right" style="padding-top: 10px; padding-right: 20px;">
              <a href="../../baglanti/islem.php?egitmensil=ok&egitmen_id=<?php echo $EgitmenCek['Kullanici_ID'];  ?>"><button type="submit" class="btn btn-danger" ">Delete</button></a></div></td>
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
        <!-- /page content -->

       <?php include 'footer.php'; ?>
