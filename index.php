<meta charset="utf-8" />
<?php
session_start();
ob_start();
include"conn/connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/web.css"/>
<link rel="stylesheet" type="text/css" href="css/styte.css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<title>web thi online</title>
</head>
<body>
<?php
	if(!isset($_SESSION["taikhoan"])&&(!isset($_COOKIE["user"]) 
	&& !isset($_COOKIE["pwd"])&& !isset($_COOKIE["hoten"])))
	{
		include"include/headed.php";
		include"include/menu.php";
	}else if(isset($_GET['ac'])&&isset($_GET['ac'])=='logout'){
		include"include/headed.php";
		include"include/menu.php";
		unset($_SESSION["taikhoan"]);
		setcookie('user',$_COOKIE["user"],time()-3600*24*30);
		setcookie('pwd',$_COOKIE["pwd"],time()-3600*24*30);
		setcookie('hoten',$_COOKIE["hoten"],time()-3600*24*30);
		header('location:index.php');
		
	}else if(isset($_COOKIE["user"])
	&&isset($_COOKIE["pwd"])
	&&isset($_COOKIE["hoten"]) ){		
		$_SESSION["taikhoan"]=$_COOKIE['user'];
		$_SESSION["hoten"]=$_COOKIE['hoten'];
		include"include/headed1.php";
		include"include/menu.php";
		include"include/popup.php";
	}else if(isset($_SESSION["taikhoan"])
	&&!isset($_COOKIE["user"])
	&&!isset($_COOKIE["pwd"])
	&&!isset($_COOKIE["hoten"])){
		include"include/headed1.php";
		include"include/menu.php";
		include"include/popup.php";
		}
	
	if(isset($_GET['xemkq'])){
				include"include/center.php";
				include"include/sp_dethi.php";
			}
			if(isset($_GET['xembaithi'])){
				include"include/xemdethi.php";
					}
?>
<?php
if(!isset($_GET['monthi']) && !isset($_GET['xemkq']) 
&&!isset($_GET['xembaithi'])&&!isset($_GET['tailieu'])
&&!isset($_GET['lop'])&&!isset($_GET['ten'])){
 	include"page/xuly.php" ;
	}else if(isset($_GET['tailieu'])){
		include"tailieu/noidungtailieu.php";
	}
 ?>
         <div class="content">
			 <?php 
            if(isset($_SESSION["taikhoan"]) && (isset($_GET['monthi'])) ){
             include "include/left.php"; 
			}
             ?>
                <div class="center">
                <?php 
                if(isset($_SESSION["taikhoan"]) &&(isset($_GET['monthi']))){
                include "include/content.php"; 
                }
              ?>
                </div>
         </div>
        <?php
		if(!isset($_GET['monthi'])&&!isset($_GET['xemkq']) && !isset($_GET['xembaithi']) ){
		 //include "include/footed.php"; 
		}else if(isset($_COOKIE['thoigian2'])){
			echo '<div class="footer1"> <h1> ------------ END ------------</h1> </div>';
			}
		 ?> 
         <?php if(isset($_SESSION['taikhoan'])){ ?>
         <div class="chat">
             <span style="text-align:center; position:absolute; margin-left:50px;
             background:#F00; color:#FFF; padding:0px 3px;border-radius:2px 2px 2px 2px;">
            </span>
         <img src="img/iconchat.png" width="70"/>
         </div>
             <div class="khungchat">
             	<div class="dau_chat">
                <span class="nhom_1">Chát nhóm</span>
                	<span class="tat"><i class="fa fa-times" aria-hidden="true"  id="an_icon"></i></span></div>
                <div class="nd_chat"></div>
                <div class="cuoi_chat">
                	<form>
                    	<textarea rows="2" cols="20"id="chat_tn" placeholder="Viết tin nhắn" /></textarea>
                        <input type="button" class="send" value="Send"/>
                    </form>
                </div>
             </div>
         <?php  }?>

             <div class="ht_thognbao">
             	<div class="an"><span style="color:#F00;">x</span></div>
                <div>
                	<div style="float:left; margin-top:-20px; width:80px;height:80px;">
                    <img src="uploads/hien.jpg" style="width:70px; height:70px;"/></div>
                    <div style="text-align:left; padding-left:10px; 
                    font-family:Arial, Helvetica, sans-serif;
                    font-size:14px;margin-top:-10px;" class="tb_tb">
                    </div>
                </div>
             </div>
         <div class="click" style="color:#03F; width:50px; height:30px;
        margin-left:95%; top:85%; position:fixed;text-align:center; cursor:pointer;">
         <img src="img/Scroll to top.gif" width="50px;"/></div>
