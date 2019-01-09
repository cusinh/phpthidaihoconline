<?php
if(isset($_GET['xulykq'])){
		$diem=0;
		$kqua=$_POST;
		foreach($kqua as $cauhoi=>$dapan1){
			if(is_numeric($cauhoi)){
			$lenh="select dapan from cauhoi where macauhoi = '$cauhoi' limit 1";
			$kqua1=mysqli_query($conn,$lenh);
			$arr=mysqli_fetch_array($kqua1);
				if($dapan1 == ($arr['dapan']))
				{
					$diem++;
					
				}
			
			$vao=mysqli_query($conn,"insert into tra(taikhoan,madethi,macauhoi,cautl) value 
			('$taikhoan','$made','$cauhoi','$dapan1')");
				
			}
			$vao1=mysqli_query($conn,"insert into traloi(taikhoan,madethi,macauhoi,cautl) value 
								('$taikhoan','$made','$macauhoi','$dapan1')");
			
	
	
		}

	$nhap=mysqli_query($conn,"insert into bailam(taikhoan,madethi,sodiem) value ('$taikhoan','$made','$diem')");
			
}

setcookie('kq','vui lòng đợi...',time()+2);
echo '<script>window.location.href="index.php?xemkq" </script>';
?>