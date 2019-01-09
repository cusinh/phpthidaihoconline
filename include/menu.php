<div class="menu">
 	<ul>	
    	<li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> </li>
		<li><a href="index.php?tailieu=toan"><i class="fa fa-calculator" aria-hidden="true"></i> Tài liệu toán</a>

        </li>
        <li><a href="index.php?tailieu=ly"><i class="fa fa-thermometer-empty" aria-hidden="true"></i> Tài liệu lý</a>

        </li>
        <li><a href="index.php?tailieu=hoa"><i class="fa fa-eyedropper" aria-hidden="true"></i> Tài liệu hóa</a>

        </li>
        <li><a href="index.php?tailieu=anh"><i class="fa fa-etsy" aria-hidden="true"></i> Tài liệu anh</a>

        </li>
        <li><a href="index.php?tailieu=sinh"><i class="fa fa-child" aria-hidden="true"></i> Tài liệu sinh</a>

        </li>
        <li><a href="index.php?tailieu=dia"><i class="fa fa-globe" aria-hidden="true"></i> Tài liệu địa</a>

        
        </li>
        <li><a href="index.php?tailieu=su"><i class="fa fa-book" aria-hidden="true"></i> Tài liệu sử</a>

        
        </li>
        <li><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
        	<ul>
        <li> <a href="index.php?hs=Hosocanhan"><i class="fa fa-address-book-o" aria-hidden="true"></i> Hồ Sơ</a></li>
        <li><a href="login/form/changerpwd.php"><i class="fa fa-question-circle" aria-hidden="true"></i> Đổi mật khẩu </a></li>
		<li><a href="index.php?ac=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Thoát</a></li>
            </ul>
        </li>
    </ul>
</div>
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