<?php 

	ob_start();
    session_start();



    $username="root";
    $password="12345678";
    $sunucu="localhost";
    $database="ilksitem";


    $baglan=mysql_connect($sunucu,$username,$password);

    if (!$baglan) {
    			echo "Bağlantı hatası var!";
    		}		

    $db=mysql_select_db($database);
    
    if (!$db) {
     			echo "Veritabanı bağlantı hatası var!";
     		} 		





 ?>