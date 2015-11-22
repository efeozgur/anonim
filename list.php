<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Şerh Listele</title>
	<link rel="stylesheet" href="css/ozel.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<?php 
	include('dmenu.php');
	$sayfa =@$_GET['sahife'];
	$kayitsayisi = mysqli_num_rows(mysqli_query($baglan, "select * from serh"));
	if (empty($sayfa) || !is_numeric($sayfa)) {
		$sayfa = 1;
	}
	$kacar = 25;
	$kayitsayisi = mysqli_num_rows(mysqli_query($baglan, "select * from serh"));
	$sayfasayisi = ceil($kayitsayisi/$kacar);
	$nereden = ($sayfa*$kacar)-$kacar;
	
	$kayitgetir = mysqli_query($baglan, "select * from serh order by id desc limit $nereden, $kacar");
	echo "<table class='table table-striped'>";
	echo "<tr>
		<td><b>Daire</b></td>
		<td><b>Esas No</b></td>
		<td><b>Karar No</b></td>
		<td><b>Şerh</b></td>

	</tr>";
	while ($kayit = mysqli_fetch_array($kayitgetir)) {
		extract($kayit);
		$temizvekisa = strip_tags(substr($serh,0,300));
		echo "<tr>
			<td><a href='dserhgoster.php?id=$id'>$daire</a></td>
			<td>$esasno</td>
			<td>$kararno</td>
			<td>$temizvekisa...</td>
		</tr>";
	}
	echo "<center>";
	echo "Sayfa No : ";
	for ($i=1; $i < $sayfasayisi; $i++) { 
		echo "<a style='margin:5px; text-align:center;border-radius:5px; border-width:1px; border-style:solid;display:inline-block; padding:5px;' href='list.php?sahife=$i'>$i</a>";
	}	
	echo "</center>";
 ?>
</body>
</html>