<script>
$(document).ready(function(){
 
    // hide #back-top first
    $(".click").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.click').fadeIn();
            } else {
                $('.click').fadeOut();
            }
        });
 
        // scroll body to 0px on click
        $('.click').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
 
});

</script> 
<!------------------------>
<!--
<script>
$(document).ready(function(){
$(".an").click(function(){
	var n = $(".ht_thognbao").hide();
	var tb=$(this).text();
		$.get("include/thognbao_tn.php",{tb:tb},function(data){
		});
	});
	setTimeout(function (){
	$('.ht_thognbao').fadeOut(function (){
		 var tb=$(this).text();
			$.get("include/thognbao_tn.php",{tb:tb},function(data){
			});
		 });
	},10000);
});
</script> 
-->
<script>
$(document).ready(function(){
	var url = "include/thongbao.php";
	$(".tb_tb").load(url,function(data){
			if(data==""){
				$(".ht_thognbao").hide();
				}else{
					$(".ht_thognbao").fadeIn("slow");
					}
		});
		$(".an").click(function(){
		var n = $(".ht_thognbao").hide();
		var tb=$(this).text();
		$.get("include/thognbao_tn.php",{tb:tb},function(data){
		});
	});
		setTimeout(function (){
		$('.ht_thognbao').fadeOut(function (){
		var tb=$(this).text();
			$.get("include/thognbao_tn.php",{tb:tb},function(data){
			});
		 });
		},10000);
});
</script> 
<!--------icon thoogn báo lỗi---------->
<script>
	$(document).ready(function() {
        $(".icon_loi").click(function(){
			$(".sp_loi").show("slow");
			});
		 $("#an_icon").click(function(){
			$(".sp_loi").hide("slow");
			});
		$("#submit").click(function(){
			var ch= $("#c_hoi").val();
			var md= $("#m_de").val();
			var yk= $("#ykien").val();
			$.post("include/ajax_xl_dethi.php",{dapanloi:ch ,madeloi:md,ykien:yk},function(data){
					$("#c_hoi").val("");
					$("#m_de").val("");
					$("#ykien").val("");
					$(".tb_submit").html("Cảm ơn bạn đã phản hồi.");
					setTimeout(function(){
						$(".sp_loi").hide("slow");
						$(".tb_submit").html("");
					},2000);
				});

			});
    });
</script>
<!------------------------------------>
<script>
$(document).ready(function() {
    $(".chat").click(function(){
			$(".khungchat").show();
			setInterval( function(){ $('.nd_chat').load('include/load_chat.php',function(){
				$(".nd_chat").scrollTop($(".nd_chat")[0].scrollHeight);
				}); }, 1000 );
		});
	$(".tat").click(function(){
			$(".khungchat").hide();
		})
    $(".send").click(function(){
		var n = $("#chat_tn").val();
			$.post("include/chat.php",{nd_chat_tn:n},function(data){
			$("#chat_tn").val("");
			});
			//setInterval( function(){ $('.nd_chat').load('include/load_chat.php',function(){
			//	$(".nd_chat").scrollTop($(".nd_chat")[0].scrollHeight);
			//	}); }, 1000 );
	});
	$('#chat_tn').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
			var n = $("#chat_tn").val();
			$.post("include/chat.php",{nd_chat_tn:n},function(data){
			$("#chat_tn").val("");
			});
			setInterval( function(){ $('.nd_chat').load('include/load_chat.php',function(){
				$(".nd_chat").scrollTop($(".nd_chat")[0].scrollHeight);
				}); }, 1000 );
		}
	});
});
</script>
<!------------------------->

<!------------------------->
</body>
</html>