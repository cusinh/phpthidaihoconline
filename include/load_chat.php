<?php session_start();
$taikhoan=$_SESSION['taikhoan'];
include"../conn/connect.php";
$len3h=mysqli_query($conn,"select * from chat");
?>
<?php
$lenh=mysqli_query($conn,"select * from chat");
while($ar=mysqli_fetch_array($lenh)){ 
?>
	<?php if($ar['taikhoan']==$taikhoan){ ?>
        <div style="color:#FFF; background:#67C5E0;
         float:right;border-radius:5px 5px 5px 5px;
         min-height:40px;width:150px;word-wrap:break-word;font-family:'Times New Roman', Times, serif;
         font-size:15px;
         margin-top:5px; margin-bottom:5px;">
             <span style="color:#000;font-weight:bold;">Bạn: </span>
                <?php 
				$chuoi=$ar['nd_chat'];
				$tinh_chuoi=$cd = strlen($chuoi);
				$tim_dau = strpos($chuoi,"?");
				if(($tim_dau ==($tinh_chuoi-1))&& $tinh_chuoi != 1){
				echo "<b style=color:red>".$ar['nd_chat']."</b>"; 
				}else if($tinh_chuoi==1){
					echo $ar['nd_chat'];
					}
				else{
					echo $ar['nd_chat']; 
					}
				?>
             
         </div>
     <?php }else{ 
	 $ten=mysqli_query($conn,"select hoten from nguoidung where taikhoan='$ar[taikhoan]'");
		$ar_ten=mysqli_fetch_array($ten);
	 ?>
     	<div style="color:#000; background:#E6E6E6;
         float:left;border-radius:5px 5px 5px 5px;
         min-height:40px;width:150px;word-wrap:break-word;font-family:'Times New Roman', Times, serif;font-size:15px;
         margin-top:5px; margin-bottom:5px;">
             <div>
             <span style="color:#09F; font-weight:bold;">
			 	<?php echo $ar_ten['hoten'].": " ;?>
             </span>
                <?php 
				$chuoi=$ar['nd_chat'];
				$tinh_chuoi=$cd = strlen($chuoi);
				$tim_dau = strpos($chuoi,"?");
				if(($tim_dau ==($tinh_chuoi-1))&& $tinh_chuoi != 1){
				echo "<b style=color:red>".$ar['nd_chat']."</b>"; 
				}else if($tinh_chuoi==1){
					echo $ar['nd_chat'];
					}
				else{
					echo $ar['nd_chat']; 
					}
				?>
             </div>
         </div>
     	<?php } ?>
<?php }; ?>