<?php
	if(isset($_GET['username']))
	{
	$username=$_GET['username'];
	include"../../conn/connect.php";
	$lenh1=mysqli_query($conn,"delete from bailam where taikhoan='$username'");
	$lenh="delete from nguoidung where taikhoan='$username'";
	$ketqua=mysqli_query($conn,$lenh);
	header('Location:../../admin/index.php?tt=user&trang=1');
	mysqli_close();
	}
	else
	{
		header('Location:../../admin/index.php?tt=user&trang=1');
	}
?>