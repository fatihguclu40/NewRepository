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
                <h1 class="page-head-line">SAYFALAR</h1>
                <h1 class="page-subhead-line">Sitenizdek Sayfaları buradan yönetebilirsiniz. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="col-md-12">
            <a href="sayfaekle.php"><button class="btn btn-success">Sayfa Ekle</button></a>
            <hr>
        </div>

        <div class="col-md-12">


         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
                Ekli olan sayfalar
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Eklendiği Tarih</th>
                                <th>Sayfa Adı</th>
                                <th>Anasayfada Göster</th>
                                <th style="width: 20px"></th>
                                <th style="width: 20px"></th>
                            </tr>
                        </thead>
                        <tbody>

                         <?php $sayfasor=mysql_query("select * from sayfalar");
                         while ($sayfacek=mysql_fetch_assoc($sayfasor)){?>

                         <tr>
                            <td><?php echo $sayfacek['sayfa_id']; ?></td>
                            <td><?php echo $sayfacek['sayfa_tarih']; ?></td>
                            <td><?php echo $sayfacek['sayfa_ad']; ?></td>
                            <td><?php 

                                if ($sayfacek['sayfa_anasayfa']==0) {
                                    echo "HAYIR";
                                }
                                elseif($sayfacek['sayfa_anasayfa']==1){
                                    echo "EVET";
                                }

                             ?></td>
                            <td><a href="sayfaduzenle.php?sayfa_id=<?php echo $sayfacek['sayfa_id']; ?>"><button class="btn btn-primary">Düzenle</button></a></td>
                            <td><a href="baglanti/islem.php?sayfa_id=<?php echo $sayfacek['sayfa_id']; ?>&sayfasil=ok"><button class="btn btn-danger">Sil</button></a></td>
                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End  Hover Rows  -->
</div>


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>




<?php include 'footer.php'; ?>