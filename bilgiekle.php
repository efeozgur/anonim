<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Bilgi Ekle</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>


<?php 
	$bilgi = $_GET['ilgili'];
	session_start();
	include('giriskontrol.php');
	include('dmenu.php');
 ?>
	<table class="table table-striped">
		<tr>
			<td align="center">BİLGİ EKLE</td>
		</tr>
		<form action="" method="POST">
		<tr>
			<td><textarea name="bilgi" id="" class="ckeditor" cols="30" rows="30"></textarea></td>
		</tr>
	</table>
	<input type="submit" value="Ekle" />
	</form>
<?php 
		if ($_POST) {

			$bilgimetin = $_POST['bilgi'];

			if (!empty($bilgimetin)) {
				$kaydet = mysqli_query($baglan, "insert into bilgitbl (bilgibaslik, bilgi) values ('$bilgi', '$bilgimetin')");
				if ($kaydet) {
					echo "Kayıt Yapıldı..!!!";
				} else { echo mysql_error();}
			} else {echo "Bilgi girmediniz. Kontrol Edin!.";}
			
	}
 ?>
</body>
</html>