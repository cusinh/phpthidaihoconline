
<?php if(isset($_GET['mal']) && isset($_GET['mamon']))
	{
	?>

<?php
	if(isset($_POST['submit'])){
	include"../../conn/connect.php";
	$malop=$_POST['malop'];
	$mamonhoc=$_POST['mamonhoc'];
	$mal=$_GET['mal'];
	$mamon=$_GET['mamon'];
	$update=mysqli_query($conn,"update tailieu set malop='$malop',mamon='$mamonhoc' where malop='$mal' and mamon='$mamon'");
	header('Location:../../admin/index.php?tt=nd_tailieu&trang=1');
	}
?>
<?php } ?>
<form action="" method="post">
	<table>
		<tr>
			<td colspan="2" align="center">
				Sửa Mã Tài Liệu
			</td>
		</tr>
		<tr>
			<td>
				Mã Lớp
			</td>
			<td>
				<input name="malop" type="text">
			</td>
		</tr>
		<tr>
			<td>
				Mã Môn Học
			</td>
			<td>
				<input name="mamonhoc" type="text">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input name="submit" type="submit" value="Cập Nhập">
			</td>
		</tr>
	</table>
</form>