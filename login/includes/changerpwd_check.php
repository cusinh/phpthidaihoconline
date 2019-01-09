<?php
session_start();
$errors = array(); 
$_SESSION['success'] = "";
// LOGIN USER
include ('conn.php');

if (isset($_POST['changerpwd'])) 
{
	$user = $_SESSION["taikhoan"];
	$old_pwd = mysqli_real_escape_string($conn,$_POST['old_pwd']);
	$new_pwd = mysqli_real_escape_string($conn,$_POST['new_pwd']);
	$renew_pwd = mysqli_real_escape_string($conn,$_POST['renew_pwd']);
	
	if(empty($_SESSION["taikhoan"])||empty($old_pwd) || empty($new_pwd) || empty($renew_pwd))
	{
		array_push($errors, "Vui lòng nhập đầy đủ thông tin");
	}
	else
	{
		$sql= "SELECT * FROM `nguoidung` WHERE taikhoan='$user'";
		$result = mysqli_query($conn,$sql);
		if($row=mysqli_fetch_assoc($result))
		{
			$hashedPwdCheck = password_verify($old_pwd,$row['matkhau']);
			if($hashedPwdCheck == false)
			{
				array_push($errors, "Mật khẩu cũ không chính xác");
			}
			elseif($hashedPwdCheck == true)
			{
				$hashednewPwd = password_hash($new_pwd,PASSWORD_DEFAULT);
				if($old_pwd == $new_pwd)
				{
					array_push($errors, "Mật khẩu mới phải khác mật khẩu cũ");
				}
				elseif($new_pwd != $renew_pwd)
				{						
					array_push($errors, "Xác nhận mật khẩu không chính xác");	
				}
				else
				{
					$sql="UPDATE `nguoidung` SET matkhau = '$hashednewPwd' WHERE taikhoan='$user'";
					mysqli_query($conn,$sql);
					session_destroy();
					setcookie('user',$user,time()-3600*24*30);
					setcookie('pwd',$pwd,time()-3600*24*30);
					setcookie('hoten',$row['hoten'],time()-3600*24*30);
					header("location: ../form/login.php");
					exit();
				}		
			}	
		}
	}
}
?>