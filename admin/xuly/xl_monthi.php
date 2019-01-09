<?php
if(isset($_GET['tt'])&& ($_GET['tt']=='monthi')){

?>
    <table>
    	<tr>
        	<th>Mã môn thi</th>
            <th>Tên môn thi</th>
            <th colspan="2">Tùy chọn</th>
        </tr>

	<?php
	$h_monthi=mysqli_query($conn,"select * from monthi");
	while($arr_monthi=mysqli_fetch_array($h_monthi)){
	?>
        <tr>
        	<td><?php echo $arr_monthi['mamonthi']; ?></td>
            <td><?php echo $arr_monthi['tenmonthi']; ?></td>
            <td><a href="../admin/index.php?mamonthi=<?php echo $arr_monthi['mamonthi']?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/xoamamonthi.php?mamonthi=<?php echo $arr_monthi['mamonthi']?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
<?php }?>