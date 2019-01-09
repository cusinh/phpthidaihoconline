<?php
if(isset($_POST['submit'])){
	header('location:index.php?id=noidung');
	$madethi=$_POST['madethi'];
	$chonmadethi=$_POST['chonmadethi'];
	$thoigian=$_POST['thoigian'];
	$socau=$_POST['socau'];
	setcookie('madethi',$madethi,time()+3600);
	setcookie('mamonthi',$chonmadethi,time()+3600);
	setcookie('thoigian',$thoigian,time()+3600);
	setcookie('socau',$socau,time()+3600);
	$lenh1=mysqli_query($conn,"insert into dethi(madethi,mamonthi,thoigian) value ('$madethi','$chonmadethi','$thoigian')");
	}
?>
<div style=""><h1><i class="fa fa-pencil" aria-hidden="true"></i> Tạo đề thi:</h1>
<table align="center">
<form method="post"> 
	<table>
    	<tr >
        	<th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập mã đề thi</th>
            <td> <input type="text" name="madethi" placeholder="nhập mã đề thi" /></td>
        </tr>
    	<tr>
        	<th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập mã môn thi</th>
            <td>
            <select  name="chonmadethi">
				<?php
                $lenh=mysqli_query($conn,"select mamonthi from monthi");
                while($array1=mysqli_fetch_array($lenh)){
                echo $mamonthi=$array1['mamonthi'];
                echo '<option value="'.$mamonthi.'" name="chonmadethi">'.$mamonthi.'</option>';
                    }
                
                ?>
             </select>
            </td>
        </tr>
    	<tr>
        	<th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập thời gian</th>
            <td><input type="number" name="thoigian" placeholder="nhập thời gian"/></td>
        </tr>
         <tr>
        	<th><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Nhập số câu</th>
            <td><input type="number" name="socau" placeholder="nhập số câu"/></td>
        </tr>
            <th colspan="2" align="center" class="sub"><input type="submit" name="submit" value="Tạo"/></th>
            <th></th>
        </tr>
    </table>
</form>
</table>
</div>