<?php 
	session_start();
	$_SESSION['kullanici'] = 'admin';
 ?>
<div class="row">
	<div class="col-md-12">
		<div class="beyazkutu saga"><a href="default.php">Anasayfa</a> | Hoşgeldin 
		<?php 
			echo $_SESSION['kullanici']."<br>";
			if ($_SESSION['kullanici'] == 'Misafir') {
				echo "<a href=''>Üye Ol</a>";
			} elseif ($_SESSION['kullanici'] =='admin') {
				echo "<a href='kanunekle.php'>Kanun Ekle</a> | <a href='dairekle.php'>Daire Ekle</a> | <a href='iekle.php'> İçtihat Ekle </a>";
			} 
		?>
		</div>
	</div>
</div>