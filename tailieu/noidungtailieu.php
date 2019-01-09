<style >
#box1
{
	margin:20px 10px 20px 10%;
	width:60%;
	border:1px solid #0CC;
	box-shadow: 5px 5px 5px #CCCCCC;
}
.tieude1
{
	font: "Times New Roman";
	background:#0C9;
	color: #fff;
	font-weight:bold;
	padding: 5px 0 10px 15px;
	font-size: 16px;
}
.noidung1
{
	padding:15px;
	text-align:justify;
	background:#FFFFFF;
	font-family:Verdana;
}

.submit1 a
{
	float: right;
	border:1px solid #099;
	background:#0c9;
	color:#FFF;
	padding: 5px;
	margin-top:-16px;
	margin-right:-15px;
	
}
.tc_rigth1{
	
	width:230px;
	height:500px;
	float:right;
	margin-right:10%;
	}
</style>
    <div class="tc_rigth1">
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
	if(isset($_GET['tailieu'])&& !isset($_GET['noidung']))
	{
	
	
?>

<?php 
	function subtext($text,$num) {
        if (strlen($text) <= $num) {
            return $text;
        }
        $text= substr($text, 0, $num);
        if ($text[$num-1] == ' ') {
            return trim($text)."...";
        }
        $x  = explode(" ", $text);
        $sz = sizeof($x);
        if ($sz <= 1)   {
            return $text."...";}
        $x[$sz-1] = '';
        return trim(implode(" ", $x))."...";
}
?>
<?php 
	if(isset($_GET['tailieu'])){
	$mon=$_GET['tailieu'];
	$sql= "SELECT * FROM `tailieu` where mamon='$mon'";
	$result = mysqli_query($conn,$sql);
	while($arr = mysqli_fetch_array($result))
	{
		$bai = $arr['td_bai'];
		$full_bai = $arr['nd_bai'];
		$nd_bai = subtext($arr['nd_bai'],1000);
		
?>
<div id="box1">
	<div class="tieude1">
			<?php echo "$bai"?>
	</div>
	<div class="noidung1">
		<?php echo "$nd_bai"?>
		<div class="submit1">
			<a href="index.php?tailieu=<?php echo $mon;?>&noidung=<?php echo $arr['id']; ?>">Xem thêm</a>
		</div>
	</div>
</div>
<?php };}?>
<?php }
	elseif($_GET['noidung']){
	$mon1=$_GET['noidung'];
	$sql= "SELECT nd_bai, td_bai FROM `tailieu` where id = '$mon1'";
	$result = mysqli_query($conn,$sql);
	$arr = mysqli_fetch_array($result);
	 ?>

		<div id="box1">
	<div class="tieude1">
		<?php echo $arr['td_bai']; ?>
	</div>
	<div class="noidung1">
		<?php echo $arr['nd_bai']; ?>
	</div>
</div>

<?php } ?>

