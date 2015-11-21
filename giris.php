<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Üye Girişi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />

</head>
<body style="background-color: #272822;" >
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="beyazkutu">
			<table class="table table-striped">
			<form action="" method="POST">
				<tr>
					<td>Kullanıcı Adı</td>
					<td><input name="kullanici" type="text" /></td>
				</tr>
				<tr>
					<td>Şifre</td>
					<td><input name="sifre" type="password" /></td>
				</tr>		
				<tr>
					<td>Anasayfa</td>
					<td><input type="submit" value="Giriş Yap" /></td>
				</tr>	
			</form>	
			</table>
		</div>
		<?php 
		if ($_POST) {
			$girilenkadi = $_POST['kullanici'];
			$girilensifre = $_POST['sifre'];
			$kullanici = mysqli_query($baglan, "select * from uye where kadi = '$girilenkadi'");
			$kgetir = mysqli_fetch_array($kullanici);
			extract($kgetir);
			if (($girilenkadi == $kadi ) and ($girilensifre == $sifre)) {
				echo "<div class='beyazkutu'>";
					session_start();
					$_SESSION['kullanici'] = $kadi;

					header('Refresh: 0; url=index.php');
					echo "Giriş yapıldı. yönlendiriliyorsunuz...";

				echo "</div>";

			}
		}

		 ?>
	</div>
</body>
</html>