<?php
if(isset($_GET['tt'])&& ($_GET['tt']=='tailieu')){
	$limit=5;
	$page=(($_GET['trang']));
	$start=($page-1)*$limit;
?>
    <table>
    	<tr>
        	<th>Mã môn học</th>
            <th>Tên môn</th>
            <th colspan="2">Tùy chọn</th>
        </tr>

	<?php
	$h_user=mysqli_query($conn,"select * from monhoc limit $start,$limit");
	while($arr_user=mysqli_fetch_array($h_user)){
	?>
        <tr>
        	<td><?php echo $arr_user['mamon']; ?></td>
            <td><?php echo $arr_user['tenmon']; ?></td>
            <td><a href="index.php?mamonhoc=<?php echo $arr_user['mamon'] ?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/xoamamonhoc.php?xoamamonhoc=<?php echo $arr_user['mamon'] ?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
    <div style="margin:auto; width:300px;text-align:center;">
    <?php
	$d_user=mysqli_query($conn,"select mamon from monhoc");
	$dem_user=mysqli_num_rows($d_user); 
	$page=ceil($dem_user / $limit);
	 for($i=1;$i<=$page;$i++){?>
    <a href="index.php?tt=tailieu&trang=<?php echo $i ?>">Trang <?php echo $i." " ?></a>

    <?php } ?>
    </div>
<?php }?>