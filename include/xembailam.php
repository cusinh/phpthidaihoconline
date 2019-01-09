    <?php
	$taikhoan=$_SESSION['taikhoan'];
	if(!isset($_GET['page'])&&!isset($_GET['dethi'])){
	$ht_made=mysqli_query($conn,"select madethi from bailam where taikhoan='$taikhoan' limit 13");
	$dem_ht_made=mysqli_num_rows($ht_made);
	while($arr_ht_made=mysqli_fetch_array($ht_made)){
		$xemmadethi=$arr_ht_made['madethi'];
		echo "<a href=index.php?xembaithi=$xemmadethi><div>".$arr_ht_made['madethi']."</div></a>";
		}
		if($dem_ht_made > 12){
		echo "<i class=next>"."<a href=index.php?dedathi&page=2><div> Tiếp >></div></a>"."</i>";
		}
	}else if(isset($_GET['page']) && !isset($_GET['dethi'])){
				$page=1;
				$limit=13;
				$page=$_GET['page']+$page;
				$start=$page*$limit;
				$ht_made=mysqli_query($conn,"select madethi from bailam where taikhoan='$taikhoan' limit $start,$limit");
					$dem_mang=mysqli_num_rows($ht_made);
					while($arr_ht_made=mysqli_fetch_array($ht_made)){
					$xemmadethi=$arr_ht_made['madethi'];
					echo "<a href=index.php?xembaithi=$xemmadethi><div>".$arr_ht_made['madethi']."</div></a>";
					}
					if($dem_mang > 12){
					echo "<i class=next>"."<a href=index.php?dedathi&page=$page><div> Tiếp >></div></a>"."</i>";
					}
		}else if(isset($_GET['dethi'])&&!isset($_GET['page'])){
		$mamonthi=$_GET['dethi'];
		$lamamon=mysqli_query($conn,"select madethi from dethi where mamonthi='$mamonthi'");
		while($arr_laymamon=mysqli_fetch_array($lamamon)){
			$madethi=$arr_laymamon['madethi'];
			$laymade=mysqli_query($conn,"select madethi from bailam where madethi='$madethi'  and taikhoan='$taikhoan' limit 13");
			$dem_made=mysqli_num_rows($laymade);
			$arr_laymade=mysqli_fetch_array($laymade);
			$xemmadethi=$arr_laymade['madethi'];
			echo "<a href=index.php?xembaithi=$xemmadethi><div>".$arr_laymade['madethi']."</div></a>";
		}
			}else if(isset($_GET['page']) && isset($_GET['dethi'])){
				$page=1;
				$limit=13;
				$page=$_GET['page']+$page;
				$start=$page*$limit;
			$mamonthi=$_GET['dethi'];
			$lamamon=mysqli_query($conn,"select madethi from dethi where mamonthi='$mamonthi'");
			while($arr_laymamon=mysqli_fetch_array($lamamon)){
			$madethi=$arr_laymamon['madethi'];
			$laymade=mysqli_query($conn,"select madethi from bailam where madethi='$madethi' and taikhoan='$taikhoan' limit $start,$limit");
			$dem_ht_made=mysqli_num_rows($laymade);
			$arr_laymade=mysqli_fetch_array($laymade);
			$xemmadethi=$arr_laymade['madethi'];
			echo "<a href=index.php?xembaithi=$xemmadethi><div>".$arr_laymade['madethi']."</div></a>";
			}
		}
	?>
