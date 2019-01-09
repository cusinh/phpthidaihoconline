<?php
	if(isset($_POST['submit']))
	{
	include"../conn/connect.php";
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$hashpwd = password_hash($password,PASSWORD_DEFAULT);
	$lenh=mysqli_query($conn,"select * from nguoidung where taikhoan='$username'");
	$row=mysqli_num_rows($lenh);
	if($row>0)
		{
			echo '<p align="center"><i>Tài khoản này đã tồn tại</i></p>';
		}
		else
		{
			$insert=mysqli_query($conn,"insert into nguoidung(taikhoan,matkhau,quyen,email,hoten) values('$username','$hashpwd',1,'$email','$name')");
			echo '<p align="center"><i>Tạo thành công</i></p>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Tạo Tài Khoản
	</title>
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr>
				<td colspan="2" align="center">
					Tạo Tài Khoản
				</td>
			</tr>
            <tr>
				<td>
					Họ và tên Admin
				</td>
				<td>
					<input type="text" name="name">
				</td>
			</tr>
            <tr>
				<td>
					Địa chỉ email
				</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					Tài Khoản
				</td>
				<td>
					<input type="text" name="username">
				</td>
			</tr>
			<tr>
				<td>
					Mật Khẩu
				</td>
				<td>
					<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="submit" value="Tạo">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>