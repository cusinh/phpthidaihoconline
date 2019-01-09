<?php
if(isset($_GET['tt'])&& ($_GET['tt']=='lop')){
	$limit=5;
	$page=(($_GET['trang']));
	$start=($page-1)*$limit;
?>
    <table>
    	<tr>
        	<th>Mã Lớp</th>
            <th>Lớp</th>
            <th colspan="2">Tùy chọn</th>
        </tr>

	<?php
	$h_user=mysqli_query($conn,"select * from lop limit $start,$limit");
	while($arr_user=mysqli_fetch_array($h_user)){
	?>
        <tr>
        	<td><?php echo $arr_user['malop']; ?></td>
            <td><?php echo $arr_user['tenlop']; ?></td>
            <td><a href="xuly/sualop.php?malop=<?php echo $arr_user['malop']?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/xoalop.php?malop=<?php echo $arr_user['malop']?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
    <div style="margin:auto; width:300px;text-align:center;">
    <?php
	$d_user=mysqli_query($conn,"select malop from lop");
	$dem_user=mysqli_num_rows($d_user); 
	$page=ceil($dem_user / $limit);
	 for($i=1;$i<=$page;$i++){?>
    <a href="index.php?tt=lop&trang=<?php echo $i ?>">Trang <?php echo $i." " ?></a>

    <?php } ?>
    </div>
<?php }?>