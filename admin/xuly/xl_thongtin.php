<?php
if(isset($_GET['tt'])&& ($_GET['tt']=='user')){
	$limit=5;
	$page=(($_GET['trang']));
	$start=($page-1)*$limit;
?>
    <table>
    	<tr align="center">
        	<th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th colspan="2">Tùy chọn</th>
        </tr>

	<?php
	$h_user=mysqli_query($conn,"select * from nguoidung where quyen='0' limit $start,$limit");
	while($arr_user=mysqli_fetch_array($h_user)){
	?>
        <tr>
        	<td><?php echo $arr_user['taikhoan']; ?></td>
            <td><?php echo $arr_user['matkhau']; ?></td>
            <td><?php echo $arr_user['hoten']; ?></td>
           	<td><?php echo $arr_user['email'] ?></td>
            <td><a href="../admin/index.php?username=<?php echo $arr_user['taikhoan']?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/xoathongtin.php?username=<?php echo $arr_user['taikhoan']?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
    <div style="margin:auto; width:300px;text-align:center;">
    <?php
	$d_user=mysqli_query($conn,"select taikhoan from nguoidung where quyen='0'");
	$dem_user=mysqli_num_rows($d_user); 
	$page=ceil($dem_user / $limit);
	 for($i=1;$i<=$page;$i++){?>
    <a href="index.php?tt=user&trang=<?php echo $i ?>">Trang <?php echo $i." " ?></a>

    <?php } ?>
    </div>
<?php }?>