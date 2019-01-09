<?php
	include"../../conn/connect.php";
	$macauhoi=$_GET['macauhoi'];
	$lenh=mysqli_query($conn,"delete from cauhoi where macauhoi='$macauhoi'");
	header('Location:../../admin/index.php?tt=dethi&trang=1');
?>