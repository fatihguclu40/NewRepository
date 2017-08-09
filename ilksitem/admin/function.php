<?php 



ob_start();
session_start();

function giriskontrol()
{
	$admin_kadi=$_SESSION['admin_kadi'];

	$adminsor=mysql_query("select * from admin where admin_kadi='$admin_kadi'");
	$adminsay=mysql_num_rows($adminsor);

	if ($adminsay==0) {
		header('Location:login.php');
	}

}

 ?>

