<?php include 'header.php';
      include 'sidebar.php';   

            if (!isset($_SESSION['admin_kadi'])) {
                
                header('Location:login.php');
            }

      

            

       ?>

   <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">ANASAYFA</h1>
                        <h1 class="page-subhead-line">Admin Anasayfasına Hoşgeldiniz. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>




<?php include 'footer.php'; ?>