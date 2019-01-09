<?php
	include"../../conn/connect.php";
	$xoamamonhoc=$_GET['xoamamonhoc'];
	$lenh="delete from monhoc where mamon='$xoamamonhoc'";
	$kq=mysqli_query($conn,$lenh);
	header('Location:../../admin/index.php?tt=tailieu&trang=1');
?>