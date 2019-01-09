
	<link rel="stylesheet" type="text/css" href="css/radio.css"/>
<div class="content">
 <div class="left">
 <table width="220">
     <tr>
   		<td width="40"></td>
    	<td width="27" align="center"><b style="color:#39F">A</b></td>
        <td width="27" align="center"><b style="color:#39F">B</b></td>
        <td width="27" align="center"><b style="color:#39F">C</b></td>
        <td width="27" align="center"><b style="color:#39F">D</b></td>
        <td width="1" align="center"><i style="color:#39F">Đ/A</i></td>
    </tr>
    </table>
<?php
if(isset($_GET['xembaithi'])){ ?>
<?php
	$layde=$_GET['xembaithi'];
 	$taikhoan=$_SESSION["taikhoan"];
	$lenh=mysqli_query($conn,"SELECT madethi FROM bailam WHERE taikhoan='$taikhoan' and madethi='$layde' GROUP BY id DESC LIMIT 1");
	$row1=mysqli_fetch_array($lenh);
	$madethi=$row1['madethi'];
	$kt=mysqli_query($conn,"select macauhoi,dapan from cauhoi where madethi='$madethi'");
	$cau=0;
			
	while($row=mysqli_fetch_array($kt)){
		$cau++	
 ?>
	<table width="220">
    
		<tr class="my_style">
          <td width="50">
		 	<?php 
           		$lenh3="select cautl from tra_d_an where taikhoan='$taikhoan'  and madethi='$layde'
				and macauhoi = '".$row['macauhoi']."' limit 1";
                $kqua1=mysqli_query($conn,$lenh3);$arr=mysqli_fetch_array($kqua1);
				if($row['dapan'] == ($arr['cautl'])){ echo "<i style=".'color:blue;'.">Câu".$cau.":"."</i>";}
				else if($row['dapan'] != ($arr['cautl'])){ echo "<i style=".'color:red;'."><strike>Câu".$cau.":"."</strike></i>";}
				
            ?>
           </td>
           <td  width="27">
   						<input type="radio" name="<?php echo $row['macauhoi'] ?>" 
                        	id="'.($macauhoi."a").'" value="a" disabled="disabled"
  							 <?php if($arr['cautl'] == "a"){ echo "checked";  }	?> />
                   		 	<label for="'.($macauhoi."a").'"></label> 
            </td>
                		<td  width="27">
   						<input type="radio" name="<?php echo $row['macauhoi'] ?>" 
                        	id="'.($macauhoi."b").'" value="b" disabled="disabled"
  							 <?php if($arr['cautl'] == "b"){ echo "checked";  }	?> />
                   		 	<label for="'.($macauhoi."b").'"></label>
               		 	</td>
                		<td  width="27">
   						<input type="radio" name="<?php echo $row['macauhoi'] ?>" 
                        	id="'.($macauhoi."c").'" value="a" disabled="disabled"
  							 <?php if($arr['cautl'] == "c"){ echo "checked";  }	?> />
                   		 	<label for="'.($macauhoi."c").'"></label>
                		</td>
                		<td  width="27">
   						<input type="radio" name="<?php echo $row['macauhoi'] ?>" 
                        	id="'.($macauhoi."d").'" value="d" disabled="disabled"
  							 <?php if($arr['cautl'] == "d"){ echo "checked";  }	?> />
                   		 	<label for="'.($macauhoi."d").'"></label>
                		</td> 
                         <td width="27" align="center" style="color:#03F"><?php print(strtoupper($row['dapan'])); ?></td>        
						</tr>
					</table> 
  
  
       <?php 
	   }
	   ?>
<div class="left_top" style="color:#FFF;
         margin-left:-4%; top:50%; position:fixed;text-align:center; cursor:pointer">
         <img src="img/len.png" width="50"/></div>
<div class="left_top1" style="background: #000; color:#FFF; width:50px; height:50px;border-radius:60px 60px 60px 60px;
         margin-left:-4%; top:60%; position:fixed;text-align:center; cursor:pointer">
         <i class="fa fa-window-minimize fa fa-2x" aria-hidden="true" style="color:#EAEAEA;"></i></div>
<div class="left_top2" style="color:#FFF;top:70%; margin-left:-4%; position:fixed;text-align:center; cursor:pointer">
         <img src="img/xuong.png" width="50"/></div>
 </div>
 
 <div class="center">
<?php
$cau1=0;
$taikhoan=$_SESSION["taikhoan"];
$lenh=mysqli_query($conn,"SELECT madethi FROM bailam WHERE taikhoan='$taikhoan' and madethi='$layde' GROUP BY id DESC LIMIT 1");
$row1=mysqli_fetch_array($lenh);
$madethi=$row1['madethi'];
$lenh2=mysqli_query($conn,"select noidung,hinhanh from cauhoi where  madethi='$layde'");

while($row2=mysqli_fetch_array($lenh2)){
	$cau1++;
	?>
			
						<div class="cauhoi">
						<div class="cau">
						<?php echo "Câu ".$cau1.":" ?>
						 </div class="cau">
						<div class="noidung">
						<?php echo $row2['noidung']; ?>
						</div class="noidung">
                        <div class="anh" style="margin-top:10px;">
                        <img src="uploads/<?php echo $row2['hinhanh']; ?>" />
                        </div>
						</div>
<?php } ?>
<?php } ?>
</div>
</div>

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