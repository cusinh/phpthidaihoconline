<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="javascript" type="text/javascript" src="../../admin/ckeditor/ckeditor.js"></script>
	<script language="javascript" type="text/javascript" src="admin/ckeditor/ckfinder/ckfinder.js"></script>
</head>
	<title> Sửa Câu Hỏi</title>

	<form action="" method="POST">	 
	 <table align="center" border="1">
		<tr>
			<td>Nhập nội dung </td>
			<td><textarea name="nhapnoidung" id="sinhbuu"></textarea></td>
			<script>
			CKEDITOR.replace( 'sinhbuu');
			</script>
		</tr>
		<tr>
			<td colspan="2">Nhập đáp án</td>
			<td colspan="2">
				<select name="dapan">
					<option value="a">Câu A</option>
					<option value="b">Câu B</option>
					<option value="c">Câu C</option>
					<option value="d">Câu D</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" border="25" align="right">
		<input name="submit" type="submit" value="Sửa">
			</td>
		</tr>
	</table>
	</form>
<?php
	if(isset($_POST['submit']))
	{
	$id=$_GET['id'];
	$nhapnoidung=$_POST['nhapnoidung'];
	$dapan=$_POST['dapan'];
	$connect=mysqli_connect("localhost","root","","a_thionline") or die("Không Thể Kết Nối CSDL");
	mysqli_query($connect,"set names'utf-8'");
	$update="update cauhoi	set noidung='$nhapnoidung',dapan='$dapan' where macauhoi='$id'";
	mysqli_query($connect,$update);
	header('Location:../../admin/index.php?id=xem_de_thi');
	//echo "Đã  Cập Nhập Thành Công";
	mysqli_close($connect);
	}
?>