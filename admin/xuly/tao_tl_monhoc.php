<form method="post">
<div><h1>Tạo tài liệu môn học</h1></div>
<table>
  <tr>
    <td>Mã môn</td>
    <td><input type="text" name="mamon" placeholder="Nhập mã môn"/></td>
  </tr>
  <tr>
    <td>Tên môn</td>
    <td><input type="text" name="tenmon" placeholder="Nhập tên môn"/></td>
  </tr>
    <tr>
    <td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Tạo"/></td>
  </tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){
	$mamon=$_POST['mamon'];
	$tenmon=$_POST['tenmon'];
	$tao=mysqli_query($conn,"insert into monhoc(mamon,tenmon) value ('$mamon','$tenmon')");
	}
?>
