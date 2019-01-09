<link rel="stylesheet" type="text/css" href="css/radio.css"/>
<?php
$taikhoan=$_SESSION["taikhoan"];
?>
 
 <div class="left">
 	<table width="210" border="1">
    <tr>
   		<td width="60"></td>
    	<td width="28" align="center"><b style="color:#39F">A</b></td>
        <td width="28" align="center"><b style="color:#39F">B</b></td>
        <td width="28" align="center"><b style="color:#39F">C</b></td>
        <td width="35" align="center"><b style="color:#39F">D</b></td>
    </tr>
     <form method="post" name="da">
        <?php
		if(isset($_GET['monthi'])){
			$monthi=$_GET['monthi'];
			switch($monthi){
				case 'toan':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='toan' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','1')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','1')");
					}
				break;
				case 'ly':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='ly' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','2')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','2')");
					}
				break;
				case 'hoa':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='hoa' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','3')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','3')");
					}
				break;
				case 'anh':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='anh' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','4')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','4')");
					}
				break;
				case 'sinh':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='sinh' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','5')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','5')");
					}
				break;
				case 'su':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='su' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','6')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','6')");
					}
				break;
				case 'dia':
				$cau=0;
					$kqu=mysqli_query($conn,"Select madethi from dethi where mamonthi='dia' and  madethi 
											not in(select madethi from bailam where taikhoan='$taikhoan') limit 1");
					$row=mysqli_num_rows($kqu);
					if($row != 0){
					$laymade=mysqli_fetch_array($kqu);
						$made=$laymade['madethi'];	
					$kqu1=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
					while($laymade1=mysqli_fetch_array($kqu1)){
						$cau++;
						$macauhoi=$laymade1['macauhoi'];
			echo '<table width="210">
						<tr class="my_style">
						<td style="color:blue;" width="70"><i>Câu '.$cau.'</i> </td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."a").'" value="a">
                   		 	<label for="'.($macauhoi."a").'"></label>
               		 	</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."b").'" value="b">
                    		<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td align="center">
                   			 <input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."c").'" value="c">
                    		<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td align="center">
                    		<input type="radio" name="'.$macauhoi.'" id="'.($macauhoi."d").'" value="d">
                    		<label for="'.($macauhoi."d").'"></label>
                		</td>         
						</tr>
					</table>' ;
						}
				}else{
					$sp_loi=mysqli_query($conn,"insert into tinnhan(id_tn,taikhoan,id_sp) 
					value('','$taikhoan','7')");
					$sp_loi_ad=mysqli_query($conn,"insert into tn_admin(id_ad,taikhoan,id_sp) 
					value('','$taikhoan','7')");
					}
				break;
			}
		}

		 ?>
         <?php submit(); ?>
            
      </form>
        </table>  
</div> 
<div class="left_top" style="color:#FFF;
         margin-left:-4%; top:50%; position:fixed;text-align:center; cursor:pointer">
         <img src="img/len.png" width="50"/></div>
<div class="left_top1" style="background: #000; color:#FFF; width:50px; height:50px;border-radius:60px 60px 60px 60px;
         margin-left:-4%; top:60%; position:fixed;text-align:center; cursor:pointer">
         <i class="fa fa-window-minimize fa fa-2x" aria-hidden="true" style="color:#EAEAEA;"></i></div>
<div class="left_top2" style="color:#FFF;top:70%; margin-left:-4%; position:fixed;text-align:center; cursor:pointer">
         <img src="img/xuong.png" width="50"/></div>
