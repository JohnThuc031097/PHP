<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
<link href="css/TrangChu.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php 
		session_start();
		// Hủy tất cả các session và khởi tạo lại
		session_destroy();
		session_start();
		$_SESSION["host"] = array("localhost:3308", "localhost");
		$_SESSION["domain"] = "ShopAoOnline";
		$_SESSION["quayve"] = "TrangChu.php";
		// ------------------------------------------------------------
		
		// Khởi tạo các biến
		$cnSQL = @mysql_connect($_SESSION["host"][0], 'root', '');
		$error = "";
		
		// Kiểm tra kết nối sql server
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/BaoTri.html");
		}
		
		// Kiểm tra nút click Đăng Nhập
		if(isset($_POST["btnDN"])){
			if(trim($_POST["txtTK"])!=""){
				if(trim($_POST["txtMK"])!=""){
					if(isset($_POST["chkGN"])){
						setcookie("user", trim($_POST["txtTK"]), time()+500);
					}
					if($cnSQL){
						$result = sql($cnSQL, "quanlyshop", "Select * From thanhvien Where User='".trim($_POST["txtTK"])."' And Pass='".trim($_POST["txtMK"])."'");
						if($result){
							if($rows=mysql_fetch_array($result)){
								$_SESSION["matv"] = $rows[0];
								$_SESSION["user"] = $rows[1];
								$_SESSION["pass"] = $rows[2];
								$_SESSION["chucvu"] = $rows[3];
								$_SESSION["tichluy"] = $rows[4];
								if($rows[3]==0){
									$_SESSION["quayve"] = "TrangChu.php";
									header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php");
								}else{	
									$_SESSION["quayve"] = "QuanTri.php";								
									header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/QuanTri.php");
								}
							}else{
								$error = "Tài khoản hoặc mật khẩu sai.";
							}
						}else{
							$error = "Lỗi truy xuất database.";	
						}
					}else{
						$error = "Lỗi kết nối sql server.";
					}
				}else{
					$error = "Bạn chưa nhập mật khẩu.";
				}
			}else{
				$error = "Bạn chưa nhập tài khoản.";
			}	
		}else if(isset($_POST["btnDK"])){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/ThongTin/DangKi.php");
		}else if(isset($_POST["btnTC"])){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangXuat.php");
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form action="DangNhap.php" method="post">
	<div id="wrapper">
    	<div id="banner">
        	<img src="Images Other/Style-Men.png" width="100%" height="300" />
        </div>
        <div id="nav">
        	<ul id="nav-menu">
            	<li><a href="TrangChu.php?reset=1&posx=0&offset=0&page=1">Trang Chủ</a></li>
            </ul>      
      </div>
      <table id="tbl-login" width="500" align="center">
      	<tr height="50" align="center">
            <td  id="tbl-login-header" colspan="2">Đăng Nhập</td>
       	</tr>
        <tr height="50"></tr>
           <tr height="30">
           <td width="150" class="tbl-login-midle-left-td">Tên tài khoản:</td>
           <td align="center">
              <input name="txtTK" type="text" value="<?php echo isset($_COOKIE["user"])?$_COOKIE["user"]:""; ?>" size="20" />
           </td>
      	</tr>
        <tr height="30">
            <td class="tbl-login-midle-left-td" width="150">Mật khẩu:</td>
            <td align="center">
               <input name="txtMK" type="password" size="20" />
            </td>
        </tr>
        <tr height="30">
           <td width="150"></td>
           <td align="left" style="padding-left:50px;">
               <input name="chkGN" type="checkbox" />Lưu tài khoản
           </td>
        </tr>
        <tr align="left" bgcolor="#FFFFFF">
           <td colspan="2">
               <?php echo $error; ?>
           </td>
        </tr>
        <tr height="20"></tr>
        <tr height="30">
            <td id="tbl-login-footer-left" width="200">
                <input class="tbl-login-btn" name="btnTC" type="submit" value="Quay về" />
            </td>
           	<td id="tbl-login-footer-right" align="right">    
                <input class="tbl-login-btn" name="btnDK" type="submit" value="Đăng kí" />&nbsp;
                <input class="tbl-login-btn" name="btnDN" type="submit" value="Đăng nhập" />
            </td>
        </tr>
       </table> 
    </div>
</form>
</body>
</html>