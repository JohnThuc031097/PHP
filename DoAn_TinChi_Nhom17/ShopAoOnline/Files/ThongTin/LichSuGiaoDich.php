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
	
	// Kiểm tra kết nối
	if(!$cnSQL){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
	}
	
	// Kiểm tra session
	if(!isset($_SESSION["InfoDB"])){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);	
	}
	
	// Kiểm tra Quay về
	if(isset($_POST["btnQV"])){
		unset($_SESSION["InfoDB"]);
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
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
                        	<p class="tbl-info-nav"><a href="DoiMatKhau.php">Đổi mật khẩu</a></p>
                        </td>
                        <td class="tbl-info-header" width="200">
                        	<p class="tbl-info-nav"><a href="LichSuGiaoDich.php" style="color:#FF0">Lịch sử giao dịch</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="10"></tr>
        <tr>
        	<td colspan="2">
            	<table width="800">
                	<tr height="50" align="center">
                    	<td class="tbl-info-title" width="80">Ngày GD</td>
                        <td class="tbl-info-title" width="250">Tên mặt hàng</td>
                        <td class="tbl-info-title" width="50">Số lượng</td>
                        <td class="tbl-info-title" width="80">Tồng</td>
                    </tr>
                    <?php 
						if($cnSQL){
							$result = sql($cnSQL, "quanlyshop", "Select ls.*,mh.TenMH
																 From lichsugd ls, mathang mh
																 Where ls.MaTV=".$_SESSION["InfoDB"][0].' And
																 	   mh.MaMH=ls.MaMH');
							if($result){
								$none = '<tr height="50" align="center" bgcolor="#FFFFFF"><td colspan="6">Bạn chưa có thực hiện cuộc giao dịch nào trên shop <blink style="color:red"/>StyleMen.com</blink></td></tr>';
								$lichsu = '';
								while($rows=mysql_fetch_array($result)){
									$ngay = explode("-", $rows[1]);
									$lichsu = $lichsu.
										'<tr height="30" align="center">
											<td style="background-color:#F2F2F2;">'.$ngay[2].'-'.$ngay[1].'-'.$ngay[0].'</td>
									 		<td style="background-color:#F2F2F2;" align="center"><span style="color:red;font-weight:bold;"/>'.$rows[6].'</span></td>
									 		<td style="background-color:#F2F2F2;" align="center">'.$rows[4].'</td>
									 		<td style="background-color:#F2F2F2;"><span style="color:blue;"/>'.number_format($rows[5]).'</span>₫</td>
										</tr>';
								}
								if($lichsu!="")
									echo $lichsu;
								else
									echo $none;
							}else{
								header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
							}
						}else{
							header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
						}
					?>
                </table>
            </td>
        </tr>
        <tr height="20"></tr>
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
        </tr>
    </table>
</form>
</body>
</html>