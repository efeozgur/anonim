<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Tekil Kanun Gösterimi</title>
	<link rel="stylesheet" href="css/ozel.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>
<body style="background-color: #272822;" >
	<?php 
	include('dmenu.php');
		$gelenserh = $_GET['ilgili'];
		$sorgulagetir = mysqli_query($baglan, "select * from kanun where ilgiliserh = '$gelenserh'");
		$sorgu = mysqli_fetch_array($sorgulagetir);
		extract($sorgu);
		echo "<div style='font-family:Noto Sans' class='tekkanunkutu'> <h3>$kanunadi</h3>
		<p><b>Madde No :</b> $maddeno </p>
		<p>$madde </p>";
			$ilgiliserhigetir = mysqli_query($baglan, "select * from serh where ilgili = '$ilgiliserh'");
			while ($ilgili = mysqli_fetch_array($ilgiliserhigetir)) {
				extract($ilgili);
				echo "<div style='border-style:solid; border-color:gray; border-width:1px; font-size:12px; padding:15px; margin:5px; background-color:#fff; border-radius:5px;'>
					<p><b><a href='serhgoster.php?id=$id'>$daire | $esasno - $kararno</a></b></p>
					<p>$ozet</p>
				</div>";
			}
		echo "</div>";
	 ?>
</body>
</html>