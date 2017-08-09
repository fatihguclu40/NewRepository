<?php
$connect = mysqli_connect("localhost", "root", "12345678", "messagebox");
$output = '';

if(isset($_POST["import"]))
{
  $Ders_ID=$_POST['Ders_ID'];
  
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel1/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Eklenen Öğrenciler</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $ad = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $soyad = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $id1=md5($id);
    $query = "INSERT INTO kullanici(Kullanici_ID,Kullanici_AD,Kullanici_SOYAD,Kullanici_KADI,Kullanici_SIFRE) VALUES ('".$id."', '".$ad."','".$soyad."','".$id."','".$id1."')";
    mysqli_query($connect, $query);

    $result = $connect->query("SELECT * FROM alinandersler WHERE Kullanici_ID = '$id' and Ders_ID = '$Ders_ID'");
    if (!$result) {
      die($connect->error);
    }

    if ($result->num_rows > 0) {
      
   
   } 
   else
   {
    $query2 = "INSERT INTO alinandersler(Kullanici_ID,Ders_ID) VALUES ('".$id."', '".$Ders_ID."')";
    mysqli_query($connect, $query2);
   }


  





} 
$output .= '</table>';

}

}
}
?>


<?php include 'header.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Öğrenci Listesi Ekle</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">


         <div class="form-group input-group">
          <?php if ($_GET['durum']=="no") {
            echo "Öğrenciler Eklenemedi.";
          }
          elseif ($_GET['durum']=="ok") {
           echo "Öğrenciler Başarıyla Eklendi.";
         } ?>
       </div>


       <div class="x_content">


         <form class="form-horizontal form-label-left input_mask col-md-6" action="" method="POST" enctype="multipart/form-data">



           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Ders Kodu</label>
             <div class="col-md-6 col-sm-6 col-xs-9">
              <select class="form-control" name="Ders_ID">


                <?php 

                $DersSor=$db->prepare("SELECT * FROM dersler ORDER BY Ders_ID ASC ");
                $DersSor->execute();
                while($DersCek=$DersSor->fetch(PDO::FETCH_ASSOC)) {?>

                <option><?php echo $DersCek['Ders_ID']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>








          <div class=" col-md-12 col-md-offset-3">

            <h5>Sıra No-Öğrenci No-Öğrenci Adı-Öğrenci Soyadı Formatında Yükleyiniz. </h5><br />
            
            <label>Excel Dosyası Seçiniz.</label>
            <input type="file" name="excel" />
            <br />
            <input type="submit" name="import" class="btn btn-info" value="Ekle" style="width: 10%;" />
          </form>
          <br />
          <br />
          
        </div>

        



      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
