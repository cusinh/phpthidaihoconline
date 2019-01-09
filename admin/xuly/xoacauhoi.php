<?php
	$id=$_GET['id'];
	$connect=mysqli_connect("localhost","root","","a_thionline") or die("Không Thể Kết Nói CSDL");
	mysqli_query($connect,"set names'utf-8'");
	$lenh="delete from cauhoi where macauhoi='$id'";
	$ketqua=mysqli_query($connect,$lenh) or die("Không Thể Thực Hiện");
	header('Location:../../admin/index.php?id=xem_de_thi');
?>