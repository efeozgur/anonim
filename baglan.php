<?php 
	@$baglan = mysqli_connect('localhost', 'root','','yuksekma_x');
	mysqli_query($baglan, "set names 'utf8'");
	mysqli_query($baglan,"SET SESSION character_set_results = 'UTF8'");
    mysqli_query($baglan,"set SESSION character_set_client = 'UTF8'");
    mysqli_query($baglan,"set SESSION character_set_connection = 'UTF8'");
 ?>