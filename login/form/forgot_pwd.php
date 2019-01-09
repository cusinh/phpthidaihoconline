<?php include('../includes/forgot_pwd_check.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quên mật khẩu</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<div class="header">
		<h2>Quên mật khẩu</h2>
	</div>
	
	<form method="post" >

		<?php include('../includes/errors.php'); ?>
		<div class="input-group">
			<label>Nhập tài khoản</label>
			<input type="text" name="user" placeholder="Vui lòng nhập tài khoản từ 6 -24 kí tự">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="forgot_pwd1">Lấy lại mật khẩu</button>
		</div>
		<p> 
			Mã xác nhận sẽ được gửi tới Email trong vòng 3-5p 
		</p>
	</form>
</body>
</html>