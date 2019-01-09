<?php session_start();
include"../conn/connect.php";
if(isset($_SESSION['taikhoan'])){
	$lenh12=mysqli_query($conn,"select id_sp from tinnhan where taikhoan='$_SESSION[taikhoan]'");
	$arr12=mysqli_fetch_array($lenh12);
	$lenh212=mysqli_query($conn,"select nd_phan_hoi from nd_tinnhan where id_sp='$arr12[id_sp]'");
	$arr_tb=mysqli_fetch_array($lenh212);
	echo $arr_tb['nd_phan_hoi'];

}
?>