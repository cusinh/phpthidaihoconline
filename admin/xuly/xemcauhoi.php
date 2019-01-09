<a href="http://localhost/thionl/admin/index.php?id=xem_de_thi"><i><p align="center">Quay Lại</p></i></a>
<title> Xem Câu Hỏi</title>
<?php 
	
	$connect=mysqli_connect("localhost","root","","a_thionline") or die("Không Thể Kết Nối CSDL");
	mysqli_query($connect,"set names'utf-8'");
?>
<?php
	if(isset($_GET['xem']))
	{
	$xem=$_GET['xem'];
	$lenh=mysqli_query($connect,"select * from cauhoi where madethi='$xem'");
	echo '<table border="1" align="center">';
				echo '<tr align="center" >';
					echo "<td>Mã Đề Thi</td>";
					echo "<td>Nội Dung</td>";
					echo "<td> Đáp Án</td>";
					echo "<td colspan='2' align='center'>Hiệu Chỉnh</td>";
				echo '</tr>';
	
					while($ray=mysqli_fetch_array($lenh))
					{
						echo '<tr align="center">';
							echo "<td>{$ray['madethi']}</td>";
							echo "<td>{$ray['noidung']}</td>";
							echo "<td>{$ray['dapan']}</td>";
							echo "<td colspan='2'><a href='suacauhoi.php?id=".$ray['macauhoi']."'>Sửa Câu Hỏi</a>";
							echo "<td colspan='2'><a href='xoacauhoi.php?id=".$ray['macauhoi']."'>Xóa Câu Hỏi</a>";
						echo '</tr>';
					}
	echo '</table>';
	}
	else
	{
	$lenh=mysqli_query($connect,"select * from cauhoi");
	echo '<table border="1" align="center">';
				echo '<tr align="center" >';
					echo "<td>Mã Đề Thi</td>";
					echo "<td>Nội Dung</td>";
					echo "<td> Đáp Án</td>";
					echo "<td colspan='2' align='center'>Hiệu Chỉnh</td>";
				echo '</tr>';
	
					while($ray=mysqli_fetch_array($lenh))
					{
						echo '<tr align="center">';
							echo "<td>{$ray['madethi']}</td>";
							echo "<td>{$ray['noidung']}</td>";
							echo "<td>{$ray['dapan']}</td>";
							echo "<td colspan='2'><a href='xoacauhoi.php?id=".$ray['macauhoi']."'>Xóa Câu Hỏi</a>";
						echo '</tr>';
					}
	echo '</table>';
	}
?>