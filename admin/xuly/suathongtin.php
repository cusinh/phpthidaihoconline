
<?php
	if (isset($_GET['username'])) {
?>


<?php
	if(isset($_POST['submit'])){
	include"../../conn/connect.php";
	$username=$_GET['username'];
	//$tk=$_POST['tk'];
	$pw=$_POST['pw'];
	$name=$_POST['name'];
	$gioitinh=$_POST['email'];
		//$select="select * from nguoidung";
	$lenh=mysqli_query($conn,"update nguoidung set matkhau='$pw',hoten='$name',gioitinh='$gioitinh' where taikhoan='$username'");
	header('Location:../../admin/index.php?tt=user&trang=1');
	mysqli_close($conn);
	}
	
?>
<?php } ?>




<title> Sửa Thông Tin</title>
<form action="" method="post">
	<table align="center">
		<tr>
			<td colspan="2">
				Sửa Thông Tin Người Dùng
			</td>
		</tr>
		<tr>
			<td>
				Mật Khẩu
			</td>
			<td>
				<input name="pw" type="password" placeholder="Nhập mật khẩu mới">
			</td>
		</tr>
		<tr>
			<td>
				Họ Tên
			</td>
			<td>
				<input name="name" type="text" placeholder="Nhập họ tên cần sửa">
			</td>
		</tr>
		<tr>
			<td>
				Giới Tính
			</td>
			<td>
				<input name="gioitinh" type="radio" checked="checked" value="Nam" style="width: 20px; height:20px;">Nam
				<input name="gioitinh" type="radio" value="Nữ" style="width: 20px; height:20px;">Nữ
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"> <input name="submit" type="submit" value="Cập Nhập" ></td>
		</tr>
	</table>
</form>