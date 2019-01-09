<?php include('../includes/verify_forgot_check.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nhập mã xác nhận</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<div class="header">
		<h2>Nhập mã xác nhận</h2>
	</div>
	
	<form method="post">

		<?php include('../includes/errors.php'); ?>
		<div class="input-group">
			<label>Nhập mã xác nhận</label>
			<input type="text" name="token" placeholder="Mã xác nhận gồm 9 kí tự">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="verify_forgot">Xác nhận</button>
		</div>
		<p>
			Vui lòng nhập mã xác nhận từ Email đăng kí ?
		</p>
	</form>
</body>
</html>
