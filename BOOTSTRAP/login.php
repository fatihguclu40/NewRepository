<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/stil.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>
    body  {

      background-image: url("img/login-image.jpg");
      background-attachment: fixed;
      -moz-background-size: 100% 100%;
      -o-background-size: 100% 100%;
      -webkit-background-size: 100% 100%;
      background-size: 100% 100%;
    }
  </style>
</head>
<body >
<div style="float: right;">
    <a href="login_yonetici.php"><input style="width: 120px; margin-top: 20px; margin-right: 10px;" class="btn btn-danger " type="button" name="Giriş" value="Yönetici Girişi"></a>
  </div>
  <div class="container">

    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

        <div style="background-color: white; margin-top: 120px; opacity: 0.8;" class="panel-body">
          <form action="baglanti/islem.php" method="POST">
            <hr />
            <center><h3><b>MessageBox'a Giriş Yap</b></h3></center>



            <br />
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-tag"  ></i></span>
              <input type="text"  class="form-control" name="Kullanici_KADI" placeholder="Kullanıcı Adınız " required />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"  ></i></span>
              <input type="password"  class="form-control" name="Kullanici_SIFRE" placeholder="Şifreniz" required />
            </div>

            <div class="form-group input-group">
            <?php if ($_GET['durum']=="no") {
                echo "Kullanıcı Bulunamadı";
              }
              elseif ($_GET['durum']=="exit") {
                 echo "Başarıyla Çıkış Yaptınız..";
               } ?>
            </div>



            <input style="width: 100%" class="btn btn-primary" type="submit" name="login" value="Giriş Yap">

            <hr />

          </form>
          Sisteme İlk  Girişinizde Kullanıcı Adı Ve Şifreniz Öğrenci Numaranızdır !&nbsp&nbsp&nbsp
        </div>

      </div> 


    </div>
  </div>

</body>
</html>
