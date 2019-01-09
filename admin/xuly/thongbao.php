<form method="post" >
<table border="1px" align="center">
	<tr align="center" bgcolor="#3399FF">
    	<td colspan="3">THÔNG BÁO NGƯỜI DÙNG</td>
    </tr>
	<tr align="center" bgcolor="#3399FF">
		<td>
			ID
		</td>
		<td>
			Nội dung lỗi
		</td>
        <td>
			Xóa
		</td>
	</tr>
			
<?php 
	$sql = mysqli_query($conn,"select * from nd_tinnhan where id_sp >= 8");
	while ($arr = mysqli_fetch_array($sql))
	{		
?>	
	<tr>
	<td align="center" name="id">
		<?php echo $arr['id_sp']?>
	</td>
	<td align="center">
		<?php echo $arr['nd_tinnhan']?>
	</td>
    <td align="center">
		<a href="../admin/xuly/delete.php?id_sp=<?php echo $arr['id_sp']?>" >Xóa</a>
	</td>
	</tr>	
<?php };?>
</table>
</form>

<form method="post" >
<table border="1px" align="center">
	<tr align="center" bgcolor="#3399FF">
    	<td colspan="4">THÔNG BÁO HỆ THỐNG</td>
    </tr>
	<tr align="center" bgcolor="#3399FF">
		<td>
			ID
		</td>
        <td>
			Tài khoản
		</td>
		<td>
			Nội dung lỗi
		</td>
        <td>
			Xóa
		</td>
	</tr>
			
<?php 

	$sql1 = mysqli_query($conn,"select * from tn_admin");	
	while($arr1 = mysqli_fetch_array($sql1))
	{
		$rid = $arr1['id_sp'];
		$taikhoan = $arr1['taikhoan'];
		$sql2 = mysqli_query($conn,"select * from nd_tinnhan where id_sp = '$rid'");
	while ($arr = mysqli_fetch_array($sql2))
	{		
?>	
	<tr>
	<td align="center" name="id">
		<?php echo $arr['id_sp']?>
	</td>
    <td align="center">
		<?php echo $taikhoan?>
	</td>
	<td align="center">
		<?php echo $arr['nd_tinnhan']?>
	</td>
    <td align="center">
		<a href="../admin/xuly/delete.php?id_sp=<?php echo $arr['id_sp']?>" >Xóa</a>
	</td>
	</tr>	
<?php };}?>
</table>
</form>