<?php
if(isset($_POST['submit']))
	{
		$diem=0;
		$kqua=$_POST;
		foreach($kqua as $cauhoi=>$dapan1){
			if(is_numeric($cauhoi)){

			$lenh="select dapan from cauhoi where macauhoi = '$cauhoi' limit 1";
			$kqua1=mysqli_query($conn,$lenh);
			$arr=mysqli_fetch_array($kqua1);
				if($dapan1 == ($arr['dapan']))
				{
					$diem++;
					
				}
			
			$vao=mysqli_query($conn,"insert into tra_d_an(taikhoan,madethi,macauhoi,cautl) value 
			('$taikhoan','$made','$cauhoi','$dapan1')");
				
			}
		}
		$tinh_diem=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$made'");
		$dem_cau=mysqli_num_rows($tinh_diem);
		$so_diem=(100/$dem_cau);
		$diem_lb=($so_diem*$diem);
	$tg_nop_bai=time()+60*60*24*7;
	$nhap=mysqli_query($conn,"insert into bailam(id,taikhoan,madethi,sodiem,tg_nop_bai) value ('','$taikhoan','$made','$diem_lb','$tg_nop_bai')");
	$xoa_nd_check=mysqli_query($conn,"delete from check_tg where taikhoan='$taikhoan'");
			header('Location: ../thionl/index.php?xemkq');
			setcookie('thoigian2',$_COOKIE['thoigian2'],time()-8000);
			//setcookie('mamonthi',$_COOKIE['mamonthi'],time()-8000);
	}
?>




<?php function chon(){ ?>
      <table style="border-bottom:0.5px dashed ; border-top:none; border-right:none; border-left:none;">
            <tr>
                <td><input type="radio" name="<?php echo $fuck1['macauhoi'] ?>" value="a"/></td>
                <td><input type="radio" name="<?php echo $fuck1['macauhoi'] ?>" value="b"/></td>
                <td><input type="radio" name="<?php echo $fuck1['macauhoi'] ?>" value="c"/></td>
                <td><input type="radio" name="<?php echo $fuck1['macauhoi'] ?>" value="d"/></td>
                                        
            </tr>
       </table>  
<?php } ?>
<?php function submit(){ ?>
 <table style="margin-top:15px;"  width="210">
            <tr>
               <td align="center">
               <input type="submit" name="submit" value="Nộp Bài" id="nopbai" style="width:70px;
               height:30px; background:#09F; color:#FFF; font-weight:bold;box-shadow:4px 4px 4px #999999;border-radius: 5px;
               "/>
               </td>
            </tr>
       </table>  
<?php  } ?>
<?php
if(isset($_GET['xemkq1'])){
	echo "vui lòng đợi tỏng giây lát";
	nhay();
	}
?>

<?php 
  function kt(){
?>
 <script type="text/javascript">
 alert('vui lòng không được để trống đáp án');

 </script>
  
<?php 
  }
?>
<script type="text/javascript">

jQuery("document").ready(function($){

 var nav = $('.left');

 $(window).scroll(function () {
  if ($(this).scrollTop() > 150) {
   nav.addClass("fix");
  } else {
   nav.removeClass("fix");
  }
 });

});

</script>
<!-- croll top top ----------------->
<script>
$(document).ready(function(){
 
    // hide #back-top first
    $("").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 0) {
                $('.left_top').fadeIn();
            } else {
                $('.left_top').fadeOut();
            }
        });
 
        // scroll body to 0px on click
        $('.left_top').click(function () {
            $('.left').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
 
});
</script> 
</script>
<!-- croll top top ----------------->
<script>
$(document).ready(function(){
 
    // hide #back-top first
    $("").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 0) {
                $('.left_top1').fadeIn();
            } else {
                $('.left_top1').fadeOut();
            }
        });
 
        // scroll body to 0px on click
        $('.left_top1').click(function () {
            $('.left').animate({
                scrollTop: 400
            }, 800);
            return false;
        });
    });
 
});
</script> 
</script>
<!-- croll top top ----------------->
<script>
$(document).ready(function(){
 
    // hide #back-top first
    $("").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 0) {
                $('.left_top2').fadeIn();
            } else {
                $('.left_top2').fadeOut();
            }
        });
 
        // scroll body to 0px on click
        $('.left_top2').click(function () {
            $('.left').animate({
                scrollTop: 900
            }, 800);
            return false;
        });
    });
 
});
</script> 

