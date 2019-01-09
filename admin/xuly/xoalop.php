<?php
	include"../../conn/connect.php";
	$malop=$_GET['malop'];
	$lenh=mysqli_query($conn,"delete from lop where malop='$malop'");
	echo "....";
	header('Location:../../admin/index.php?tt=lop&trang=1');
?>