		<h3 style="text-align:center">İstatistikler</h3>
		<table class="table table-striped">
		<?php 
			$kanunst1 = mysqli_query($baglan, "select * from kanunlar");
			$kanunst = mysqli_num_rows($kanunst1);
			$maddest1 = mysqli_query($baglan, "select * from kanun");
			$maddest = mysqli_num_rows($maddest1);
			$serhst1 = mysqli_query($baglan, "select * from serh");
			$serhst = mysqli_num_rows($serhst1);
			$bilgist1 = mysqli_query($baglan, "select * from bilgitbl");
			$bilgist = mysqli_num_rows($bilgist1);

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
			<tr>
				<td>Bilgi sayısı</td>
				<td><?php echo $bilgist;?></td>
			</tr>
		</table>