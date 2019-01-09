<form method="post">
<div><h1>Tạo tài liệu môn học</h1></div>
<table>
  <tr>
    <td>Mã lớp</td>
    <td><input type="text" name="malop" placeholder="Nhập mã lớp"/></td>
  </tr>
  <tr>
    <td>Tên lớp</td>
    <td><input type="text" name="tenlop" placeholder="Nhập tên lớp"/></td>
  </tr>
    <tr>
    <td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Tạo"/></td>
  </tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){
	$malop=$_POST['malop'];
	$tenlop=$_POST['tenlop'];
	$tao=mysqli_query($conn,"insert into monhoc(malop,tenlop) value ('$malop','$tenlop')");
	}
?>
