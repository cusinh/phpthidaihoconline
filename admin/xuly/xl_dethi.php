<?php
if(isset($_GET['tt'])&& ($_GET['tt']=='dethi')){
	$limit=5;
	$page=(($_GET['trang']));
	$start=($page-1)*$limit;
?>
    <table>
    	<tr>
        	<th>Mã môn thi</th>
            <th>Mã đề thi</th>
            <th>Thời gian</th>
            <th colspan="3">Tùy chọn</th>
        </tr>

	<?php
	$h_dethi=mysqli_query($conn,"select * from dethi limit $start,$limit");
	while($arr_dethi=mysqli_fetch_array($h_dethi)){
	?>
        <tr>
        	<td><?php echo $arr_dethi['mamonthi']; ?></td>
            <td><?php echo $arr_dethi['madethi']; ?></td>
            <td><?php echo $arr_dethi['thoigian']; ?></td>
            <td>
            <a href="index.php?nd_monthi=<?php echo $arr_dethi['madethi']?>&trang=1" style="color:#00F;">
            <i class="fa fa-eye" aria-hidden="true"></i> xem </a></td>
            <td><a href="index.php?madethi=<?php echo $arr_dethi['madethi']?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/xoamadethi.php?xoa=<?php echo $arr_dethi['madethi']?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
    <div style="margin:auto; width:300px;text-align:center;">
    <?php
	$d_dethi=mysqli_query($conn,"select mamonthi from dethi");
	$dem_dethi=mysqli_num_rows($d_dethi); 
	$page=ceil($dem_dethi / $limit);
	 for($i=1;$i<=$page;$i++){?>
    <a href="index.php?tt=dethi&trang=<?php echo $i ?>">Trang <?php echo $i." " ?></a>

    <?php } ?>
    </div>
<?php }?>
