<?php
session_start();
$errors = array(); 
$_SESSION['success'] = "";

//Hàm ramdom
function randomToken($length) 
{ 
	$chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	$i = 0; 
	$random = ""; 
	while ($i <= $length) { 
	$random .= $chars{mt_rand(0,strlen($chars))}; 
	$i++; 
} 
return $random; 
}  

include ('conn.php');
	if (isset($_POST['forgot_pwd1']) && isset($_POST['user'])) 
	{
		$user = mysqli_real_escape_string($conn,$_POST['user']);
		if(empty($user))
		{
			array_push($errors, "Vui lòng nhập tài khoản");
		}
		elseif(!preg_match("/^[A-Za-z0-9_\.]{6,24}$/",$user))
		{
			array_push($errors, "Vui lòng nhập tài khoản từ 6 đến 24 kí tự");
		}
		else
		{
			$sql= "SELECT * FROM nguoidung WHERE taikhoan='$user'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1)
			{ 
				array_push($errors, "Tài khoản không tồn tại");
			}
			else
			{
				$token=randomToken(8);
				$hashedtoken = password_hash($token,PASSWORD_DEFAULT);
				$sql=mysqli_query($conn,"UPDATE `nguoidung` SET token='$hashedtoken' WHERE taikhoan='$user'");
				
				$row=mysqli_fetch_assoc($result);
				$email=$row['email'];
				//goi thu vien
				include('../../mail/class.smtp.php');
				include "../../mail/class.phpmailer.php"; 
				include "../../mail/functions.php"; 
				$title = 'Đặt lại mật khẩu ZenkSchool';
				$content = ("<p style=font-size:16px; color:red;'><b>Xin chào: {$user}</b></p>,
							<p><b>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu ZenkSchool của bạn </b></p>
							<p>Mã xác nhận của bạn là : <b><i>{$token}</i></b><p>
							")
							;
				$nTo = $user;
				$mTo = $email;
				$diachi = $email;
				//test gui mail
				$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
				if($mail==1)
				{
					$_SESSION["token"] = $row['token'];
					$_SESSION["email"] = $row['email'];
					header("location:../form/verify_forgot.php");
					exit();	
				}
				else 
				{
					array_push($errors, "Gửi mail thất bại");
				}
			}
		}
	}
	

?>