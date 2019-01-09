<?php
	if(isset($_POST['submit'])){
	include"../../conn/connect.php";
	$mlop=$_POST['mlop'];
	$tlop=$_POST['tlop'];
	$malop=$_GET['malop'];
	$update=mysqli_query($conn,"update lop set malop='$mlop',tenlop='$tlop' where malop='$malop'");
	header('Location:../../admin/index.php?tt=lop&trang=1');
	
	}
	
?>

<form action="" method="post">
	<table>
		<tr>
			<td colspan="2" align="center">
				Sửa Lớp
			</td>
		</tr>
		<tr>
			<td>
				Mã Lớp
			</td>
			<td>
				<input name="mlop" type="text">
			</td>
		</tr>
		<tr>
			<td>
				Lớp
			</td>
			<td>
				<input name="tlop" type="text">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input name="submit" type="submit" value="Cập Nhập">
			</td>
		</tr>
	</table>
</form>