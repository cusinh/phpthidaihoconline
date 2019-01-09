<?php session_start();
include"../conn/connect.php";
$_GET['tb'];
if(isset($_GET['tb'])=='x'){
	$xoa_tn=mysqli_query($conn,"delete from tinnhan where taikhoan='$_SESSION[taikhoan]'");
	}
?>