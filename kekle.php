<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Kanun Şerhi Ekle</title>
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php 
	$kanununadi = $_GET['kanun'];
	$kanununno = $_GET['no'];
 ?>
<?php include('menu.php'); ?>
<form action="" method="POST">
	<table class="table table-striped">
		<tr>
			<td>Kanun Adı</td>
			<td>
				<select name="kanunadi" id="">
					<?php echo "<option value='$kanununadi'>$kanununadi</option>"; ?>				
				</select>
			</td>
		</tr>
		<tr>
			<td>Kanun No</td>
			<td>
				<select name="kanunno" id="">
					<?php echo "<option value='$kanununno'>$kanununno</option>"; ?>
				</select>
			</td>
		</tr>		
		<tr>
			<td>Kanun Madde No</td>
			<td><input name="kanunmaddesi" type="text" /></td>
		</tr>		
		<tr>
			<td>Kanun Şerhi</td>
			<td><textarea name="kanunserhi" class="ckeditor" id="" cols="30" rows="10"></textarea></td>
		</tr>	
		<tr>
			<td>Anasayfa</td>
			<td><input type="submit" value="Ekle" /></td>
		</tr>			
	</table>
</form>

<?php 
	if ($_POST) {
		$kanunadi = $_POST['kanunadi'];
		$kanunno = $_POST['kanunno'];
		$kanunmaddesi = $_POST['kanunmaddesi'];
		$kanunserhi = $_POST['kanunserhi'];
		$ilgili = $kanunadi ." - ". $kanunmaddesi;
		if (!empty($kanunmaddesi) and (!empty($kanunserhi))) {
			$kaydet = mysqli_query($baglan, "insert into kanun (kanunadi, kanunno, maddeno, madde, ilgiliserh) values ('$kanunadi','$kanunno','$kanunmaddesi','$kanunserhi','$ilgili')");
				if ($kaydet) {
					echo "kayıt başarılı!!!!!";
				}
		} else {echo "Madde no ve madde boş olamaz!";}
		
	}
 ?>
</body>
</html>