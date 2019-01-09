<?php
	if(isset($_POST['submit'])){
	$malophoc=$_POST['malophoc'];
	$mahoc=$_POST['mahoc'];
	$tieudechuong=$_POST['tieudechuong'];
	$tieudebai=$_POST['tieudebai'];
	$nhapnoidung=$_POST['nhapnoidung'];
	$ketqua=mysqli_query($conn,"insert into tailieu(malop,mamon,td_chuong,td_bai,nd_bai) values('$malophoc','$mahoc','$tieudechuong','$tieudebai','$nhapnoidung')");
	echo "Tải Lên Thành Công";
	}
?>

<form action="" method="POST">
<div><h1><h1><i class="fa fa-pencil" aria-hidden="true"></i> Tạo tài liệu</h1></div>
	<table border="1" class="table_tailieu">
		<tr>
			<td colspan="2" align="center">
				Nội Dung Tài Liệu
			</td>
		</tr>
		<tr>
			<td>
				Chọn Mã Lớp
			</td>
			<td>
            <select  name="malophoc">
				<?php
					$lenh=mysqli_query($conn,"select malop from lop");
					while($ray=mysqli_fetch_array($lenh))
					{
						echo $malop=$ray['malop'];
						echo '<option  value="'.$malop.'">'.$malop.'</option>';
					}
				?>
               </select>
			</td>
		</tr>
		<tr>
			<td>
				Chọn Mã Môn
			</td>
			<td>
            <select name="mahoc">
				<?php
					$mamonhoc=mysqli_query($conn,"select mamon from monhoc");
					while($rray=mysqli_fetch_array($mamonhoc)){
						echo $mamon=$rray['mamon'];
						echo '<option value="'.$mamon.'" name="chonmadethi">'.$mamon.'</option>';
					}
				?>
             </select>
			</td>
		</tr>
		<tr>
			<td>
				Tiêu Đề Chương
			</td>
			<td>
				<textarea name="tieudechuong" type="text" placeholder="Nhập Tiêu Đề Chương Tại Đây"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Tiêu Đề Bài
			</td>
			<td>
				<textarea name="tieudebai" type="text" placeholder="Nhập Tiêu Đề Bài Tại Đây"></textarea>
			</td>
		</tr>
		<tr>
    <td colspan=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chọn hình ảnh(nếu có)</td>
    <td colspan=""><i class="fa fa-link" aria-hidden="true"></i> <input type="file" name="upload" /></td>
  </tr>
		<tr>
			<td>
				Nội Dung Bài
			</td>
			<td><textarea name="nhapnoidung" id="lanh"></textarea></td>
			<script>
			CKEDITOR.replace( 'lanh');
			</script>
		</tr>
		<tr>
			<td colspan="2">
			<input name="submit" type="submit" value="Gửi">
			</td>
		</tr>
	</table>
</form>
