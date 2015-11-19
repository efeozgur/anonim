<?php include('baglan.php');
include('fonk.php'); ?>
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
								echo "<tr><td><a title='$temizozet' href='dserhgoster.php?id=$id'>$daire - $esasno - $kararno</a></td></tr>";
							}
							echo "</table>";
							break;
						case 'kanunara':
							echo "<table class='table table-striped'>";
							echo "<h3>Arama Sonuçları</h3>";
							$gelenveri = $_POST['veri'];
							$kanunara = mysqli_query($baglan, "select * from kanunlar where kanunadi like '%$gelenveri%'");
							while ($dkanun = mysqli_fetch_array($kanunara)) {
								extract($dkanun);
								echo "<tr><td><a href='dkanungoster.php?kanun=$kanunadi'>$kanunadi</a></td></tr>";
							}
							echo "</table>";
							break;
						case 'kmdara':
							echo "<table class='table table-striped'>";
							echo "<h3>Arama Sonuçları</h3>";
							$gelenveri = $_POST['veri'];
							$kanunara = mysqli_query($baglan, "select * from kanun where maddeno like '$gelenveri'");
							while ($dkanun = mysqli_fetch_array($kanunara)) {
								extract($dkanun);
								$temizmadde = strip_tags($madde);
								echo "<tr><td><a title='$temizmadde' href='dkanungoster.php?kanun=$kanunadi'>$kanunadi - $maddeno. madde</a></td></tr>";
							}
							echo "</table>";
							break;
						case 'kmdmtnara':
							echo "<table class='table table-striped'>";
							echo "<h3>Arama Sonuçları</h3>";
							$gelenveri = $_POST['veri'];
							$kmdmtnara = mysqli_query($baglan, "select * from kanun where madde like '%$gelenveri%'");
							while ($dkmdmtnara = mysqli_fetch_array($kmdmtnara)) {
								extract($dkmdmtnara);
								$temizmadde = strip_tags($madde);
								echo "<tr><td><a title='$temizmadde' href='dtekkanungoster.php?ilgili=$ilgiliserh'>$kanunno - $ilgiliserh</a></td></tr>";
							}
							echo "</table>";
							break;
						case 'ictihatara':
							echo "<ul>";
							$gelenveri = $_POST['veri'];
							//$gelenveri =  cevir($gelenveri);
							$kelimearabakim = mysqli_query($baglan, "select * from serh where lower(serh) like '%$gelenveri%' or lower(ozet) like '%$gelenveri%'");
							$say = mysqli_num_rows($kelimearabakim);
							if ($say =='0') {
								echo "<p style='text-align:center;'>Kayıt bulunamadı.</p><br>";
							} else {echo "<p style='text-align:center;'>$say serh bulundu.</p><br>";}
							
							while ($kelimeara = mysqli_fetch_array($kelimearabakim)) {
								extract($kelimeara);
								$temizozet = substr(strip_tags($ozet),0,300);
								$temizozet = cevir($temizozet);
								echo "<li> <a title='$temizozet ...devamı için tıklayın' href='dserhgoster.php?id=$id&aranan=$gelenveri'> $daire - $esasno - $kararno </a></li>";

							}
							echo "</ul>";
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