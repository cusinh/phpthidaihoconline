<?php
	include"../../conn/connect.php";
	$malop=$_GET['mal'];
	$mamonhoc=$_GET['mamon'];
	$lenh="delete from tailieu where mamon='$mamonhoc' and malop='$malop'";
	$kq=mysqli_query($conn,$lenh);
	header('Location:../../admin/index.php?tt=nd_tailieu&trang=1');
?>