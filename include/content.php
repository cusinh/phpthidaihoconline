<meta charset="utf-8" />
<?php 
//session_start();
$taikhoan=$_SESSION["taikhoan"];
?>
<?php
if(isset($_GET['monthi'])){	
	$monthi=$_GET['monthi'];
	$cau=0;
	switch($monthi){		
			case 'toan':
				$lenh="Select madethi from dethi where mamonthi='toan' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh width=820/>";
                       	echo	 '</div>';
						echo '</div>';
					}
					}
			break;
			case 'ly':
				$lenh="Select madethi from dethi where mamonthi='ly' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh />";
                       	echo	 '</div>';
						echo '</div>';
					}}
			break;
			case 'hoa':
				$lenh="Select madethi from dethi where mamonthi='hoa' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh />";
                       	echo	 '</div>';
						echo '</div>';
					}}
			break;
			case 'anh':
				$lenh="Select madethi from dethi where mamonthi='anh' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh />";
                       	echo	 '</div>';
						echo '</div>';
					}
				}
			break;
			case 'sinh':
				$lenh="Select madethi from dethi where mamonthi='sinh' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh />";
                       	echo	 '</div>';
						echo '</div>';
					}}
			break;
			case 'su':
				$lenh="Select madethi from dethi where mamonthi='su' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh />";
                       	echo	 '</div>';
						echo '</div>';
					}}
			break;
			case 'dia':
				$lenh="Select madethi from dethi where mamonthi='dia' and  madethi 
				not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
				$kqua=mysqli_query($conn,$lenh);
				$dem=mysqli_num_rows($kqua);
				if($dem != 0){
					while($row=mysqli_fetch_array($kqua))
					{
						$madethi=$row['madethi'];
					}
					$lenh1="select noidung,hinhanh from cauhoi where madethi='$madethi'";
					$kqua1=mysqli_query($conn,$lenh1);
					while($row1=mysqli_fetch_array($kqua1))
					{
						$cau++;
						$hinh=$row1['hinhanh'];
						echo '<div class="cauhoi">';
						echo '<div class="cau">';
						echo "Câu ".$cau.":";
						echo '</div class="cau">';
						echo '<div class="noidung">';
						echo $row1['noidung'];
						echo '</div>';
						echo '<div class="anh" style="margin-top:10px;">';
                        echo "<img src=uploads/$hinh />";
                       	echo	 '</div>';
						echo '</div>';
					}}
			break;
		}
	}

?>