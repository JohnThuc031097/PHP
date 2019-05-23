<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
	<?php
		session_start();
		// Khởi tạo 3 biến dùng chung cho cả website
		$_SESSION["host"] = array("localhost:3308", "localhost");
		$_SESSION["domain"] = "ShopAoOnline";
		$_SESSION["quayve"] = "TrangChu.php";
		// Chuyển hướng vào trang chủ
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php");
	?>
</body>
</html>