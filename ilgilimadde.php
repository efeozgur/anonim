<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>İlgili Madde</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
</head>
<body>
<?php include('menu.php'); ?>
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="kutum">
	<?php 
		$id = $_GET['id'];
		$bul = mysqli_query($baglan, "select * from kanun where ilgiliserh='$id'");
		while ($bulyaz = mysqli_fetch_array($bul)) {
			extract($bulyaz);
			echo "<h3>$kanunno sayılı $kanunadi</h3><br>Madde $maddeno<br>$madde";
			echo "<h5 style='font-size:12px; background-color:#000; color:#fff; text-align:center; padding:3px;'><a href='icekle.php?ilgili=$ilgiliserh'>Bu maddeye şerh ekle</a></h5>";
		}
	 ?>
</div>
</div>
</body>
</html>