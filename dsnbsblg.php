		<h3 style="text-align:center">Son Eklenen <kbd>5</kbd> Bilgi</h3>
		<table class="table table-striped">
		<?php 
			$bilgigetir = mysqli_query($baglan, "select * from bilgitbl order by id desc limit 0,5");
			while ($bilgi = mysqli_fetch_array($bilgigetir)) {
				extract($bilgi);
				echo "<tr><td><a href='bilgigoster.php?ilgili=$bilgibaslik'>$bilgibaslik</a></td></tr>"; 
			}
		 ?>
		</table>