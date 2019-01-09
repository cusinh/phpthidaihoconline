
<?php
	if(isset($_POST['submit'])){
	include"../../conn/connect.php";
	$tdchuong=$_POST['tdchuong'];
	$tdbai=$_POST['tdbai'];
	$nhapnoidung=$_POST['nhapnoidung'];
	$matailieu=$_GET['xem'];
	$update=mysqli_query($conn,"update tailieu set td_chuong='$tdchuong' td_bai='$tdbai' nd_bai='$nhapnoidung' where id='$matailieu'");
	header('Location:../../admin/index.php?tt=nd_tailieu&trang=1');
	}
?>

<form action="" method="POST">
	<table align="center">
		<tr>
			<td colspan="2" align>
				Sửa Nội Dung Tài Liệu
			</td>
		</tr>
		<tr>
			<td>
				Tiêu đề chương
			</td>
			<td>
				<input name="tdchuong" type="text">
			</td>
		</tr>
		<tr>
			<td>
				Tiêu đề bài
			</td>
			<td>
				<input type="text" name="tdbai">
			</td>
		</tr>
		<tr>
			<td>
				Nội Dung
			</td>
			<td>
				<textarea name="nhapnoidung" id="buupro"></textarea>
			</td>
			<script>
    CKEDITOR.replace( 'buupro');
	</script>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input name="submit" type="submit" value="Cập Nhập">
			</td>
		</tr>
	</table>
</form>