
<form action="" method="POST">
	<select name="mamonthi">
		<option value="toan">Toán</option>
		<option value="ly">Lý</option>
		<option value="hóa">Hóa</option>
		<option value="sinh">Sinh</option>
		<option value="su">Sử</option>
		<option value="dia">Địa</option>
		<option value="anh">Anh Văn</option>
	</select>
	<input name="submit" type="submit" value="Xem">
</form>
			<?php
			if(isset($_POST['submit'])){
			$mamonthi=$_POST['mamonthi'];
			$lenh=mysqli_query($conn,"select * from dethi where mamonthi='$mamonthi'");
			echo '<table border="1">';
				echo '<tr align="center">';
					echo "<td>Mã Đề Thi</td>";
					echo "<td>Thời Gian</td>";
					//echo "<td>Xem</td>";
					echo "<td colspan='2' align='center'>Hiệu Chỉnh</td>";
				echo '</tr>';
	
					while($ray=mysqli_fetch_array($lenh))
					{
						echo '<tr align="center">';
							echo "<td>{$ray['madethi']}</td>";
							echo "<td>{$ray['thoigian']}</td>";
							echo "<td colspan='1'><a href='xuly/xemcauhoi.php?xem=".$ray['madethi']."'>Xem Câu Hỏi</a>";
							echo "<td colspan='1'><a href='xuly/xoamadethi.php?xoa=".$ray['madethi']."'>Xóa Mã Đề Thi</a>";
						echo '</tr>';
					}
			echo '</table>';
	mysqli_close($conn);
			}
?>