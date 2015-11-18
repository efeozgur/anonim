<?php include('baglan.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Ayrıntılı Kanun Şerh - <?php $kanun = $_GET['kanun']; echo $kanun; ?></title>
	<link rel="stylesheet" href="css/ozel.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<script>	
	$(document).ready(function() {
	    $("#yukari").hide();
	    $(function(){
	        $(window).scroll(function(){
	            if ($(this).scrollTop() > 100) {
	                $('#yukari').fadeIn();
	            } else {
	                $('#yukari').fadeOut();
	            }
	        });
	        $('#yukari a').click(function () {
	            $('body,html').animate({
	                scrollTop: 0
	            }, 800);
	            return false;
	        });
	    });
	});	
</script>

<body style="background-color: #272822;" >

<div id="yukari" style="display: block;">
    <a href="#ust">Sayfa Başına Git</a>
</div>

	<div style="margin:20px; border-radius:5px;" class="beyazkutu">
		<h3 style="text-align:center"><?php echo $kanun; ?></h3>
		<?php 
			$kanun = mysqli_query($baglan, "select * from kanun where kanunadi = '$kanun' order by maddeno asc");			
			while ($kanunyaz = mysqli_fetch_array($kanun)) {
				extract($kanunyaz);
				echo "<p><b><a href=''>Madde $maddeno </a></b> $madde</p>";	
				$ictihatigetir = mysqli_query($baglan, "select * from serh where ilgili = '$ilgiliserh'");
				$kacictihat = mysqli_num_rows($ictihatigetir);
				if ($kacictihat > '0') {
					echo "<p class='ictihat'><a href='goster.php?id=$ilgiliserh'>$kacictihat İçtihat</a></p><hr>";
				}
				
							
			}
						
							
		 ?>
	</div>




</body>
</html>