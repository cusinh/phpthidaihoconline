<head>
<link rel="stylesheet" type="text/css" href="tailieu/style.css"/>
</head>
<?php
	$name=$_GET['tailieu'];
	$ketqua=mysqli_query($conn,"select * from tailieu where mamon='$name'");
	echo '<div class="phancuoi">';
	echo '<div class="tailieumon"> Tài Liệu Môn Học</div>';
	while($ray=mysqli_fetch_array($ketqua))
	{
		?>
		
<div class="lieu">
		<?php
		$id=$ray['id'];	
		echo '<div class="img">';
		echo '<img alt="Logo Môn Ôn Tập" src="img/new.gif">';
		echo '</div>';
		echo '<a href="index.php?ten='.$id.'">';
		echo $ray['td_chuong'];
		echo "-";
		echo $ray['td_bai'];
		echo '</a>';
		?>
		</div>
	<?php }?>
	</div>
