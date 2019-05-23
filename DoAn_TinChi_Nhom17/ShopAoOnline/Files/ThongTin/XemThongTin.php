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
	$gioitinh = "";
	$ngay = "";
	$sdt = "";
	$diachi = "";
	$hoten = "";
	
	// Kiểm tra kết nối sql
	if(!$cnSQL){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
	}
	
	// Kiểm tra biến session
	if(isset($_SESSION["InfoDB"])){
	}else if(isset($_REQUEST["data"])){
		$data = explode("^", base64_decode($_REQUEST["data"]));
		$_SESSION["InfoDB"] = array($data[0],$data[1],$data[2],$data[3],$data[4]);					
	}else {
		if(isset($_SESSION["matv"])){
			$_SESSION["InfoDB"] = array($_SESSION["matv"],
										$_SESSION["user"],
										$_SESSION["pass"],
										$_SESSION["chucvu"],
										$_SESSION["tichluy"]);
		}else{
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);	
		}
	}
	
	// Kiểm tra nút click Quay về
	if(isset($_POST["btnQV"])){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);	
	}else if(isset($_POST["btnLuu"])){
			if($_POST["txtHoTen"] != ""){
				if(trim($_POST["txtDT"]) != ""){
					if($_POST["txtDC"] != ""){
						$result = sql($cnSQL, "quanlyshop", "Update thongtintk Set HoTen=N'".$_POST["txtHoTen"]
																			   ."',GioiTinh=".$_POST["cmbGT"]
																			   .",NgaySinh='".$_POST["cmbNam"]
																						."-".$_POST["cmbThang"]
																						."-".$_POST["cmbNgay"]
																			   ."',Sdt=".trim($_POST["txtDT"])
																			   .",DiaChi=N'".$_POST["txtDC"]
															."' Where MaTV=".$_SESSION["InfoDB"][0]);
						if($result){
							$error = "Lưu thành công !";
						}else{
							$error = "Lưu thất bại.";	
						}
					}else{
						$error = "Bạn chưa nhập địa chỉ.";
					}	
				}else{
					$error = "Bạn chưa nhập số điên thoại.";
				}
			}else{
				$error = "Bạn chưa nhập họ tên.";
			}		
	}
	
	// Load thông tin thành viên
	if($cnSQL){
		$result = sql($cnSQL, "quanlyshop", "Select * From thongtintk Where MaTV=".$_SESSION["InfoDB"][0]);
		if($result){
			if($rows=mysql_fetch_array($result)){
				$hoten = $rows[1];
				$gioitinh = $rows[2];
				$ngay = explode('-', $rows[3]);
				$sdt = $rows[4];
				$diachi = $rows[5];			
			}else{
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
			}
		}else{
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
		}
	}else{
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
	}
	
	// Hàm truy vấn sql
	function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
	}
?>
<form action="XemThongTin.php" method="post">
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
                        	<p class="tbl-info-nav"><a href="XemThongTin.php" style="color:#FF0">Thông tin</a></p>
                        </td>
                        <td class="tbl-info-header" width="200">
                        	<p class="tbl-info-nav"><a href="DoiMatKhau.php">Đổi mật khẩu</a></p>
                        </td>
                        <td class="tbl-info-header" width="200">
                        	<p class="tbl-info-nav"><a href="LichSuGiaoDich.php">Lịch sử giao dịch</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="30"></tr>
        <tr height="20" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="120">Họ tên:</td>
            <td>
            	<input class="c2" name="txtHoTen" type="text" value="<?php echo $hoten; ?>" size="30" />
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="120">Giới tính:</td>
            <td>
            	<select name="cmbGT">
                	<option value="0" <?php ($gioitinh==0?"selected":""); ?>>Nữ</option>
                    <option value="1" selected>Nam</option>
                </select>
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="120">Ngày sinh:</td>
            <td>
            	<select name="cmbNgay" >
                	<?php 
						for($i=1;$i<32;$i++){
							if($ngay[2]==$i)
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							else
								echo '<option value="'.$i.'">'.$i.'</option>';	
						}
					?>
                </select>&nbsp;
                <select name="cmbThang" >
                	<?php 
						for($i=1;$i<13;$i++){
							if($ngay[1]==$i)
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							else
								echo '<option value="'.$i.'">'.$i.'</option>';	
						}
					?>
                </select>&nbsp;
                <select name="cmbNam" >
                	<?php 
						for($i=1975;$i<2025;$i++){
							if($ngay[0]==$i)
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							else
								echo '<option value="'.$i.'">'.$i.'</option>';	
						}
					?>
                </select>
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="120" >Số điện thoại:</td>
            <td>
            	<input name="txtDT" type="text" value="<?php echo $sdt; ?>" size="30" />
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-info-midle-left-td" width="120" >Địa chỉ:</td>
            <td>
            	<textarea name="txtDC" cols="52" rows="5"><?php echo $diachi; ?></textarea>
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