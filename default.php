<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Ayrıntılı Kanun Şerhleri</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
</head>
<body style="background-color: #272822;" >
<?php include('dmenu.php'); ?>
	<div class="col-md-3">
		<div class="beyazkutu">
		<form action="" method="POST">
			<p align="center">Ara</p> <input name="veri" type="text" />
			<div class="karakutu">				
					<p><input type="radio" name="ara" value="daireara">Daire Ara</p>
					<p><input type="radio" name="ara" value="kanunara">Kanun Ara</p>
					<p><input type="radio" name="ara" value="kmdara">Kanun Maddesi Ara</p>
					<p><input type="radio" name="ara" value="kmdmtnara">Kanun Madde Metni Ara</p>
					<p><input type="radio" name="ara" value="ictihatara" checked="checked">İçtihat Ara</p>
					<p><input type="radio" name="ara" value="eictihatara">İçtihat Ara (Esasa Göre)</p>
					<p><input type="radio" name="ara" value="kictihatara">İçtihat Ara (Karara Göre)</p>
					<p><input type="submit" value="Ara" /></p>
				</form>
			</div>
		</div>
		<?php 
			if (!empty($_POST)) {
			echo "<div class='beyazkutu'>";		
					$degisken = $_POST['ara'];
					switch ($degisken) {
						case 'daireara':
							echo "<table class='table table-striped'>";
							echo "<h3>Arama Sonuçları</h3>";
							$gelenveri = $_POST['veri'];
							$daireara = mysqli_query($baglan, "select * from serh where daire like '$gelenveri%'");
							while ($dgetir = mysqli_fetch_array($daireara)) {
								extract($dgetir);
								$temizozet = strip_tags($ozet);
								echo "<tr><td><a title='$temizozet' href='serhgoster.php?id=$id'>$daire - $esasno - $kararno</a></td></tr>";
							}
							echo "</table>";
							break;
						
						default:
							# code...
							break;
					}
			echo "</div>";
			}
		 ?>

	</div>
	<div class="col-md-6">
		<div class="beyazkutu">
			<?php include('dstat.php'); ?>		
		</div>
		<div class="beyazkutu">
			<?php include('dsnctht.php'); ?>
		</div>		
	</div>
	<div class="col-md-3">
		<div class="beyazkutu">
			<?php include('dgenelstat.php'); ?>
		</div>
		<div class="beyazkutu">
			<?php include('dsnbsmd.php'); ?>			
		</div>
		<div class="beyazkutu">
			<?php include('dsnbsblg.php'); ?>
		</div>
	</div>
</body>
</html>