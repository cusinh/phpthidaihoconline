<?php
// lấy lại bài làm sau 7 ngày vs đk bài làm đó dưới 50 điểm
	$kt_bt=mysqli_query($conn,"select * from bailam where taikhoan='$_SESSION[taikhoan]' and sodiem<'50'");
	while($arr_kt=mysqli_fetch_array($kt_bt)){
	if($arr_kt['tg_nop_bai'] < time()){
	$xoa_bl=mysqli_query($conn,"delete from bailam where taikhoan='$_SESSION[taikhoan]' and madethi='$arr_kt[madethi]'");
	$xoa_kt=mysqli_query($conn,"delete from tra_d_an where taikhoan='$_SESSION[taikhoan]' and madethi='$arr_kt[madethi]'");
		}
	}
?>