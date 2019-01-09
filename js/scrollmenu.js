
<script type="text/javascript">
jQuery("document").ready(function($){

 var nav = $('.menu');

 $(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
   nav.addClass("fix");
  } else {
   nav.removeClass("fix");
  }
 });

});

</script>