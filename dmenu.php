<div class="row">
	<div class="col-md-12">
		<div class="beyazkutu saga"><a href="index.php">Anasayfa</a>
			<?php 
				@session_start();

				//$kullanici = $_SESSION['kullanici'];
				if (@$_SESSION['kullanici'] == 'admin') {
					echo $_SESSION['kullanici']." | <a href='exit.php'>Çıkış Yap</a><br>";
					echo "<a href='kanunekle.php'>Kanun Ekle</a> | <a href='dairekle.php'>Daire Ekle</a> | <a href='iekle.php'> İçtihat Ekle </a>";
				} else {
					echo "<br><a href='giris.php'>Giriş Yap</a> | <a href=''>Üye Ol</a>";
				}
			 ?>
		</div>
	</div>
</div>