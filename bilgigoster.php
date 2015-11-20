<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Bilgi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>
<body style="background-color: #272822;" >
<?php include('dmenu.php'); ?>
	<div class="tekkanunkutu">
	<?php 

		$bilgibaslik = $_GET['ilgili']; 

		$bilgisorgula = mysqli_query($baglan, "select * from bilgitbl where bilgibaslik = '$bilgibaslik'");
		while ($bilgi = mysqli_fetch_array($bilgisorgula)) {
			extract($bilgi);
			echo "<h4><a target='_blank' href='tekanungoster.php?ilgili=$bilgibaslik'>$bilgibaslik</a>. madde hakkında bilgi</h4><p style='font-size:10px;'>";
			if (@$_SESSION['kullanici'] == 'admin') {
				echo "<a href='bilgiedit.php?id=$id'>[Düzenle]</a>";
			}
			echo "</p><hr>"; 
			//$bilgi = strip_tags($bilgi);
			echo "<p style='font-family:Noto Sans;font-size:10px;'>$bilgi</p>";
		}
	?>
		
	</div>
</body>
</html>