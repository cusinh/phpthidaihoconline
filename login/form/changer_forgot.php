<?php include('../includes/changer_forgot_check.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nhập mật khẩu mới</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<div class="header">
		<h2>Nhập mật khẩu mới</h2>
	</div>
	
	<form method="post">

		<?php include('../includes/errors.php'); ?>
		<div class="input-group">
			<label>Nhập mật khẩu mới</label>
			<input type="password" name="fpwd" placeholder="Nhập mật khẩu mới từ 6 - 32 kí tự">
		</div>
        <div class="input-group">
			<label>Xác nhận mật khẩu mới</label>
			<input type="password" name="re_fpwd" placeholder="Vui lòng xác nhận lại mật khẩu">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="changer_forgot">Xác nhận</button>
		</div>
	</form>
</body>
</html>