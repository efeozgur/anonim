<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<table class="table table-striped">
	<?php 
	include('baglan.php');



	$kanunlardan = mysqli_query($baglan, "select * from kanunlar");
			echo "<tr>
			<td><b>Kanun Adı </b></td>
			<td><b>Kanun Madde Sayısı</b> </td>
			<td><b>Tamamlanan Madde Sayısı</b> </td>
			<td><b>Tamamlanma Oranı</b></td>
		</tr>
		";
	while ($kanunlar = mysqli_fetch_array($kanunlardan)) {
		extract($kanunlar);
		$kanundan = mysqli_query($baglan, "select * from kanun where kanunadi = '$kanunadi'");
		$saybakim = mysqli_num_rows($kanundan);

		echo "<tr>
				<td><a href='kanungoster.php?kanun=$kanunadi&no=$kanunno'>$kanunadi</a></td>
				<td>$maddesayisi</td>
				<td>$saybakim </td>
				<td>%". @$oran = round($saybakim/$maddesayisi*100,2)."</td>
		</tr>";
	}
 ?>
</table>

</body>
</html>
