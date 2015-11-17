<?php include('baglan.php');
include('fonk.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Şerh Göster</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php 
	include('menu.php');
		$serhno = $_GET['id'];
		$aranan = @$_GET['aranan'];
		$serhbul = mysqli_query($baglan, "select * from serh where id='$serhno'");
		$serh = mysqli_fetch_array($serhbul);
		
		extract($serh);
		echo "<h2 style='text-align:center;'>$daire</h2>";
		echo "<div style='font-family:Noto Sans; font-size:20px; border-style:solid; border-color:gray; border-radius:3px; border-width:1px; padding:5px; margin:5px; background-color:#FDF9EE; color:#000'>
			<b>Esas No : $esasno<br></b>
			<b>Karar No : $kararno</b><br><br>
			<b><i>İlgili Madde </b> : <a target='_blank' href='tekanungoster.php?ilgili=$ilgili'> $ilgili</a></i><br><br>";
			echo "<b>Özet : " . renklendir($ozet, $aranan, '#FDDA36') . "</p><br><br></b>";
			echo "<b>İçtihat Metni :</b>". renklendir($serh, $aranan , '#FDDA36');
			
		echo "</div>";
		

	 ?>
</body>
</html>