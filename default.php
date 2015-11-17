<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Ayrıntılı Kanun Şerhleri</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
</head>
<body>
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
				echo "<a href=''>Kanun Ekle</a> | <a href=''>Daire Ekle</a> | <a href=''> İçtihat Ekle </a>";
			} 
		?>
		</div>
	</div>
</div>
	<div class="col-md-3">
		<div class="beyazkutu">
			<?php include('dara.php'); ?>
		</div>
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
	</div>
</body>
</html>