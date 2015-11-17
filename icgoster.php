<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>İçtihat Göster</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ozel.css" />
</head>
<body>
<?php include('menu.php'); ?>
<div style="border-style:solid; border-color:gray; border-width:1px; margin:15px; padding:5px;">
	<table class="table table-striped">
		<tr>
			<td width="150"><b>Daire</b></td>
			<td width="100"><b>Esas No</b></td>
			<td width="100"><b>Karar No</b></td>
			<td width="700"><b>Özet</b></td>
			<td>İlgili Kanun</td>
		</tr>
		
		<?php 
			$serhler = mysqli_query($baglan, "select * from serh order by id desc");
			$say = mysqli_num_rows($serhler);
			echo "<p style='text-align:center;'>Toplam <b>$say</b> adet içtihat bulunmaktadır.</p>";
			while ($serhlistesi = mysqli_fetch_array($serhler)) {
				extract($serhlistesi);
				echo "<tr>
				<td><a href='serhgoster.php?id=$id'>$daire</a></td>
				<td>$esasno</td>
				<td>$kararno</td>
				<td>$ozet</td>
				<td><a target='_blank' href='ilgilimadde.php?id=$ilgili'>$ilgili</a></td>
				</tr>";
			}

		 ?>
			
	</table>
</div>	
</body>
</html>