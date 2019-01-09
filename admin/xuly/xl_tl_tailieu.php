<?php if(!isset($_GET['mamon'])&&(!isset($_GET['malop']))) 
{
?>
<?php
if(isset($_GET['tt'])&& ($_GET['tt']=='nd_tailieu')){
	$limit=5;
	$page=(($_GET['trang']));
	$start=($page-1)*$limit;
?>
    <table>
    	<tr>
        	<th>Mã lớp</th>
            <th>Mã môn</th>
            <th colspan="3">Tùy chọn</th>
        </tr>

	<?php
	$h_user=mysqli_query($conn,"select malop,mamon from tailieu limit $start,$limit");
	while($arr_user=mysqli_fetch_array($h_user)){
	?>
        <tr>
        	<td><?php echo $arr_user['malop']; ?></td>
            <td><?php echo $arr_user['mamon']; ?></td>
            <td>
            <a href="index.php?tt=nd_tailieu&trang=1&malop=
			<?php echo $arr_user['malop']; ?>&mamon=<?php echo $arr_user['mamon'] ?>" 
            style="color:#00F;">
            <i class="fa fa-eye" aria-hidden="true"></i> xem </a>
            </td>
            <td><a href="index.php?mal=<?php echo $arr_user['malop']; ?>&mamon=<?php echo $arr_user['mamon'] ?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            <td><a href="xuly/deletetailieu.php?mal=<?php echo $arr_user['malop']; ?>&mamon=<?php echo $arr_user['mamon'] ?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
        </tr>

	<?php }?> 
	</table>
    <div style="margin:auto; width:300px;text-align:center;">
    <?php
	$d_user=mysqli_query($conn,"select malop from tailieu");
	$dem_user=mysqli_num_rows($d_user); 
	$page=ceil($dem_user / $limit);
	 for($i=1;$i<=$page;$i++){?>
    <a href="index.php?tt=nd_tailieu&trang=<?php echo $i ?>">Trang <?php echo $i." " ?></a>

    <?php } ?>
    </div>
<?php }?>
<?php }else{ ?>
<?php
if(isset($_GET['malop'])&&$_GET['mamon']){ ?>
       <table>
            <tr>
                <th>Mã lớp</th>
                <th>Mã môn</th>
                <th>Tiêu đề chương</th>
                <th>Tiêu đề bài</th>
                <th>Nội dung</th>
                <th colspan="2">Tùy chọn</th>
            </tr>
			<?php
                $malop=$_GET['malop'];
                $mamon=$_GET['mamon'];
                $nd=mysqli_query($conn,"select * from tailieu where malop='$malop' and mamon='$mamon'");
                while($ar_lop=mysqli_fetch_array($nd)){
            ?>
            <tr>
                <td><?php echo $ar_lop['malop']; ?></td>
                <td><?php echo $ar_lop['mamon']; ?></td>
                <td><?php echo $ar_lop['td_chuong']; ?></td>
                <td><?php echo $ar_lop['td_bai']; ?></td>  
                <td><?php echo $ar_lop['nd_bai']; ?></td>   
                <td><a href="index.php?xem=<?php echo $ar_lop['id']  ?>" style="color:#0C0;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a></td>
            	<td><a href="xuly/deletenoidungtailieu.php?xoa=<?php echo $ar_lop['id']  ?>" style="color:#F00;"><i class="fa fa-times-circle" aria-hidden="true"></i> Xóa </a></td>
             </tr>
    		<?php } ?>
    </table>
    

<?php } ?>
<?php } ?>