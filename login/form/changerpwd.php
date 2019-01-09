
<?php include('../includes/changerpwd_check.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đổi mật khẩu</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>

	<div class="header">
		<h2>Đổi mật khẩu</h2>
	</div>
	
	<form method="post" action="changerpwd.php">

		<?php include('../includes/errors.php'); ?>
		<div class="input-group">
			<label>Tài khoản</label>
			<input type="text" name="user" value=<?php if(isset($_SESSION["hoten"])){ echo $_SESSION["taikhoan"];}?> disabled >
		</div>
		<div class="input-group">
			<label>Mật khẩu cũ</label>
			<input type="password" name="old_pwd" placeholder="Nhập mật khẩu từ 6 - 32 kí tự">
		</div>
		<div class="input-group">
			<label>Mật khẩu mới</label>
			<input type="password" name="new_pwd" placeholder="Nhập mật khẩu mới từ 6 - 32 kí tự">
		</div>
        <div class="input-group">
			<label>Xác nhận mật khẩu mới</label>
			<input type="password" name="renew_pwd" placeholder="Xác nhận mật khẩu mới từ 6 - 32 kí tự">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="changerpwd">Đổi mật khẩu</button>
		</div>
		<p>
			Trở lại trang chủ ? <a href="../../index.php">Trang chủ</a>
		</p>
	</form>

</body>
</html>