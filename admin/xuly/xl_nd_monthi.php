
<?php
if(isset($_GET['nd_monthi'])){
$madethi=$_GET['nd_monthi'];
	$limit=5;
	$page=(($_GET['trang']));
	$start=($page-1)*$limit;
?>
    <table>
    	<tr>
        	<th>Mã câu hỏi</th>
            <th>Mã đè thi</th>
        	<th>Mã môn thi</th>
            <th>Nội dung</th>
        	<th>Hình ảnh</th>
            <th>Đáp án</th>
            <th colspan="2">Tùy chọn</th>
        </tr>

	<?php
	$h_monthi=mysqli_query($conn,"select * from cauhoi where madethi='$madethi' limit $start,$limit");
	while($arr_monthi=mysqli_fetch_array($h_monthi)){
	?>
        <tr>
        	<td><?php echo $arr_monthi['macauhoi']; ?></td>
            <td><?php echo $arr_monthi['madethi']; ?></td>
        	<td><?php echo $arr_monthi['mamonthi']; ?></td>
            <td><?php echo $arr_monthi['noidung']; ?></td>
        	<td><?php echo $arr_monthi['hinhanh']; ?></td>
            <td><?php echo $arr_monthi['dapan']; ?></td>
            <td><a href="index.php?macauhoi=<?php echo $arr_monthi['macauhoi']?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/xoanoidungmonthi.php?macauhoi=<?php echo $arr_monthi['macauhoi']?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
        <div style="margin:auto; width:300px;text-align:center;">
    <?php
	$d_user=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$madethi'");
	$dem_user=mysqli_num_rows($d_user); 
	$page=ceil($dem_user / $limit);
	 for($i=1;$i<=$page;$i++){?>
    <a href="index.php?nd_monthi=<?php echo $madethi ?>&trang=<?php echo $i ?>">Trang <?php echo $i." " ?></a>

    <?php } ?>
    </div>
<?php }?>