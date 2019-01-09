<?php 	
	if(isset($_GET['id_sp']))
	{
		include"../../conn/connect.php";
		$id = $_GET['id_sp'];
		if($id == 1 || $id == 2 || $id == 3 || $id == 4 || $id == 5 || $id == 6 || $id == 7)	
		{
			$sql1 = mysqli_query($conn, "DELETE FROM tn_admin where id_sp ='$id'");	
			header("location:../../admin/index.php?id=thongbao");			
		}
	else
		{
			$sql2 = mysqli_query($conn, "DELETE FROM nd_tinnhan where id_sp ='$id'");	
			header("location:../../admin/index.php?id=thongbao");	
		}		
	}	
?>
