<meta charset="utf-8">
<?php
session_start();

// định nghĩa biến
$errors = array(); 
$_SESSION['success'] = "";

// kết nối tới csdl
include ('conn.php');

// Form đăng kí
if (isset($_POST['reg_user'])) 
{
	// lấy dữ liệu
		$user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
		$user = mysqli_real_escape_string($conn,$_POST['user']);
		$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$re_pwd = mysqli_real_escape_string($conn,$_POST['re_pwd']);

	// check lỗi trống thông tin
	if (empty($user_name)) 
	{
		 array_push($errors, "Vui lòng nhập họ và tên"); 
	}
	else
	{
		if (empty($user)) 
		{
				  array_push($errors, "Vui lòng nhập tài khoản");  
		}
		else
		{
			if (empty($email)) 
			{ 
				array_push($errors, "Vui lòng nhập Email"); 
			}
			else
			{
				if (empty($pwd) || empty($re_pwd)) 
				{ 
					array_push($errors, "Vui lòng nhập mật khẩu"); 
				}
				// check lỗi kí tự đặc biệt
				else
					{
						if(!preg_match("/^[A-Za-z0-9_\.]{6,24}$/",$pwd))
						{
							array_push($errors, "Vui lòng nhập tài khoản từ 6 đến 24 kí tự");
						}
						else
						{
							if(!preg_match("/^[A-Za-z0-9_\.]{6,32}$/",$pwd))
								{
									array_push($errors, "Vui lòng nhập mật khẩu từ 6 đến 32 kí tự");
								}
							// check định dạng mail
							else
							{
								if(!filter_var($email, FILTER_VALIDATE_EMAIL))
								{
									array_push($errors, "Vui lòng nhập đúng định dạng Email");				
								}
								else
								{
									$sql= "select * from nguoidung where taikhoan='$user' or email='$email'";
									$result=mysqli_query($conn,$sql);
									$resultCheck=mysqli_num_rows($result);
									if($resultCheck > 0)
									{
										array_push($errors, "Tài khoản hoặc email của bạn đã tồn tại");
									}
									else
									{
										$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
						
										if($pwd != $re_pwd)
										{						
											array_push($errors, "Nhập lại mật khẩu không đúng");
										}
										else
										{
										//nhập dữ liệu vào database
											$sql="INSERT INTO nguoidung(hoten,taikhoan,matkhau,email) VALUES('$user_name', '$user', '$hashedPwd', '$email')";
											mysqli_query($conn,$sql);
											$_SESSION['user'] = $user;
											$_SESSION['success'] = "Đăng kí thành công";
											header('location:../form/login.php');
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}	


