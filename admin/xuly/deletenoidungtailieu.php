<?php
	include"../../conn/connect.php";
	$xoa=$_GET['xoa'];
	$lenh="delete from tailieu where id='$xoa'";
	$kq=mysqli_query($conn,$lenh);
	header('Location:../../admin/index.php?tt=nd_tailieu&trang=1');
?>