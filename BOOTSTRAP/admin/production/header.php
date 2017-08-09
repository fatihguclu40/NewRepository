
<?php  
ob_start();
session_start();
include '../../baglanti/baglan.php';


if (!($_SESSION['Kullanici_KADI']) || $_SESSION['Kullanici_YETKI'] == 0) {
  header('Location:../../login_yonetici.php?durum=no');
}
date_default_timezone_set('Europe/Istanbul');



$KullaniciSor=$db->prepare("SELECT * FROM kullanici WHERE Kullanici_KADI= :kad");
$KullaniciSor->execute(array('kad' => $_SESSION['Kullanici_KADI']));
$KullaniciCek=$KullaniciSor->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentelella Alela! | </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <div style="padding-left: 40px; padding-top: 20px;"><img src="../../img/ekranalintisi.png" style="width: 60px; height: 50px; border-radius: 5px;">  <div style="float: right; padding-right: 35px; padding-top: 20px; color: white;">Message Box</div> </div>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            
            <div class="profile_info" style="padding-left: 50px;">
              <span>Hoşgeldin,</span>
              <h2><?php echo $KullaniciCek['Kullanici_AD']; ?></h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <?php include 'sidebar.php'; ?>

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              
              </div>
              <div class="MenuLogout" align="right" style="padding-top: 10px; padding-right: 20px;">
              <a href="../../logout_admin.php"><button type="submit" class="btn btn-danger" ">Çıkış Yap</button></a></div>
            </div>


          </nav>
        </div>
      </div>
        <!-- /top navigation -->