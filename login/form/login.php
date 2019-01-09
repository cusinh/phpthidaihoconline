<?php include('../includes/login_check.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>

	<div class="header">
		<h2>Đăng nhập</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('../includes/errors.php'); ?>

		<div class="input-group">
			<label>Tài khoản</label>
			<input type="text" name="user" placeholder="Nhập tài khoản từ 6 - 24 kí tự" 
            value="<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user'];?>">
		</div>
		<div class="input-group">
			<label>Mật khẩu</label>
			<input type="password" name="pwd" placeholder="Nhập tài khoản từ 6 - 32 kí tự" 
            value="<?php if(isset($_COOKIE['pwd'])) echo $_COOKIE['pwd'];?>" />
		</div>
        <div>
			<input type="checkbox" name="checkbox" 
			<?php if(isset($_COOKIE['user'])){ echo "checked"; }?> /> Lưu mật khẩu
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Đăng nhập</button>
		</div>
		<p>
			Bạn chưa có tài khoản ? <a href="register.php">Đăng kí</a>
		</p>
        <p>
			<a href="forgot_pwd.php">Quên mật khẩu ?</a>
		</p>
	</form>

</body>
</html>