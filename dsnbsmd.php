		<h3 style="text-align:center">Son Eklenen <kbd>5</kbd> Madde</h3>
		<?php 
			$sonmaddeler = mysqli_query($baglan, "select * from kanun order by id desc limit 0,5");
			echo "<table class='table table-hover'>";
			while ($son5madde = mysqli_fetch_array($sonmaddeler)) {
				extract($son5madde);
				$temizmadde = substr(strip_tags($madde),0,200);   
				echo "<tr><td><a title='$temizmadde ...devamı için tıklayın' href='dtekkanungoster.php?ilgili=$ilgiliserh'> $ilgiliserh </a> </td></tr>";
				//echo "<p><a href='kanungoster.php#51'> $ilgiliserh </a> </p>";
			}
			echo "</table>";
		 ?>