<?php include('baglan.php'); 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Kanun Göster</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="col-md-10">
		<?php 
		include('menu.php');
		$kanungelen = $_GET['kanun'];
		$kanunno = $_GET['no'];
		echo "<a name='bastaraf'><h3 style='text-align:center; font-family:Oswald;'>". $kanungelen ."</h3></a><br><center><a href='kekle.php?kanun=$kanungelen&no=$kanunno'>Şerh Ekle</a></center><br>";
		//$adgetir = mysqli_query($baglan, "select * from kanun where kanunadi='$kanungelen'");
		//$adyaz = mysqli_fetch_array($adgetir);
		$getir = mysqli_query($baglan, "select * from kanun where kanunadi = '$kanungelen' order by maddeno asc");
		//$adgelsin = mysqli_fetch_array($getir);

		while($gel = mysqli_fetch_array($getir)){
			extract($gel);
			echo "<div style='font-family:Noto Sans; border-style:solid; border-width:1px; margin:5px; padding:3px; background-color:#FDF9EE; border-radius:5px;'><a href='tekanungoster.php?ilgili=$ilgiliserh' name='$maddeno'>Madde $maddeno</a>  $madde <br>";
			$serhgetir = mysqli_query($baglan, "select * from serh where ilgili = '$ilgiliserh'");
			$bilgigetir = mysqli_query($baglan, "select * from bilgitbl where bilgibaslik = '$ilgiliserh'");
			$kacbilgi = mysqli_num_rows($bilgigetir);
			$kactaneki = mysqli_num_rows($serhgetir);
			echo "<div style='text-align:center; background-color:#fff; color:white;padding:2px; font-size:12px; border-width:1px; border-color:gray;'><a href='goster.php?id=$ilgiliserh'>$kactaneki içtihat</a> | <a href='icekle.php?ilgili=$ilgiliserh'>İçtihat Ekle</a> | <a href='bilgigoster.php?ilgili=$bilgibaslik'>$kacbilgi Bilgi</a> | <a href='bilgiekle.php?ilgili=$ilgiliserh'>Bilgi Ekle</a></div></div>";
			
		}
		?>
</div>
<div class="col-md-2">
<div style='border-style:dotted; border-width:1px; padding:3px;'>
	<?php 
		$say = mysqli_query($baglan, "select * from kanun where kanunadi = '$kanungelen' order by maddeno asc");
		$kac = mysqli_num_rows($say);
		while ($saysay = mysqli_fetch_array($say)) {
			extract($saysay);
			echo "<a href='#$maddeno'>Madde - $maddeno</a><br>";
		}
	 ?>
</div>
</div>
</body>
</html>