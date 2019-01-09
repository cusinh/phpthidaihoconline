<?php
$conn=mysqli_connect("localhost","root","","a_thionline") or die ("không thể kn dtbs");
mysqli_set_charset($conn,'utf8');
$em=$_GET["em"];
$lenh=mysqli_query($conn,"select * from nguoidung where email='$em'");
$dong=mysqli_num_rows($lenh);
echo $dong;
?>