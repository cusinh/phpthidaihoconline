<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<?php
?>
<form action="" method="POST">
	<table align="center">
		<tr>
			<td colspan="2" align>
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
	</table>
</form>