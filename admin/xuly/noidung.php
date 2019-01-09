<?php
if($_SERVER['REQUEST_METHOD']== "POST"
){
	if($_COOKIE['socau']==1){
	setcookie('madethi',$madethi,time()-3600);
	setcookie('mamonthi',$chonmadethi,time()-3600);
	setcookie('thoigian',$thoigian,time()-3600);
	setcookie('socau',$socau,time()-3600);
	echo '<script> alert("quá trình tạo đề hoàn tất"); </script>';
	header('location:index.php');
		}else{
			$_COOKIE['socau']--;
			setcookie('socau',$_COOKIE['socau'],time()+3600);
			}
	
	$madethi=$_COOKIE['madethi'];
	$chonmadethi=$_COOKIE['mamonthi'];
	$thoigian=$_COOKIE['thoigian'];
	$noidung=$_POST['nhapnoidung'];
	$dapan=$_POST['dapan'];
	$up=$_FILES['upload'];
	$name=$_FILES["upload"]['name'];
	move_uploaded_file($_FILES["upload"]["tmp_name"],"../uploads/$name");
	$lenh3=mysqli_query($conn,"insert into cauhoi(macauhoi,madethi,mamonthi,noidung,hinhanh,dapan) value
	('','$madethi','$chonmadethi','$noidung','$name','$dapan')");

}
?>
<table class="table_nd">
<div><h1><i class="fa fa-pencil" aria-hidden="true"></i> Nhập nội dung đề thi</h1></div>
	<form method="post" enctype="multipart/form-data">
  <tr>
    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Mã môn thi</th>
    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Mã đề thi</th>
    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thời gian</th>
    <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Số câu còn</th>
  </tr>
  <tr>
    <th><?php echo $_COOKIE['mamonthi'] ?></th>
    <th><?php echo $_COOKIE['madethi'] ?></th>
    <th><?php echo $_COOKIE['thoigian'] ?></th>
    <th><?php echo $_COOKIE['socau'] ?></th>
  </tr>
  <tr>
    <td colspan="4"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập nội dung</td>
  </tr>
  <tr>
    <td colspan="4"><textarea name="nhapnoidung" id="hien"></textarea></td>
    <script>
    CKEDITOR.replace( 'hien');
	</script>
  </tr>
  <tr>
    <td colspan="2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chọn hình ảnh(nếu có)</td>
    <td colspan="2"><i class="fa fa-link" aria-hidden="true"></i> <input type="file" name="upload" /></td>
  </tr>
  <tr>
    <td colspan="2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập đáp án</td>
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
    <td colspan="4"><input type="submit" name="chon" value="Tiếp Theo >>"/></td>
  </tr>
  </form>
</table>
