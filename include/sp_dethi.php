<?php 
echo	'<div class="icon_loi"><img src="img/icon_baoloi.png" width="50" height="50" /></div>
		<div class="sp_loi">
		<span class="tb_submit" style="text-align:center;color:#0f6;">
		</span><span><i class="fa fa-times" aria-hidden="true"  id="an_icon"></i><span>
		<form method="POST" action="index.php?xemkq">
		<table>
		<th>Báo lỗi đề thi</th>
		<tr>
		<td><input type="text" name="dapanloi" placeholder="Nhập câu hỏi" id="c_hoi"/><td>
		</tr>
		<tr>
		<td><input type="text" name="madeloi" placeholder="Nhập mã đề" id="m_de"/></td>
		</tr>
		<tr>
		<td><textarea maxlength"500" name="ykien" placeholder="Ý kiến khác" id="ykien"></textarea></td>
		</tr>
		<tr>
		<td><input type="button" name="submit" value="Báo cáo" id="submit"/></td>
		</tr>
		</table>
		</form>
		</div>';
?>
