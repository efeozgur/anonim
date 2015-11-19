<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Ayrıntılı Kanun Şerhleri - Şerh Göster</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body style="background-color: #272822;" >
<?php include('dmenu.php'); ?>
<?php include('kaydir.php'); ?>
	<?php 
	include('fonk.php');
		$serhno = $_GET['id'];
		$aranan = @$_GET['aranan'];
		$serhbul = mysqli_query($baglan, "select * from serh where id='$serhno'");
		$serh = mysqli_fetch_array($serhbul);
		
		extract($serh);
		echo "<h2 style='text-align:center; color:white'>$daire</h2>";
		echo "<h4 style='color:white; text-align:center'>$esasno Esas</h4>";
		echo "<h4 style='color:white; text-align:center'>$kararno Karar</h4>";
		echo "<div style='font-size:20px; border-style:solid; border-color:gray; border-radius:3px; border-width:1px; padding:5px; margin:25px; background-color:#FDF9EE; color:#000'>
			
			<b><i>İlgili Madde </b> : <a target='_blank' href='dtekkanungoster.php?ilgili=$ilgili'> $ilgili</a></i><br><br>";
			echo "<b>Özet : " . renklendir($ozet, $aranan, '#FDDA36') . "</p><br><br></b>";
			echo "<b>İçtihat Metni :</b>". renklendir($serh, $aranan , '#FDDA36');
			
		echo "</div>";
		?>
		
</body>
</html>