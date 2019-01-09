<?php
	if(isset($_GET['mamonhoc']))
	{
?>
<?php
	if(isset($_POST['submit'])){
	include"../../conn/connect.php";
	$mamonhoc=$_POST['mamonhoc'];
	$monhoc=$_POST['monhoc'];
	$mamonhoc=$_GET['mamonhoc'];
	$update=mysqli_query($conn,"update monhoc set mamon='$mamonhoc',tenmon='$monhoc' where mamon='$mamonhoc'");
	header('Location:../../admin/index.php?tt=monthi');
	}
?>
<?php } ?>

<form action="" method="post">
	<table>
		<tr>
			<td colspan="2" align="center">
				Sửa Môn Thi
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
			<td>
				Tên Môn
			</td>
			<td>
				<input name="monhoc" type="text">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input name="submit" type="submit" value="Cập Nhập">
			</td>
		</tr>
	</table>
</form>