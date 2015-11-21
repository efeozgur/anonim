<?php 
	if (@$_SESSION['kullanici'] == '') {
		header('Refresh: 1; url=giris.php');
		echo "Önce giriş yapınız...!!!";
		exit();
	}
 ?>