<?php
// xem lại bug phần này xử lsy lại cookie nếu như reset nhiều lần thì cookie sẽ bị hủy và có thể chuyển trang
// sửa lại phần cookie của mamonthi vì chưa logic 
$taikhoan=$_SESSION['taikhoan'];
// xóa thời gian khi ko tồn tại cookie
// chuyển trang khi có hành động reset trang
if((isset($_COOKIE['mamonthi']))&&(isset($_COOKIE['thoigian2'])) ){
				$check=mysqli_query($conn,"select * from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				$md_madethi=$arr_check['c_madethi'];
				if(($_COOKIE['mamonthi'])!= '$md_check'){	
				c_trang();
				}if(isset($_COOKIE['thoigian2'])){
					c_trang();
					}
}
// Xử lsy kết quả khi hết thời gian làm bài
if((!isset($_COOKIE['thoigian2']))&& (isset($_COOKIE['mamonthi'])) ){
		$diem=0;
		$c_kqua=$_POST;
		foreach($c_kqua as $c_cauhoi=>$c_dapan1){
			if(is_numeric($c_cauhoi)){

			$c_lenh="select dapan from cauhoi where macauhoi = '$c_cauhoi' limit 1";
			$c_kqua1=mysqli_query($conn,$c_lenh);
			$c_kqarr=mysqli_fetch_array($c_kqua1);
				if($c_dapan1 == ($c_kqarr['dapan']))
				{
					$diem++;
				}
			$vao_d=mysqli_query($conn,"insert into tra_d_an(taikhoan,madethi,macauhoi,cautl) value 
			('$taikhoan','$madethi','$c_cauhoi','$c_dapan1')");
			}
		}
		$tinh_diem=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$madethi'");
		$dem_cau=mysqli_num_rows($tinh_diem);
		$so_diem=(100/$dem_cau);
		$diem_lb=($so_diem*$diem);
		$tg_nop_bai=time()+60*60*24*7;
	$nhap_d=mysqli_query($conn,"insert into bailam(id,taikhoan,madethi,sodiem,tg_nop_bai) 
								value ('$taikhoan','$madethi','$diem_lb','$tg_nop_bai')");
					$xoa_nd_check=mysqli_query($conn,"delete from check_tg where taikhoan='$taikhoan'");
						header('Location: ../thionl/index.php?xemkq');
							setcookie('mamonthi','$_COOKIE[mamonthi]',time()-8000);
			
	}
			

?>
<!-- thời gian -->
<div class="popup">
    <div class="thoigian">
    <table>
    <tr>
        <td>
        <form method="get" name="chonmon">
            <table>
                <tr>
                    <td width="120px">
                        <select name="monthi" style="width:120px; background:#333;height:30px;
                                                                 color:#FFF;text-align:center;box-shadow:4px 4px 4px #999999">
                            <option value="chon">Chọn môn thi</option>
                            <option value="toan">Môn toán</option>
                            <option value="ly">Môn lý</option>
                            <option value="hoa">Môn hóa</option>
                            <option value="anh">Môn anh</option>
                            <option value="sinh">Môn sinh</option>
                            <option value="su">Môn sử</option>
                            <option value="dia">Môn địa</option>
                        </select>
                    </td>
                    <td style="padding-left:10px;"><input type="submit" style="width:70px;height:30px; background:#09F; 
                        color:#FFF; font-weight:bold;box-shadow:4px 4px 4px #999999;border-radius: 5px;"
                        value="Bắt đầu"/>
                    <td>
              </tr>
            </table>
            </form>
          </td>
    </tr>
    <!-- dem thời gian -->
           <?php function thoigian(){ ?>
                <tr>
                    <td style="margin-top:50px;"><b style="color:#F00">Còn : </b></td>
                    <td>
                        <script>

                                var giay= "<?php global $giay; echo $giay; ?>";
                                var phut= "<?php global $phut;echo $phut; ?>";
                                function dem(){
                                    if(giay > 0){
                                    giay=giay-1;
                                    setTimeout("dem()",1000);
                                    document.getElementById("box1").value=phut;
                                    document.getElementById("box").value=giay;
                                    }else if( (giay==0)&&(phut > 0) ){
                                        phut=phut-1;
                                        giay=60;
                                        setTimeout("dem()",1000);
                                        }else if((giay==0)&&(phut==0)){
										document.getElementById("box1").value=phut=0;
                                   		document.getElementById("box").value=giay=0;
                                            hettime();
                                            document.getElementById("nopbai").click();
                                           // window.location.href="index.php?xemkq";
                                            }
                                    }dem();
                                      function hettime(){
                                            alert ("Hết thời gian!");	
                                        }
                                </script>
                        <input style="width:30px; 
                            background:#333;height:30px;border-radius:20px; text-align:center;color:#FFF;font-weight:bold
                            ;box-shadow:4px 4px 4px #CCCCCC" 
                            type="text" id="box1"/>
                            <b style="color:#06F">Phút</b>
                         <input style="width:30px; 
                            background:#333;height:30px;border-radius:20px; text-align:center;color:#FFF;font-weight:bold;
                            box-shadow:4px 4px 4px #CCCCCC" 
                            type="text" id="box"/><b style="color:#06F">Giây</b>
                    </td>
                </tr>
            <?php } ?>
    </table>
    
  <!-- xử lý chọn môn thi và thời gian -->       
    <?php
    $taikhoan=$_SESSION["taikhoan"];
    if(isset($_GET['monthi']) ){
        $monthi=$_GET['monthi'];
        switch($monthi){
            
                case 'toan':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='toan' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','toan','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','toan',time()+8000);
						
						}
                        }
				}
                break;
                case 'ly':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='ly' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','ly','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','ly',time()+8000);
						}
                        }
		}
                break;
                case 'hoa':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='hoa' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','hoa','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','hoa',time()+8000);
						}
                        }
		}
                break;
                case 'anh':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='anh' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','anh','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','anh',time()+8000);
						}
                        }
		}
                break;
                case 'sinh':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='sinh' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','sinh','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','sinh',time()+8000);
						}
                        }
		}
                break;
                case 'su':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='su' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','su','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','su',time()+8000);
						}
                        }
		}
                break;
                case 'dia':
				$check=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
				$arr_check=mysqli_fetch_array($check);
				$md_check=$arr_check['c_mamonthi'];
				if((isset($_COOKIE['mamonthi']))&&($_COOKIE['mamonthi'])!= '$md_check' ){	
				c_trang();
				}else{
				
				// lấy mã đề ko trùng
                    $lenh="Select madethi from dethi where mamonthi='dia' and  madethi 
                    not in(select madethi from bailam where taikhoan='$taikhoan') limit 1";
                    $kqua=mysqli_query($conn,$lenh);
				// đếm mã đề nếu ko trùng thì tiến hành lấy mã đề thi
                    $dem=mysqli_num_rows($kqua);
                    if($dem != 0){
                        $row=mysqli_fetch_array($kqua);
                            $madethi=$row['madethi'];
				// kiểm tra nội dung câu hỏi có hay không
                        $dk=mysqli_query($conn,"select noidung from cauhoi where madethi='$madethi'");
                        if(($tinh=mysqli_num_rows($dk))!=0){
				// tiến hành lấy thời gian
                        $lenh1="select thoigian from dethi where madethi='$madethi'";
                        $kqua1=mysqli_query($conn,$lenh1);
                       		$row1=mysqli_fetch_array($kqua1);
                            	$thoigian=$row1['thoigian'];
                 // lưu thời gian vào bảng check
					$time2=time()+(60*$thoigian);
					$lenh9=mysqli_query($conn,"insert into check_tg(taikhoan,c_thoigian,c_mamonthi,c_madethi)
					value('$taikhoan','$time2','dia','$madethi')");
						// tính thời gian
						$lenh3=mysqli_query($conn,"select c_thoigian from check_tg where taikhoan='$taikhoan'"); 
						$ar=mysqli_fetch_array($lenh3);
						$t=$ar['c_thoigian'];
						$phut=(int)( ($t-time())/60 );
						$giay=ceil( ($t-time())%60 );
						thoigian();
						setcookie('thoigian2',$thoigian,$t);
						setcookie('mamonthi','dia',time()+8000);
						}
                        }}
                break;
            }
			}
    ?>
    <!--  xử lý xe, kêt quả -->
    </div>
   <!---------------------------------------------------------------------------------->
   <?php if(isset($_GET['xembaithi'])){ $layde=$_GET['xembaithi']; ?>
    <div class="diem">
    <div align="center"><b style="color:#00F"><u>Điểm</u></b></div>
    <div align="center" style="padding-top:20px;"><span style="color:#F00;">
    <h1>
    <?php
                    $sodiem1=mysqli_query($conn,"SELECT sodiem FROM bailam 
                    WHERE taikhoan='$taikhoan' and madethi='$layde' GROUP BY id DESC LIMIT 1");
                    $mangsodiem1=mysqli_fetch_array($sodiem1);
                    echo $mangsodiem1['sodiem'];
    ?>
    </h1></span></div>
    </div>
    <div class="nhanxet" style="word-break:break-all;">
             <div align="center"><b style="color:#00F"><u>nhận xét</u></b></div>
                <div>
                <?php
                    $nhanxet=mysqli_query($conn,"SELECT sodiem FROM bailam 
                    WHERE taikhoan='$taikhoan'  and madethi='$layde' GROUP BY id DESC LIMIT 1");
                    $mangnhanxet=mysqli_fetch_array($nhanxet);
                    if($mangnhanxet['sodiem']<50){
                        echo "<i style=".'color:red;'.">Có vẻ như bạn học không tốt môn này cho lắm bạn cần phải cố gắng nhiều hơn nữa</i>";
                        }else if($mangnhanxet['sodiem']=50 &&$mangnhanxet['sodiem']<=70){
                        echo "<i style=".'color:red;'.">Điểm của bạn vẫn còn khá khiêm tốn bạn cần cố gắng nhiều hơn nữa</i>";
                            }else if($mangnhanxet['sodiem']=80 &&$mangnhanxet['sodiem']<=90){
                        echo "<i style=".'color:red;'.">Điểm bạn khá cao nhưng vẫn bạn cần phải cố gắng hơn để đạt điểm tuyệt đối</i>";
                                }else if($mangnhanxet['sodiem']<90 &&$mangnhanxet['sodiem']==100){
                        echo "<i style=".'color:red;'.">Rất tốt những nổ lực của bạn đã có kết quả hãy tiếp tục phát huy nhé</i>";
                                    }
                ?>
                </div>
    </div>

    <div class="thongtin">
        <table>
            <tr>
                <td style="color:#00F"><b>Họ tên :</b></td>
                <td><?php echo $_SESSION["hoten"] ?></td>
            </tr>
            <tr>
                <td style="color:#00F"><b>Số bài đã thi :</b></td>
                <td>
                        <?php 
                   $bailam=mysqli_query($conn,"select madethi from bailam where taikhoan='$taikhoan'");
                        $dembailam=mysqli_num_rows($bailam);
                        if($dembailam==0){
                            echo 0;
                            }else{
                                echo $dembailam;
                                }
                        ?>
                 </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Môn đã thi :</b></td>
                <td>
                <?php
                    $mondathi=mysqli_query($conn,"select DISTINCT mamonthi from dethi,bailam 
                                                    WHERE dethi.madethi=bailam.madethi and taikhoan='$taikhoan'");
                    while($mangthi=mysqli_fetch_array($mondathi)){
                    $mangthi1=$mangthi['mamonthi'];
                    
                    $tenmonthi=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mangthi1'");
                    while($mangten=mysqli_fetch_array($tenmonthi)){
                        echo $mangten['tenmonthi'].",";
                        }}
                    
                    
                ?>
                </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Điểm cao nhất :</b></td>
                <td>
                <?php 
                    $diemcao=mysqli_query($conn,"select MAX(sodiem) from bailam where taikhoan='$taikhoan'");
                    $mangdiem=mysqli_fetch_array($diemcao);
                    echo $mangdiem['MAX(sodiem)'];
                ?>
                </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Điểm thấp nhất :</b></td>
                <td>
                <?php 
                    $diemthap=mysqli_query($conn,"select MIN(sodiem) from bailam where taikhoan='$taikhoan'");
                    $mangdiem1=mysqli_fetch_array($diemthap);
                    echo $mangdiem1['MIN(sodiem)'];

                ?>
                </td>
    
            </tr>
        </table>
    </div>
    
    <?php } ?>
   <!------------------------------------------------------------------------------------->
<?php if(isset($_GET['xemkq']) && !isset($_GET['xembaithi'])){ ?>
    <div class="diem">
    <div align="center"><b style="color:#00F"><u>Điểm</u></b></div>
    <div align="center" style="padding-top:20px;"><span style="color:#F00;">
    <h1>
    <?php
                    $sodiem1=mysqli_query($conn,"SELECT sodiem FROM bailam 
                    WHERE taikhoan='$taikhoan' GROUP BY id DESC LIMIT 1");
                    $mangsodiem1=mysqli_fetch_array($sodiem1);
                    echo $mangsodiem1['sodiem'];
    ?>
    </h1></span></div>
    </div>
    <div class="nhanxet">
             <div align="center"><b style="color:#00F"><u>nhận xét</u></b></div>
                <div>
                <?php
                    $nhanxet=mysqli_query($conn,"SELECT sodiem FROM bailam 
                    WHERE taikhoan='$taikhoan' GROUP BY id DESC LIMIT 1");
                    $mangnhanxet=mysqli_fetch_array($nhanxet);
                    if($mangnhanxet['sodiem']<5){
                        echo "<i style=".'color:red;'.">Thôi thôi ông về chăn bò cho rồi học hành gì mà điểm dưới
                                             trung bình thế này mà học gì</i>";
                        }else if($mangnhanxet['sodiem']=5 &&$mangnhanxet['sodiem']<=7){
                        echo "<i style=".'color:red;'.">Có cố gắng đấy nhưng muốn đậu đại học thì cần phải hơn thế cơ</i>";
                            }else if($mangnhanxet['sodiem']=8 &&$mangnhanxet['sodiem']<=9){
                        echo "<i style=".'color:red;'.">Điểm cũng cao đấy nhưng chưa giỏi đâu cần phải học nhiều vào</i>";
                                }else if($mangnhanxet['sodiem']<9 &&$mangnhanxet['sodiem']=10){
                        echo "<i style=".'color:red;'.">Đấy học hành là phải như vậy</i>";
                                    }
                ?>

                </div>
    </div>

    <div class="thongtin">
        <table>
            <tr>
                <td style="color:#00F"><b>Họ tên :</b></td>
                <td><?php echo $_SESSION["hoten"] ?></td>
            </tr>
            <tr>
                <td style="color:#00F"><b>Số bài đã thi :</b></td>
                <td>
                        <?php 
                        $bailam=mysqli_query($conn,"select madethi from bailam where taikhoan='$taikhoan'");
                        $dembailam=mysqli_num_rows($bailam);
                        if($dembailam==0){
                            echo 0;
                            }else{
                                echo $dembailam;
                                }
                        ?>
                 </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Môn đã thi :</b></td>
                <td>
                <?php
                    $mondathi=mysqli_query($conn,"select DISTINCT mamonthi from dethi,bailam 
                                                    WHERE dethi.madethi=bailam.madethi and taikhoan='$taikhoan'");
                    while($mangthi=mysqli_fetch_array($mondathi)){
                    $mangthi1=$mangthi['mamonthi'];
                    
                    $tenmonthi=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mangthi1'");
                    while($mangten=mysqli_fetch_array($tenmonthi)){
                        echo $mangten['tenmonthi'].",";
                        }}
                    
                    
                ?>
                </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Điểm cao nhất :</b></td>
                <td>
                <?php 
                    $diemcao=mysqli_query($conn,"select MAX(sodiem) from bailam where taikhoan='$taikhoan'");
                    $mangdiem=mysqli_fetch_array($diemcao);
                    echo $mangdiem['MAX(sodiem)'];
                ?>
                </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Điểm thấp nhất :</b></td>
                <td>
                <?php 
                    $diemthap=mysqli_query($conn,"select MIN(sodiem) from bailam where taikhoan='$taikhoan'");
                    $mangdiem1=mysqli_fetch_array($diemthap);
                        echo $mangdiem1['MIN(sodiem)'];
                ?>
                </td>
    
            </tr>
        </table>
    </div>
    
    <?php }if(!isset($_GET['xemkq'])&& (!isset($_GET['xembaithi']) )){ ?>
    <div class="thongtin1">
        <table>
            <tr>
                <td style="color:#00F"><b>Họ tên :</b></td>
                <td><?php echo $_SESSION["hoten"] ?></td>
            </tr>
            <tr>
                <td style="color:#00F"><b>Số bài đã thi :</b></td>
                <td>
                        <?php 
                        $bailam=mysqli_query($conn,"select madethi from bailam where taikhoan='$taikhoan'");
                        $dembailam=mysqli_num_rows($bailam);
                        if($dembailam==0){
                            echo 0;
                            }else{
                                echo $dembailam;
                                }
                        ?>
                 </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Môn đã thi :</b></td>
                <td>
                <?php
                    $mondathi=mysqli_query($conn,"select DISTINCT mamonthi from dethi,bailam 
                                                    WHERE dethi.madethi=bailam.madethi and taikhoan='$taikhoan'");
                    while($mangthi=mysqli_fetch_array($mondathi)){
                    $mangthi1=$mangthi['mamonthi'];
                    
                    $tenmonthi=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mangthi1'");
                    while($mangten=mysqli_fetch_array($tenmonthi)){
                        echo $mangten['tenmonthi'].",";
                        }}
                    
                    
                ?>
                </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Điểm cao nhất :</b></td>
                <td>
                <?php 
                    $diemcao=mysqli_query($conn,"select MAX(sodiem) from bailam where taikhoan='$taikhoan'");
                    $mangdiem=mysqli_fetch_array($diemcao);
                    echo $mangdiem['MAX(sodiem)'];
                ?>
                </td>
    
            </tr>
            <tr>
                <td style="color:#00F"><b>Điểm thấp nhất :</b></td>
                <td>
                <?php 
                    $diemthap=mysqli_query($conn,"select MIN(sodiem) from bailam where taikhoan='$taikhoan'");
                    $mangdiem1=mysqli_fetch_array($diemthap);
                        echo $mangdiem1['MIN(sodiem)'];
                ?>
                </td>
    
            </tr>
        </table>
    </div>
        <div class="thongtin2">
        <?php
		if(isset($thoigian)){
			$check_mm=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$taikhoan'");
			$arr_mamon=mysqli_fetch_array($check_mm);
			$mamon=$arr_mamon['c_mamonthi'];
			$h_monthi=mysqli_query($conn,"select tenmonthi from monthi where mamonthi='$mamon'");
	$socauhoi=mysqli_query($conn,"select macauhoi from cauhoi where madethi='$madethi' and mamonthi='$mamon'");
			$h_tgian=mysqli_query($conn,"select thoigian from dethi where madethi='$madethi'");
			$a_h_monthi=mysqli_fetch_array($h_monthi);
			$row_socauhoi=mysqli_num_rows($socauhoi);
			$a_h_tgian=mysqli_fetch_array($h_tgian);
			echo "<table>";
				echo "<tr>";
			echo "<td><b style=color:#00F>"."bạn đang thi môn: "."</b></td><td>".$a_h_monthi['tenmonthi']."</br></td>";
				echo "</tr>";
				echo "<tr>";
			echo "<td><b style=color:#00F>"."Thời gian làm bài: "."</b></td><td>".$a_h_tgian['thoigian']." Phút"."</br>";
				echo "</tr>";
				echo "<tr>";
			echo "<td><b style=color:#00F>"."mã đề thi: "."</b></td><td>".$madethi."</br></td>";
				echo "</tr>";
				echo "<tr>";
			echo "<td><b style=color:#00F>"."số câu hỏi: "."</b></td><td>".$row_socauhoi."</td>";
				echo "</tr>";
			echo "</table>";
			}else if(!isset($thoigian)){ ?>
			
        <!-- chức nắng hiển thị mã đề thi đã thi ------->
         <table class="table_popup">
          <tr>
            <td class="td_popup" style="background:#09F;"><a href="index.php">Tất cả</a></td>
            <td class="td_popup"><a href="index.php?dethi=toan">Toán</a></td>
            <td class="td_popup"><a href="index.php?dethi=ly">Lý</a></td>
            <td class="td_popup"><a href="index.php?dethi=hoa">Hóa</a></td>
            <td class="td_popup"><a href="index.php?dethi=anh">Anh</a></td>
            <td class="td_popup"><a href="index.php?dethi=sinh">Sinh</a></td>
            <td class="td_popup"><a href="index.php?dethi=su">Sử</a></td>
            <td class="td_popup"><a href="index.php?dethi=dia">Địa</a></td>
          </tr>
          <tr>
            <td colspan="8" class="td_made">
    <?php
	include"xembailam.php";
	?>
    <?php	} ?>
    </td>
 </tr>
</table>


        </div>
    </div>
    <?php } ?>

</div>
<script type="text/javascript">

jQuery("document").ready(function($){

 var nav = $('.popup');

 $(window).scroll(function () {
  if ($(this).scrollTop() >= 100) {
   nav.addClass("fix");
  } else {
   nav.removeClass("fix");
  }
 });

});

</script>
    <?php
function c_trang(){
	include"../conn/connect.php";
	$lenh=mysqli_query($conn,"select c_mamonthi from check_tg where taikhoan='$_SESSION[taikhoan]'");
	$arr=mysqli_fetch_array($lenh);
						global $md_check;
						global $t;
						if($md_check=='toan'){
						header('Location: ../thionl/index.php?monthi=toan');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}else if($md_check=='ly'){
						header('Location: ../thionl/index.php?monthi=ly');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}else if($md_check=='hoa'){
						header('Location: ../thionl/index.php?monthi=hoa');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}else if($md_check=='anh'){
						header('Location: ../thionl/index.php?monthi=anh');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}else if($md_check=='sinh'){
						header('Location: ../thionl/index.php?monthi=sinh');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}else if($md_check=='su'){
						header('Location: ../thionl/index.php?monthi=su');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}else if($md_check=='dia'){
						header('Location:../thionl/index.php?monthi=dia');
						setcookie('mamonthi',$arr['c_mamonthi'],time()+8000);
						}
}
?>