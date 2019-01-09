<?php session_start();
$taikhoan=$_SESSION['taikhoan'];
include"../conn/connect.php";
$da=$_POST['dapanloi'];
$md=$_POST['madeloi'];
$yk=$_POST['ykien'];
$chuoi=$da."-".$md."-".$yk;
$nhap_nd=mysqli_query($conn,"insert into nd_tinnhan(id_sp,nd_tinnhan,nd_phan_hoi) 
value('','$chuoi','Cảm ơn bạn đã báo lỗi chúng tôi sẽ xem xét lại đề thi')");
?>
