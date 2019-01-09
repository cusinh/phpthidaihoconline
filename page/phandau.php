<div class="xuly">
	<div class="vien"><span>Tài liệu ôn Tập</span></div>
	<a href="index.php?tailieu=toan"><div class="box_xuly" style="background:#09F;">
    <div><img src="img/icon_toan-hoc.png" width="100"/></div>
    <div>Môn toán</div>
    <div>
    	<?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='toan'") ;
			$dem_dong=mysqli_num_rows($lay_bai);
			echo $dem_dong;			
	?> bài
    </div>
    </div>
    </a>
   <a href="index.php?tailieu=ly"> <div class="box_xuly" style="background:#3C3;">
   	<div><img src="img/icon_vat-li.png" width="100"/></div>
    <div>Môn Lý</div>
    <div>
	<?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='ly'") ;
			$dem_dong=mysqli_num_rows($lay_bai);
			echo $dem_dong;			
	?> bài
    </div>
        </div>
        </a>
        <a href="index.php?tailieu=hoa">
            <div class="box_xuly" style="background:#F66;">
            	<div><img src="img/icon_hoa-hoc.png" width="100"/></div>
    			<div>Môn Hóa</div>
   				 <div>
                 	<?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='hoa'") ;
					$dem_dong=mysqli_num_rows($lay_bai);
					echo $dem_dong;			
				?> bài
                 </div>
            </div>
            </a>
            <a href="index.php?tailieu=anh">
                <div class="box_xuly" style="background:#FC0;">
                    <div><img src="img/icon_tieng-anh.png" width="100"/></div>
                    <div>Môn Anh</div>
                     <div><?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='anh'") ;
							$dem_dong=mysqli_num_rows($lay_bai);
							echo $dem_dong;			
							?> bài</div>
                </div>
                </a>
                <a href="index.php?tailieu=sinh">
                    <div class="box_xuly" style="background:#F39;">
                        <div><img src="img/icon_sinh-hoc.png" width="100"/></div>
                        <div>Môn Sinh</div>
                         <div><?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='sinh'") ;
							$dem_dong=mysqli_num_rows($lay_bai);
							echo $dem_dong;			
							?> bài</div>
                    </div>
                    </a>
                    <a href="index.php?tailieu=dia">
                        <div style="background:#3FDC92;" class="box_xuly">
                        <div><img src="img/dia_ly.png" width="100"/></div>
                        <div>Môn Địa</div>
                         <div><?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='dia'") ;
							$dem_dong=mysqli_num_rows($lay_bai);
							echo $dem_dong;			
							?> bài</div>
                        </div>
                        </a>
                        <a href="index.php?tailieu=su">
                            <div class="box_xuly" style="background:#909;">
                             <div><img src="img/lich_su1.png" width="100"/></div>
                       		 <div>Môn Sử</div>
                         		<div><?php $lay_bai=mysqli_query($conn,"select td_bai from tailieu where mamon='su'") ;
									$dem_dong=mysqli_num_rows($lay_bai);
									echo $dem_dong;			
									?> bài</div>
                            </div>
                            </a>			
 </div>
 <div class="right_xuly" style="position:absolute; top:1350px;">
 	<div class="td_right">Hoạt động mới nhất</div>

        <?php
		$lay_hoatdong=mysqli_query($conn,"SELECT * FROM bailam GROUP by id DESC limit 0,8");
		while($arr_hd=mysqli_fetch_array($lay_hoatdong)){ 
		$lay_tennd=mysqli_query($conn,"select hoten from nguoidung where taikhoan='$arr_hd[taikhoan]'");
		$arr_tennd=mysqli_fetch_array($lay_tennd);
		$lay_mon=mysqli_query($conn,"select mamonthi from dethi where madethi='$arr_hd[madethi]'" );
		$arr_mon=mysqli_fetch_array($lay_mon);
		$lay_ten=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$arr_mon[mamonthi]'");
		$arr_ten=mysqli_fetch_array($lay_ten);
		?>
        	<div class="box_right">
            <span style="color:#09F; font-weight:bold; font-size:16px;"><?php echo $arr_tennd['hoten']; ?></span>
            <span style="font-size:16px; color:#3C6;">vừa hoàn thành trắc nghiệm môn - </span>
			<span style="font-size:16px; color:#3C6;"><?php echo $arr_ten['tenmonthi']; ?></span>
            <span style="font-size:16px; color:#3C6;"> - mã đề - </span>
            <span style="font-size:16px; color:#3C6;"><?php echo $arr_hd['madethi']; ?></span>
            </div>
       <?php
	   }
	    ?>
 </div>
 <div class="img_cuoi""><img src="img/anh_footer.jpg"/></div>