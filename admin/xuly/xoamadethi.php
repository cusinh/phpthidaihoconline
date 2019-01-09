<?php
	include"../../conn/connect.php";
	$xoa=$_GET['xoa'];
	$lenh="delete from dethi where madethi='$xoa'";
	$lenh1="delete from bailam where madethi='$xoa'";
	$ketqua=mysqli_query($conn,$lenh1);
	$kq=mysqli_query($conn,$lenh);
	header('Location:../../admin/index.php?tt=dethi&trang=1');
?>