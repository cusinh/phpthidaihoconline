<form method="post">
<div><h1>Tạo môn thi</h1></div>
<table>
  <tr>
    <td>Mã môn thi</td>
    <td><input type="text" name="mamonthi" placeholder="Nhập mã môn thi"/></td>
  </tr>
  <tr>
    <td>Tên môn thi</td>
    <td><input type="text" name="tenmonthi" placeholder="Nhập tên môn thi"/></td>
  </tr>
    <tr>
    <td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Tạo"/></td>
  </tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){
	$mamonthi=$_POST['mamonthi'];
	$tenmonthi=$_POST['tenmonthi'];
	$tao=mysqli_query($conn,"insert into monthi(mamonthi,tenmonthi) value ('$mamonthi','$tenmonthi')");
	}
?>
