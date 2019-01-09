<?php session_start();
include"../conn/connect.php";
$ndchat=$_POST['nd_chat_tn'];
$ten=$_SESSION['taikhoan'];
$lenh=mysqli_query($conn,"insert into chat(id_chat,taikhoan,nd_chat,check_view) 
						value('','$ten','$ndchat','1')");
?>