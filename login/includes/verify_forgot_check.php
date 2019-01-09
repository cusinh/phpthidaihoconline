<?php
session_start();
$errors = array(); 
$_SESSION['success'] = "";
$email = $_SESSION["email"];
include ('conn.php');
	if (isset($_POST['verify_forgot'])) 
	{
		$token = mysqli_real_escape_string($conn,$_POST['token']);
		if(empty($token))
		{
			array_push($errors, "Vui lòng nhập mã xác nhận");
		}
		elseif(!preg_match("/^[A-Za-z0-9\.]{6,9}$/",$token))
		{
			array_push($errors, "Mã xác nhận không hợp lệ");
		}
		else
		{
			if(count($errors) == 0)
			{
				$sql= "SELECT * FROM `nguoidung` WHERE email='$email'";
				$result = mysqli_query($conn,$sql) or die ("Không thể thực hiện câu lệnh truy vấn");
				$row = mysqli_fetch_array($result);
				$hashedTokenCheck = password_verify($token,$row['token']);
				if($hashedTokenCheck == false)
				{
					array_push($errors, "Mã xác nhận không chính xác");
				}
				elseif($hashedTokenCheck == true)
				{
					$_SESSION["token"] = $row['token'];
					header("location: ../form/changer_forgot.php");
				}	
			}
		}
	}
	?>