<?php session_start();
include"../conn/connect.php"; ?>
<?php
if(isset($_GET['ac'])&& isset($_GET['ac'])=='logout'){
				header('../index.php');
				session_destroy();
				}
else if(!isset($_SESSION['taikhoan'])){
	header('location:location:../index.php');
	}else if(isset($_SESSION['taikhoan']))
	$kt=mysqli_query($conn,"select quyen from nguoidung where taikhoan='$_SESSION[taikhoan]'");
	$arr_kt=mysqli_fetch_array($kt);
	if($arr_kt['quyen']!=1){
	header('location:../index.php');
	}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/stype.css"/>
<title>Trang quản trị</title>
</head>
    <body>
        <div class="header">
        	<div class="logo"><h3>ZenkSchool</h3></div>
                <div class="avata">
                	<div class="anh"></div>
                        <div class="logout">
                       &nbsp;&nbsp;<?php echo "<b style=color:red;>Chào : </b> ".$_SESSION['hoten']." -"; ?>
                <a href="index.php?ac=logout"> Thoát</a></div>
                </div>
        </div>
        <div class="nd_body">
        <div class="menu_left">
        <ul>
       		 <li></li>
        	<li><h4><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Trang Chủ </a></h4></li>
            
            <li><h4><a href="index.php?id=tao_mon_thi">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tạo Môn thi</a></h4></li>
            
            <li><h4><a href="index.php?id=tao_de_thi">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tạo đề thi</a></h4></li>
            
           <li><h4><a href="index.php?id=tao_tl_mon_hoc">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tạo tài liệu môn học</a></h4></li>
            
           <li><h4><a href="index.php?id=tao_tl_lop">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tạo tài liệu lớp</a></h4></li>
            
            <li><h4><a href="index.php?id=tao_tai_lieu">
            <i class="fa fa-file-word-o" aria-hidden="true"></i> Tạo tài liệu</a></h4></li>
            
            <li><h4><a href="index.php?id=thongbao">
            <i class="fa fa-bell" aria-hidden="true"></i>            	
				<?php 
					$sql = mysqli_query($conn,"Select * from nd_tinnhan where id_sp >= 8");
					$row = mysqli_num_rows($sql);
					$sql1 = mysqli_query($conn,"Select * from tn_admin");
					$row1 = mysqli_num_rows($sql1);
					$sum = $row+$row1;
					echo "<label style='color:red'>$sum</label>";									
				?>
                 Thông báo</a></h4>       
            </li>
            
			<li><h4><a href="index.php?id=tao_tai_khoan"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
             Tạo tài Khoản</a></h4></li>
			<li class="xemdethi" onclick="xemde()">
            <h4><a href="../index.php"><i class="fa fa-eye" aria-hidden="true"></i>
             Xem trang chính</a></h4>
             	<ul id="xem1">
                <?php ?>
                	<li>toán</li>
                    <li>toán</li>
                    <li>toán</li>
                <?php ?>
                </ul>
            </li> 
        </ul>
        </div>
        <div style="clear:right;"></div>
        <div class="content">
        <div style="padding-top:50px;">
        	<?php 
			if(isset($_GET['id'])){
				if(isset($_GET['id'])&&($_GET['id'])=='tao_de_thi'){
					include"xuly/taode.php";
					}
				if(isset($_GET['id'])&&($_GET['id'])=='noidung'){
					include"xuly/noidung.php";
					}
				if(isset($_GET['id'])&&($_GET['id'])=='tao_tai_lieu')
					{
					include"xuly/taotailieu.php";
					}
				if(isset($_GET['id'])&&($_GET['id'])=='tao_mon_thi')
					{
					include"xuly/taomonthi.php";
					}
				if(isset($_GET['id'])&&($_GET['id'])=='tao_tl_mon_hoc')
					{
					include"xuly/tao_tl_monhoc.php";
					}
				if(isset($_GET['id'])&&($_GET['id'])=='tao_tl_lop')
					{
					include"xuly/tao_tl_lop.php";
					}
				if(isset($_GET['id'])&&($_GET['id'])=='tao_tai_khoan')
					{
					include"xuly/tao_tai_khoan.php";	
					}
				if(isset($_GET['id'])&&($_GET['id'])=='thongbao')
					{
					include"xuly/thongbao.php";	
					}
				}else if(isset($_GET['tt'])){
					include"xuly/xl_thongtin.php";
					include"xuly/xl_monthi.php";
					include"xuly/xl_dethi.php";
					include"xuly/xl_lop.php";
					include"xuly/xl_tl_mon.php";
					include"xuly/xl_tl_tailieu.php";
			}
				else if(isset($_GET['username']))
			{
					include"xuly/suathongtin.php";
			}
				else if(isset($_GET['mamonthi']))
				{
					include"xuly/suamamonthi.php";
				}
				else if(isset($_GET['madethi']))
				{
					include"xuly/suamadethi.php";
				}
				else if(isset($_GET['macauhoi'])){
					include"xuly/suanoidungmonthi.php";
				}
				else if(isset($_GET['mamonhoc']))
				{
					include "xuly/suamamonhoc.php";
				}
				else if(isset($_GET['mal']) && isset($_GET['mamon']))
				{
					include"xuly/suamatailieu.php";
				}
				else if(isset($_GET['xem']))
				{
					include"xuly/suanoidungtailieu.php";
				}
			else if(isset($_GET['nd_monthi'])){
					include"xuly/xl_nd_monthi.php";
			}else{
					include"xuly/thongtin.php";
					
					}
			?>
            </div>
                    <div class="footer">Copyright@ZenkSchool - 2017</div>
        </div>
        </div>
    </body>
</html>
<?php }
 ?>
 