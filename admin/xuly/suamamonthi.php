<?php
	if (isset($_GET['mamonthi'])) {
		
?>

<?php
	if(isset($_POST['submit'])){
	include"../../conn/connect.php";
	$mamon=$_POST['mamon'];
	$monthi=$_POST['monthi'];
	$mamonthi=$_GET['mamonthi'];
	$update=mysqli_query($conn,"update monthi set mamonthi='$mamon',tenmonthi='$monthi' where mamonthi='$mamonthi'");
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
				Mã Môn Thi
			</td>
			<td>
				<input name="mamon" type="text">
			</td>
		</tr>
		<tr>
			<td>
				Môn Thi
			</td>
			<td>
				<input name="monthi" type="text">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input name="submit" type="submit" value="Cập Nhập">
			</td>
		</tr>
	</table>
</form>