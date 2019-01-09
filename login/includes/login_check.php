<?php
session_start();
$errors = array(); 
$_SESSION['success'] = "";
// LOGIN USER
include ('conn.php');

if (isset($_POST['login_user'])) 
{
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	if(isset($_POST['checkbox']))
	{
		$checkbox = $_POST['checkbox'];
	}
	
	if (empty($user)) 
	{
		array_push($errors, "Vui lòng nhập tài khoản");
	}
	else
	{
		if (empty($pwd)) 
		{
			array_push($errors, "Vui lòng nhập mật khẩu");
		}
		else
		{
			if (count($errors) == 0) 
			{
				$sql= "SELECT * FROM `nguoidung` WHERE taikhoan='$user' OR email='$user' ";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck < 1)
				{ 
					array_push($errors, "Tài khoản không tồn tại");
				}
				else
				{
					if ($row=mysqli_fetch_assoc($result)) 
					{	$row['matkhau'];
						$hashedPwdCheck = password_verify($pwd,$row['matkhau']);
						if($hashedPwdCheck == false)
						{
							array_push($errors, "Mật khẩu không chính xác");
						}
						else
						{
							if($hashedPwdCheck == true)
							{
								$_SESSION["hoten"] = $row['hoten'];
								$_SESSION["taikhoan"] = $row['taikhoan'];
								$_SESSION["email"] = $row['email'];
								$_SESSION['success'] = $success;
								if(isset($_POST['checkbox']))
								{
									setcookie('user',$user,time()+3600*24*30);
									setcookie('pwd',$pwd,time()+3600*24*30);
									setcookie('hoten',$row['hoten'],time()+3600*24*30);
								}
								if($row['quyen']==0){
	// check c_thoigian bài làm chống gian lận trong thi cử
		$lenh=mysqli_query($conn,"select * from check_tg where taikhoan='$_SESSION[taikhoan]'");
		$ar=mysqli_fetch_array($lenh);
		$dong=mysqli_num_rows($lenh);
		if($dong == 1){
		if($ar['c_thoigian'] < time()){
			$nhap=mysqli_query($conn,"insert into bailam(id,taikhoan,madethi,sodiem) 
			value('','$_SESSION[taikhoan]','$ar[c_madethi]','0')");
			$xoa=mysqli_query($conn,"delete from check_tg where taikhoan='$_SESSION[taikhoan]'");
			}else if($ar['c_thoigian'] > time()){
						$t=$ar['c_thoigian'];
						$thoigian=($t-time())/60;
						setcookie('thoigian2',$thoigian,$t,'/thionl');
						setcookie('mamonthi',$ar['c_mamonthi'],time()+8000,'/thionl');
				}
			}
							include"xuly_bl.php";// lấy lại bài làm sau 7 ngày vs đk bài làm đó dưới 50 điểm
							header("location:../../index.php");
								}
								else
								{
									header("location:../../admin/index.php");
								}
								exit();
							}
						}
					}			
				}
			}
		}
	}
}
?>
