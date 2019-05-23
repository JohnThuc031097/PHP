<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thông tin cá nhân</title>
<link href="../../css/TrangChu.css" type="text/css" rel="stylesheet" rev="stylesheet" />
</head>

<body>
<?php 
	session_start();
	// Khai báo các biến
	$cnSQL = @mysql_connect($_SESSION["host"][0], "root", "");
	$error = "";
	$pass_0 = "";
	$pass_1 = "";
	$pass_2 = "";
	$tl = "";
	
	// Kiểm tra kết nối sql
	if(!$cnSQL){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
	}
	
	// Kiểm tra session
	if(!isset($_SESSION["InfoDB"])){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);	
	}
	
	// Kiểm tra nút cllck Quay về
	if(isset($_POST["btnQV"])){
		unset($_SESSION["InfoDB"]);
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
	}else if(isset($_POST["btnLuu"])){
		if($_POST["txtMKC"] != ""){
			$pass_0 = $_POST["txtMKC"];
			if($_POST["txtMKM_1"] != "" && $_POST["txtMKM_2"] != ""){
				$pass_1 = $_POST["txtMKM_1"];
				$pass_2 = $_POST["txtMKM_2"];
				if($pass_1 == $pass_2){
					if($pass_0 == $_SESSION["InfoDB"][2]){
						$result = sql($cnSQL, "quanlyshop", "Update thanhvien Set Pass=N'".$pass_2."' Where MaTV=".$_SESSION["InfoDB"][0]);
						if($result){
							$error = "Đổi mật khẩu thành công.";
						}else{
							$error = "Đổi mật khẩu thất bại";
						}
					}else{
						$error = "Mật khẩu cũ sai.";
					}
				}else{
					$error = "Mật khẩu mới nhập lần 2 không trùng với mật khẩu mới.";
				}
			}else{
				$error = "Bạn chưa nhập mật khẩu mới.";
			}
		}else{
			$error = "Bạn chưa nhập mật khẩu cũ.";
		}	
	}
	
	// Hàm truy vấn sql
	function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
	}
?>
<form action="DoiMatKhau.php" method="post">
	<div id="wrapper">
    	<div id="banner">
        	<img src="../../Images Other/Style-Men.png" width="100%" height="300" />
        </div>
        <div id="nav">
        	<ul id="nav-menu">
            	<li><a href="TrangChu.php?reset=1&posx=0&offset=0&page=1">Trang Chủ</a></li>
            </ul>     
      </div>
	<table id="tbl-info" width="800"align="center">
    	<tr height="50">
        	<td align="left">
            </td>
            <td align="right" >
            	<?php echo 'ID:&nbsp;<blink style="color:blue">'.$_SESSION["InfoDB"][1].'</blink>&nbsp; Điểm thưởng:&nbsp;<blink style="color:blue">'.$_SESSION["InfoDB"][4].'</blink>'; ?>&nbsp;&nbsp;
            	<a class="tbl-info-btn"  href="../../DangNhap.php">Đăng xuất</a>
            </td>
        </tr>
        <tr height="30">
        	<td colspan="2">
            	<table width="800" align="center">
                	<tr height="30" align="center">
                    	<td class="tbl-info-header" width="200">
                        	<p class="tbl-info-nav"><a href="XemThongTin.php">Thông tin</a></p>
                        </td>
                        <td class="tbl-info-header" width="200">
                        	<p class="tbl-info-nav"><a href="DoiMatKhau.php" style="color:#FF0">Đổi mật khẩu</a></p>
                        </td>
                        <td class="tbl-info-header" width="200">
                        	<p class="tbl-info-nav"><a href="LichSuGiaoDich.php">Lịch sử giao dịch</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="30"></tr>
        <tr height="20" >
        	<td class="tbl-info-midle-left-td" width="200" >Mật khẩu cũ:</td>
            <td>
            	<input name="txtMKC" type="text" value="<?php echo $pass_0; ?>" size="30" />
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="200" class="c3">Mật khẩu mới:</td>
            <td>
            	<input name="txtMKM_1" type="text" value="<?php echo $pass_1; ?>" size="30" />
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="200" >Nhập lại mật khẩu mới:</td>
            <td>
            	<input name="txtMKM_2" type="text" value="<?php echo $pass_2; ?>" size="30" />
            </td>
        </tr>
        <tr height="30"></tr>
        <tr bgcolor="#FFFFFF" align="center">
        	<td colspan="2">
            	<?php echo $error; ?>
            </td>
        </tr>
        <tr height="30">
        	<td id="tbl-info-footer-left" width="120">
                <input class="tbl-info-btn" name="btnQV" type="submit" value="Quay về" />
            </td>
            <td id="tbl-info-footer-right" align="right">
            	<input class="tbl-info-btn" name="btnLuu" type="submit" value="Lưu thay đổi" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>