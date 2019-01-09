<?php include('../includes/register_check.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng kí</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../../js/jquery-3.2.1.min.js"></script>
    	<script>
		$(document).ready(function(){
			$("#uname").blur(function(){
				var u = $(this).val();
				$.get("ajax_check.php",{un:u},function(data){
					if(data==1){
						$("#nhacloi").html("Tài khoản này đã tồn tại !!!");
						$("#nhacloi").css("color","red");
						}else{
							$("#nhacloi").html("Bạn có thể dùng tài khoản này !!!");
							$("#nhacloi").css("color","blue");
							}
					});
				});
			});
    </script>
    	<script>
		$(document).ready(function(){
			$("#email").blur(function(){
				var e = $(this).val();
				$.get("ajax_mail.php",{em:e},function(data){
					if(data==1){
						$("#nhacloiemail").html("Email này đã tồn tại !!!");
						$("#nhacloiemail").css("color","red");
						}else{
							$("#nhacloiemail").html("Bạn có thể dùng email này !!!");
							$("#nhacloiemail").css("color","blue");
							}
					});
				});
			});
    </script>
</head>
<body>
	<div class="header">
		<h2>Đăng kí</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('../includes/errors.php'); ?>
		<div class="input-group">
			<label>Họ và tên</label>
			<input type="text" name="user_name" placeholder="Nhập họ và tên từ 6 - 40 kí tự">
		</div>
		<div class="input-group">
			<label>Tài khoản</label>
			<input type="text" name="user" id="uname" placeholder="Nhập tài khoản từ 6 - 24 kí tự">
            <div id="nhacloi" style="padding:3px;"></div>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" id="email" placeholder="vidu@gmail.com">
             <div id="nhacloiemail" style="padding:3px;"></div>
		</div>
		<div class="input-group">
			<label>Mật khẩu</label>
			<input type="password" name="pwd" placeholder="Nhập mật khẩu từ 6 - 21 kí tự">
		</div>
		<div class="input-group">
			<label>Xác nhận mật khẩu</label>
			<input type="password" name="re_pwd" placeholder="Xác nhận lại mật khẩu">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Đăng kí</button>
		</div>
		<p>
			Bạn đã là thành viên ? <a href="login.php">Đăng nhập</a>
		</p>
	</form>
</body>
</html>