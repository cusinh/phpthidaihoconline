<?php
$conn=mysqli_connect("localhost","root","","a_thionline") or die ("không thể kn dtbs");
mysqli_set_charset($conn,'utf8');
$un=$_GET["un"];
$lenh=mysqli_query($conn,"select * from nguoidung where taikhoan='$un'");
$dong=mysqli_num_rows($lenh);
echo $dong;
?>