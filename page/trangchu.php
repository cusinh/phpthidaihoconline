
<div class="tc_left">
<div class="dau_trang"><span>ZenkSchool - web thi trắc nghiệm online</span></div>
<a href="index.php"><div class=box_thi style="background:#3C9;color:#FFF;">Đề thi</div></a>
<a href="index.php?dethimon=toan"><div class=box_thi>Toán học</div></a>
<a href="index.php?dethimon=ly"><div class=box_thi>Vật lý</div></a>
<a href="index.php?dethimon=hoa"><div class=box_thi>Hóa học</div></a>
<a href="index.php?dethimon=sinh"><div class=box_thi>Sinh học</div></a>
<a href="index.php?dethimon=anh"><div class=box_thi>Tiếng anh</div></a>
<a href="index.php?dethimon=su"><div class=box_thi>Lịch sử</div></a>
<a href="index.php?dethimon=dia"><div class=box_thi>Địa lý</div></a>
</div>
    <div class="tc_rigth">
        <div class="rand">Top điểm cao</div>
            <div class="top_rand">
                <?php 
					$top=0;
					$diem=mysqli_query($conn,"SELECT taikhoan,sodiem,madethi FROM bailam ORDER BY sodiem DESC LIMIT 0,10");
					while($arr_diem=mysqli_fetch_array($diem)){
					$tk=$arr_diem['taikhoan'];
					$top_made=$arr_diem['madethi'];
					$name=mysqli_query($conn,"SELECT hoten from nguoidung where taikhoan='$tk'");
					$arr_name=mysqli_fetch_array($name);
					$top_mamon=mysqli_query($conn,"select mamonthi from dethi where madethi='$top_made'");
					$arr_top_mamon=mysqli_fetch_array($top_mamon);
					$mamon_arr=$arr_top_mamon['mamonthi'];
					$top_monthi=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mamon_arr'");
					$arr_top_monthi=mysqli_fetch_array($top_monthi);
					$top=$top+1;
				?>
            	<div class="rand_hinh">
                <img src="img/<?php echo "top".$top.".jpg"; ?>" width="65px"/>
                </div>
                <div class="rand_noidung">
					<div>Tên: <?php echo $arr_name['hoten']; ?></div>
                    <div>
                        <div>Môn thi: <?php echo $arr_top_monthi['tenmonthi'];?> - Mã đề: 
										<?php echo $arr_diem['madethi']?></div>
                        <div></div>		
                    </div>
                    <div>
                    	<div style="width:60px; height:20px; background:#09F; padding-top:5px;
                         color:#FFF; border-radius:3px 3px 3px 3px; text-align:center;">
						<?php echo $arr_diem['sodiem']." điểm"; ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
	<?php
	if(isset($_GET['dethimon'])){
		$dethi=$_GET['dethimon'];
		$made=mysqli_query($conn,"select madethi,mamonthi,thoigian from dethi where mamonthi='$dethi' limit 0,10");
		}else{
		$made=mysqli_query($conn,"select madethi,mamonthi,thoigian from dethi limit 0,10");
		}
		while($arr_made=mysqli_fetch_array($made)){
		$madethi=$arr_made['madethi'];
    ?>
    <div class="box_dethi">
    <div class="box_dau"><p><b>
	<?php 
		$mamonthi=$arr_made['mamonthi'];
		$thoigian=$arr_made['thoigian'];
		$cau=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$madethi'");
		$dem_cau=mysqli_num_rows($cau);
		$monthi=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mamonthi'");
		$arr_monthi=mysqli_fetch_array($monthi);
		$tenmonthi=$arr_monthi['tenmonthi'];
		echo $dem_cau;
     ?>
</b></p> <b>Câu Hỏi</b></div>
<div class="box_giua">
Đề thi thử trung học phổ thông quốc gia môn <?php echo $tenmonthi ?> mã đề 
<?php echo $arr_made['madethi'] ?></br>
<div class="giua_tt">
<i class="fa fa-bars" aria-hidden="true"></i> Môn <?php 
	$mon=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mamonthi'");
	$arr_mon=mysqli_fetch_array($mon);
	echo $arr_mon['tenmonthi'];
	?>
&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-question-circle"aria-hidden="true"></i> Số câu hỏi <?php echo "<b>".$dem_cau."</b>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian <?php echo "<b>".$thoigian."</b>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i> Lượt thi 
<b>
<?php
$luotthi=mysqli_query($conn,"select id from bailam where madethi='$madethi'");
$dem_luotthi=mysqli_num_rows($luotthi);
echo $dem_luotthi;
 ?>
 </b>
</div>
</div>
<!-- <div class="box_cuoi">Vào thi</div> -->
</div>
<?php } ?>