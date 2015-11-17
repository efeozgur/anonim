<?php include('baglan.php');
	include('fonk.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Kanun-Şerh</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/ozel.css" />
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>

<div style="text-align:right; list-style:none;" class="col-md-12">
	<?php include('menu.php'); ?>
</div>
<div class="col-md-12">
<form action="" method="POST">
	<p><input name="veri" type="text" /></p>
	<input type="radio" name="ara" value="daireara">Daire Ara
	<input type="radio" name="ara" value="maddeara">Madde Metni Ara
	<input type="radio" name="ara" value="maddeyiara">Madde Ara
	<input type="radio" name="ara" value="kelimeara" checked="checked">Kelime Ara
	<input type="radio" name="ara" value="esasagoreara">Esasa Göre Ara
	<input type="radio" name="ara" value="kararagoreara">Karara Göre Ara
	<p><input type="submit" value="Ara" /></p>
</form>	
</div>
<div class="col-md-3">
	<div class="kutum">
		<h3 style="text-align:center">İstatistikler</h3>
		<table class="table table-striped">
		<?php 
			$kanunst1 = mysqli_query($baglan, "select * from kanunlar");
			$kanunst = mysqli_num_rows($kanunst1);
			$maddest1 = mysqli_query($baglan, "select * from kanun");
			$maddest = mysqli_num_rows($maddest1);
			$serhst1 = mysqli_query($baglan, "select * from serh");
			$serhst = mysqli_num_rows($serhst1);

			$serhliste1 = mysqli_query($baglan, "select * from serh");
			while ($serhlistesi = mysqli_fetch_array($serhliste1)) {
				extract($serhlistesi);
			}
		?>
			<tr>
				<td>Kanun Sayısı</td>
				<td><?php echo $kanunst; ?></td>
			</tr>
			<tr>
				<td>Madde Sayısı</td>
				<td><?php echo $maddest; ?></td>
			</tr>	
			<tr>
				<td>İçtihat Sayısı</td>
				<td><?php echo "<a href='icgoster.php'> $serhst </a>"; ?></td>
			</tr>			
		</table>
	</div>
	<div class="kutum">
		<h3 style="text-align:center">Son Eklenen 5 Madde</h3>
		<?php 
			$sonmaddeler = mysqli_query($baglan, "select * from kanun order by id desc limit 0,5");
			while ($son5madde = mysqli_fetch_array($sonmaddeler)) {
				extract($son5madde);
				$temizmadde = substr(strip_tags($madde),0,200);
				echo "<p><a title='$temizmadde ...devamı için tıklayın' href='tekanungoster.php?ilgili=$ilgiliserh'> $ilgiliserh </a>|<span><a href='icekle.php?ilgili=$ilgiliserh'> Şerh Ekle</a></span> </p>";
				//echo "<p><a href='kanungoster.php#51'> $ilgiliserh </a> </p>";
			}
		 ?>
	</div>
	<div class="kutum">
		<h3 style="text-align:center">Son Eklenen 5 Bilgi</h3>
		<table class="table table-striped">
		<?php 
			$bilgigetir = mysqli_query($baglan, "select * from bilgitbl order by id desc limit 0,5");
			while ($bilgi = mysqli_fetch_array($bilgigetir)) {
				extract($bilgi);
				echo "<tr><td><a href='bilgigoster.php?ilgili=$bilgibaslik'>$bilgibaslik</a></td></tr>"; 
			}
		 ?>
		</table>
	</div>
</div>




<div class="col-md-5">
<?php 
	if (!$_POST) {
 ?>
	<?php include('stat.php'); ?>
	
	<?php } else {?>
	<div class="kutum">
	<h3 style="text-align:center;">Arama Sonuçları</h3>
		<?php 
			if ($_POST) {
				$degisken = $_POST['ara'];
				switch ($degisken) {
					case 'daireara':
						$gelenveri = $_POST['veri'];
						$ictihatarabakim = mysqli_query($baglan, "select * from serh where daire like '$gelenveri%'");
						$say = mysqli_num_rows($ictihatarabakim);
						if ($say == '0') {
							echo "<p style='text-align:center;'>Kayıt bulunamadı!</p><br>";
						} else {echo "<p style='text-align:center;'>$say daire bulundu.</p><br>";}
						
						while ($ictihatara = mysqli_fetch_array($ictihatarabakim)) {
							extract($ictihatara);
							$temizozet = strip_tags($ozet);
							echo "<a title='$temizozet' href='serhgoster.php?id=$id'>$daire - $esasno - $kararno</a> <br>";
						}
						break;
					case 'maddeara':
						echo "<ul>";
						$gelenveri = $_POST['veri'];
						$maddearabakim = mysqli_query($baglan, "select * from kanun where madde like '%$gelenveri%'");
						$say = mysqli_num_rows($maddearabakim);
						if ($say =='0') {
							echo "<p style='text-align:center;'>Kayıt bulunamadı.</p><br>";
						} else {echo "<p style='text-align:center;'>$say madde metni bulundu.</p><br>";}
						
						while ($maddeara = mysqli_fetch_array($maddearabakim)) {
							extract($maddeara);
							$temizmadde = substr(strip_tags($madde),0,300);
							echo "<li> <a title='$temizmadde ...devamı için tıklayın' href='tekanungoster.php?ilgili=$ilgiliserh'> $kanunadi - $maddeno </a></li>";
						}
						echo "</ul>";
					break;


					case 'maddeyiara':
						echo "<ul>";
						$gelenveri = $_POST['veri'];
						$maddeyiarabakim = mysqli_query($baglan, "select * from kanun where maddeno like '$gelenveri'");
						$say = mysqli_num_rows($maddeyiarabakim);
						if ($say =='0') {
							echo "<p style='text-align:center;'>Kayıt bulunamadı.</p><br>";
						} else {echo "<p style='text-align:center;'>$say madde bulundu.</p><br>";}
						
						while ($maddeyiara = mysqli_fetch_array($maddeyiarabakim)) {
							extract($maddeyiara);
							$temizmadde = substr(strip_tags($madde),0,300);
							echo "<li> <a title='$temizmadde ...devamı için tıklayın' href='tekanungoster.php?ilgili=$ilgiliserh'> $kanunadi - $maddeno </a></li>";
						}
						echo "</ul>";
						break;


					case 'kelimeara':
						echo "<ul>";
						$gelenveri = $_POST['veri'];
						$kelimearabakim = mysqli_query($baglan, "select * from serh where serh like '%$gelenveri%' || ozet like '%$gelenveri%'");
						$say = mysqli_num_rows($kelimearabakim);
						if ($say =='0') {
							echo "<p style='text-align:center;'>Kayıt bulunamadı.</p><br>";
						} else {echo "<p style='text-align:center;'>$say serh bulundu.</p><br>";}
						
						while ($kelimeara = mysqli_fetch_array($kelimearabakim)) {
							extract($kelimeara);
							$temizozet = substr(strip_tags($ozet),0,300);
							echo "<li> <a title='$temizozet ...devamı için tıklayın' href='serhgoster.php?id=$id&aranan=$gelenveri'> $daire - $esasno - $kararno </a></li>";

						}
						echo "</ul>";
						break;
					default:
						# code...
						break;
				}
			}
		 ?>
	</div>
	<?php }; ?>
</div>
<div class="col-md-4">
	<div class="kutum">
		<h3 style="text-align:center">Son <kbd>5</kbd> İçtihat</h3>
		<?php 
			$son10 = mysqli_query($baglan, "select * from serh order by id desc limit 0,5");
			while ($son10getir = mysqli_fetch_array($son10)) {
				extract($son10getir);
				echo "<p style='background-color:#FFFFAA'>$daire - $esasno - $kararno</p>";
				echo "<p style='font-size:12px;'>" . substr(strip_tags($ozet),0,200) . "... <a href='serhgoster.php?id=$id'>[Devamı]</a></p>";
			}
		 ?>
	</div>
</div>

</body>
</html>