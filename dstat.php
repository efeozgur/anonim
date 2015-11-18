			<table class="table table-hover">
				<?php 
				include('baglan.php');
						$kanunlardan = mysqli_query($baglan, "select * from kanunlar");
						echo "<tr>
						<td><b>Kanun Adı </b></td>
						<td><b>Kanun Madde Sayısı</b> </td>
						<td><b>Tamamlanan Madde Sayısı</b> </td>
						<td><b>Tamamlanma Oranı</b></td>
					</tr>
					";
				while ($kanunlar = mysqli_fetch_array($kanunlardan)) {
					extract($kanunlar);
					$kanundan = mysqli_query($baglan, "select * from kanun where kanunadi = '$kanunadi'");
					$saybakim = mysqli_num_rows($kanundan);

					echo "<tr>
							<td><a href='dkanungoster.php?kanun=$kanunadi&no=$kanunno'>$kanunadi</a></td>
							<td>$maddesayisi</td>
							<td>$saybakim </td>
							<td>%". @$oran = round($saybakim/$maddesayisi*100,2)."</td>
					</tr>";
				}
			 ?>
			</table>	