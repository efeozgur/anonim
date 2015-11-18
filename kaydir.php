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
<div id="yukari" style="display: block;">
    <a href="#ust">Sayfa Başına Git</a>
</div>