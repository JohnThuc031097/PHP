<?php 
	session_start();
	// Hủy tất cả các session và khởi tạo lại 2 biến host và domain
	session_destroy();
	session_start();
	$_SESSION["host"] = array("localhost:3308", "localhost");
	$_SESSION["domain"] = "ShopAoOnline";
	$_SESSION["quayve"] = "TrangChu.php";
	// ------------------------------------------------------------
	header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php");
?>