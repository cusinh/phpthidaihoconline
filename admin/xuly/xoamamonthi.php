<?php
	include"../../conn/connect.php";
	$mamon=$_GET['mamonthi'];
	$lenh=mysqli_query($conn,"delete from monthi where mamonthi='$mamon'");
	echo "....";
	header('Location:../../admin/index.php?tt=monthi');
?>