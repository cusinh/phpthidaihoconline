<?php
session_start();
$errors = array(); 
$_SESSION['success'] = "";
$email = $_SESSION["email"];
$token = $_SESSION["token"];
include ('conn.php');

if (isset($_POST['changer_forgot'])) 
{
	$fpwd = mysqli_real_escape_string($conn,$_POST['fpwd']);
	$re_fpwd = mysqli_real_escape_string($conn,$_POST['re_fpwd']);
	
	if(empty($fpwd) || empty($re_fpwd))
	{
		array_push($errors, "Vui lòng nhập mật khẩu");
	}
	elseif(!preg_match("/^[A-Za-z0-9_\.]{6,32}$/",$fpwd))
	{
		array_push($errors, "Vui lòng nhập mật khẩu từ 6 đến 32 kí tự");
	}
	else
	{
		$hashedPwd = password_hash($fpwd,PASSWORD_DEFAULT);
						
		if($fpwd != $re_fpwd)
		{						
			array_push($errors, "Nhập lại mật khẩu không đúng");
		}
		else
		{
			$sql="UPDATE `nguoidung` SET `matkhau` = '$hashedPwd', `token` = '' WHERE `nguoidung`.`email` = '$email';";
			mysqli_query($conn,$sql) or die ("Không thể kết nối cơ sở dữ liệu");
			session_destroy();
			header("location: ../form/login.php");
			exit();
		}
	}
}
?>
