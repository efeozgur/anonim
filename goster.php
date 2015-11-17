<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>İçtihat Listesi</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/ozel.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	
	
	
</head>
<body>
<?php include('menu.php'); ?>
	<?php 
		$ilgili = $_GET['id'];
		$simdigelbakim = mysqli_query($baglan, "select * from serh where ilgili = '$ilgili' order by id desc" );
		$say = mysqli_num_rows($simdigelbakim);
		if ($say == '0') {
			echo "İçtihat bulunamadı!";
		}
		while ($gelsin = mysqli_fetch_array($simdigelbakim)) {
			extract($gelsin);
			$serhkisa = substr($serh, 0,50);
			//echo $serhkisa;
			echo "<div style='font-size:14px; font-family:Noto Sans; border-style:dotted; margin:5px; padding:5px; border-width:1px;'> $daire <br> $esasno <br> $kararno <br><br><i><u><b>İçtihat Özeti :</i></u></b> $ozet<br><br><a href='serhgoster.php?id=$id'>Devamı...</a></div>";		
		}
		echo "<div class='kutu'><a href='index.php'>Anasayfa</a></div>";
	 ?>
	 
</body>
</html>