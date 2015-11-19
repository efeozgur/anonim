<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>İçtihatları Listele</title>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
</head>
<body style="background-color: #272822;" >
<?php include('dmenu.php'); ?>
	<?php include('kaydir.php'); ?>

	<div style="margin:20px; border-radius:5px;" class="beyazkutu">
			<?php 
				$ilgili = $_GET['ilgili'];
				$getir = mysqli_query($baglan, "select * from serh where ilgili = '$ilgili'");
				$say = mysqli_num_rows($getir);
					while ($getirbakim = mysqli_fetch_array($getir)) {
					extract($getirbakim);
					if ($say == '1') {
						echo "<h3 style='text-align:center; color:#000' class='beyazkutu'>$daire</h3><hr>";
						echo "<p><b>Esas No :</b> $esasno</p>";
						echo "<p><b>Karar No : </b>$kararno</p>";
						echo "<p><b>İçtihat Özeti : </b>$ozet</p><hr>";
						echo "<p>$serh</p><hr>";		
					} else {
						echo "<h3 style='text-align:center; color:#000' class='beyazkutu'>$daire</h3><hr>";
						echo "<p><b>Esas No :</b> $esasno</p>";
						echo "<p><b>Karar No : </b>$kararno</p>";
						echo "<p><b>İçtihat Özeti : </b>$ozet</p>";
						echo "<p class='ictihat'><a href='dserhgoster.php?id=$id'>Devamını gör...</a></p><hr>";
					}		
				}
			 ?>
	</div>
</body>
</html>