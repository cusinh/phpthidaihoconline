<?php
	if (isset($_GET['macauhoi'])) {
	 	
?>

<?php
	if(isset($_POST['submit']))
	{
	$macauhoi=$_GET['macauhoi'];
	$nhapnoidung=$_POST['nhapnoidung'];
	$upload=$_POST['upload'];
	$dapan=$_POST['dapan'];
	include"../../conn/connect.php";
	$lenh=mysqli_query($conn,"update cauhoi set noidung='$nhapnoidung',hinhanh='$upload', dapan='$dapan' where macauhoi='$macauhoi'");
	header('Location:../../admin/index.php?tt=dethi&trang=1');
	}
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<?php } ?>


<form action="" method="POST">
	<table align="center">
		<tr>
			<td colspan="2" align="center">
				Sửa Nội Dung Thi
			</td>
		</tr>
		<tr>
			<td>
				Nội Dung
			</td>
			<td>
				<textarea name="nhapnoidung" id="hien1"></textarea>
			</td>
			<script>
    CKEDITOR.replace( 'hien1');
	</script>
		</tr>
		<tr>
    <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chọn hình ảnh(nếu có)</td>
    <td><i class="fa fa-link" aria-hidden="true"></i> <input type="file" name="upload" /></td>
  </tr>
	<tr>
    <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập đáp án</td>
    <td>
        <select name="dapan">
            <option value="a">Câu A</option>
            <option value="b">Câu B</option>
            <option value="c">Câu C</option>
            <option value="d">Câu D</option>
        </select>
    </td>
  </tr>
  <tr>
	<td colspan="2" align="right"> <input name="submit" value="Cập Nhập" type="submit"></td>
  </tr>
	</table>
</form>