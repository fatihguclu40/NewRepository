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
                <h1 class="page-head-line">SLİDER</h1>
                <h1 class="page-subhead-line">Sitenizdek Slider'ı buradan yönetebilirsiniz. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="col-md-12">
            <a href="sliderekle.php"><button class="btn btn-success">Slider Ekle</button></a>
            <hr>
        </div>

        <div class="col-md-12">


         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
                Ekli olan Sliderlar
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Slider Adı</th>
                                <th>Slider Resmi</th>
                                <th>Slider Link</th>
                                <th style="width: 20px"></th>
                                <th style="width: 20px"></th>
                            </tr>
                        </thead>
                        <tbody>

                         <?php $slidersor=mysql_query("select * from slider order by slider_sira ASC");
                         while ($slidercek=mysql_fetch_assoc($slidersor)){?>

                         <tr>
                            <td><?php echo $slidercek['slider_id']; ?></td>
                            <td><?php echo $slidercek['slider_ad']; ?></td>
                            <td>
                                <img width="200" src="<?php echo $slidercek['slider_resimyol']; ?>">
                            </td>
                            <td><?php echo $slidercek['slider_url']; ?></td>
                <!--  <td><a href="menuduzenle.php?menu_id=<?php echo $menucek['menu_id']; ?>"><button class="btn btn-primary">Düzenle</button></a></td> -->
                            <td><a href="baglanti/islem.php?slider_id=<?php echo $slidercek['slider_id']; ?>&slidersil=ok&sliderresimsil=<?php echo $slidercek['slider_resimyol']; ?>"><button class="btn btn-danger">Sil</button></a></td>
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