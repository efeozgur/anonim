<?php 
function goToByScroll(id) {
  var op = jQuery.browser.opera ? jQuery("html") : jQuery("html, body");
  op.animate({ scrollTop: jQuery("#"+id).offset().top }, 'slow');
}
 ?>