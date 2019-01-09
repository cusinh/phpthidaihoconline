<?php
if($_GET['madethi'])
{
?>

<?php
	if(isset($_POST['submit']))
	{
		include"../../conn/connect.php";
		$made=$_POST['made'];
		$thoigian=$_POST['thoigian'];
		$madethi=$_GET['madethi'];
		$lenh=mysqli_query($conn,"update bailam set madethi='$made' where madethi='$madethi'");
		$ketqua=mysqli_query($conn,"update dethi set madethi='$made' thoigian='$thoigian' where madethi='$madethi'");
		echo "Cập nhập thành công";
		header('Location:../../admin/index.php?tt=dethi&trang=1');
	}
?>
<?php } ?>
<form action="" method="post">
	<table align="center">
		<tr>
			<td colspan="2" align="center">
				Sửa Mã Đề Thi
			</td>
			
		</tr>
		<tr>
			<td>
				Nhập mã đề thi
			</td>
			<td>
				<input name="made" type="text" placeholder="Nhập mã đề thi cần thay đổi">
			</td>

		</tr>
		<tr>
			<td>
				Nhập thời gian
			</td>
			<td>
				<input name="thoigian" type="number" placeholder="Nhập thời gian">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input name="submit" type="submit" value="Cập Nhập">
			</td>
		</tr>
		
	</table>
</form>

