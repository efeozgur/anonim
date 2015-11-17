<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Bilgi Düzenle</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
	<?php 
		include('menu.php');  
		$no = $_GET['id'];
		$getir = mysqli_query($baglan, "select * from bilgitbl where id='$no'");
		while ($bilgigetir = mysqli_fetch_array($getir)) {
			extract($bilgigetir);?>
			<form action="" method="POST">
				<textarea name="bilgim" id="" class="ckeditor" cols="30" rows="10"><?php echo $bilgi; ?></textarea>
				<input type="submit" value="Düzenle" />
			</form>
		<?php 
			if ($_POST) {
				$duzenlenenbilgi = $_POST['bilgim'];
				$duzelt = mysqli_query($baglan, "update bilgitbl set bilgi = '$duzenlenenbilgi' where id='$id'");
				if ($duzelt) {
					echo "<p style='font-color:green;'>Kayıt düzenlendi. Değişiklikleri görmek için sayfayı yenileyin!</p>";
				} else {echo "<p style='font-color:red'>Kayıt düzenlenemedi. :(</p>";}
			}
		}

	 ?>

</body>
</html>