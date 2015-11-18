		<h3 style="text-align:center">Son <kbd>5</kbd> İçtihat</h3>
		<table class="table table-hover">
		<?php 
			$son10 = mysqli_query($baglan, "select * from serh order by id desc limit 0,5");
			while ($son10getir = mysqli_fetch_array($son10)) {
				extract($son10getir);
				echo "<tr><td><p><a href='dserhgoster.php?id=$id'>$daire - $esasno - $kararno</a></p>";
				echo "<p style='font-size:12px;'>" . substr(strip_tags($ozet),0,200) . "... <a href='serhgoster.php?id=$id'>[Devamı]</a></p></td></tr>";
			}
		 ?>
		 </table>