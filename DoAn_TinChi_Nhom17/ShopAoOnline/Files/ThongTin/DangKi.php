<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng kí tài khoản</title>
<link href="../../css/TrangChu.css" type="text/css" rel="stylesheet" rev="stylesheet" />
</head>

<body>
<?php 
	session_start();
	
	$cnSQL = @mysql_connect($_SESSION["host"][0], "root", "");
	$_SESSION["quayve"] = "DangNhap.php";
	$msg = "";
	$data = array("","","","","","","");
	$data[4] = array(0,0,0);
	$ma_tv = "";

	if(!$cnSQL){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);
	}
	
	if(isset($_POST["btnQV"])){
		header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/".$_SESSION["quayve"]);	
	}else if(isset($_POST["btnDK"])){
		$data = array($_POST["txtTK"], 
					  $_POST["txtMK"],
					  $_POST["txtHoTen"],
					  $_POST["cmbGT"], 
					  array($_POST["cmbNam"],$_POST["cmbThang"],$_POST["cmbNgay"]),
					  $_POST["txtDT"],
					  $_POST["txtDC"]);
		if(trim($data[0])!=""){
			if(trim($data[1])!=""){
				if(trim($data[2])!=""){
					if(is_numeric(trim($data[5]))){
						if(trim($data[6])!=""){
							$result = sql($cnSQL,"quanlyshop","Select MaTV From thanhvien Where User='".$data[0]."'");
							if($result && !($row=mysql_fetch_array($result))){
								$result = sql($cnSQL, "quanlyshop", "Insert Into thanhvien(User,Pass) 
																	 Values('".$data[0]."',
																	 		'".$data[1]."')");
								if($result){
									$result=sql($cnSQL,"quanlyshop","Select MaTV From thanhvien Where User='".$data[0]."'");
									if($result && ($ma_tv=mysql_fetch_array($result))){
										$result = sql($cnSQL, "quanlyshop", "Insert Into thongtintk(HoTen,
																									GioiTinh,
																									NgaySinh,
																									Sdt,
																									DiaChi,
																									MaTV)
																		 	 Values(N'".$data[2]."',
																		 		      ".$data[3].",
																	'".$data[4][0]."-".$data[4][1]."-".$data[4][2]."',
																				      ".$data[5].",
																					N'".$data[6]."',
																		 		      ".$ma_tv[0].")");
										if($result){
											$_SESSION["quayve"] = "TrangChu.php";
											$_SESSION["matv"] = $ma_tv[0];
											$_SESSION["user"] = $data[0];
											$_SESSION["pass"] = $data[1];
											$_SESSION["chucvu"] = 0;
											$_SESSION["tichluy"] = 0;
											header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/ThongTin/XemThongTin.php");	
										}else{
											$msg = "Lỗi thêm thông tin (tài khoản đã được tạo, bạn có thể đăng nhập và thêm  thông tin phần sau)";
										}	
									}else{
										$msg = "Lỗi truy vấn sql.";
									}
								}else{
									$msg = "Lỗi thêm tài khoản.";
								}
							}else{
								$msg = "Tên tài khoản bạn nhập đã tồn tại.";
							}
						}else{
							$msg = "Bạn chưa nhập địa chỉ";
						}
					}else{
						$msg = "Kiểu số điện thoại bạn nhập không hợp lệ.";
					}
				}else{
					$msg = "Bạn chưa nhập họ tên.";
				}
			}else{
				$msg = "Bạn chưa nhập mật khẩu.";	
			}
		}else{
			$msg = "Bạn chưa nhập tên tài khoản.";
		}		
	}


	function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
	}
?>
<form action="DangKi.php" method="post">
	<div id="wrapper">
    	<div id="banner">
        	<img src="../../Images Other/Style-Men.png" width="100%" height="300" />
        </div>
        <div id="nav">
        	<ul id="nav-menu">
            	<li><a href="TrangChu.php?reset=1&posx=0&offset=0&page=1">Trang Chủ</a></li>
            </ul>      
      </div>
	<table id="tbl-reg" width="500"align="center">
    	<tr height="50" bgcolor="#286BE8" align="center">
        	<td id="tbl-login-header" colspan="2">Đăng kí tài khoản</td>
        </tr>
        <tr height="30"></tr>
        <tr height="20">
        	<td class="tbl-login-midle-left-td" width="150">Tên tài khoản:</td>
            <td>
            	<input name="txtTK" type="text" value="<?php echo $data[0]; ?>" size="15" />
            </td>
        </tr>
        <tr height="20" bgcolor="#FFFFFF">
        	<td class="tbl-login-midle-left-td" width="150">Mật khẩu:</td>
            <td>
            	<input class="c2" name="txtMK" type="password" value="<?php echo $data[1]; ?>" size="15" />
            </td>
        </tr>
        <tr height="20" bgcolor="#FFFFFF">
        	<td class="tbl-login-midle-left-td" width="150">Họ tên:</td>
            <td>
            	<input class="c2" name="txtHoTen" type="text" value="<?php echo $data[2]; ?>" size="32" />
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-login-midle-left-td">Giới tính:</td>
            <td>
            	<select name="cmbGT" class="c2">
                	<option value="0" <?php ($data[3]==0?"selected":""); ?>>Nữ</option>
                    <option value="1" selected>Nam</option>
                </select>
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-login-midle-left-td">Ngày sinh:</td>
            <td>
            	<select name="cmbNgay" class="c2">
                	<?php 
						for($i=1;$i<32;$i++){
							if($data[4][2]==$i)
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							else
								echo '<option value="'.$i.'">'.$i.'</option>';	
						}
					?>
                </select>&nbsp;
                <select name="cmbThang" class="c2">
                	<?php 
						for($i=1;$i<13;$i++){
							if($data[4][1]==$i)
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							else
								echo '<option value="'.$i.'">'.$i.'</option>';	
						}
					?>
                </select>&nbsp;
                <select name="cmbNam" class="c2">
                	<?php 
						for($i=1975;$i<2025;$i++){
							if($data[4][0]==$i)
								echo '<option value="'.$i.'" selected>'.$i.'</option>';
							else
								echo '<option value="'.$i.'">'.$i.'</option>';	
						}
					?>
                </select>
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-login-midle-left-td">Số điện thoại:</td>
            <td>
            	<input name="txtDT" type="text" value="<?php echo $data[5]; ?>" size="20" />
            </td>
        </tr>
        <tr height="30" bgcolor="#FFFFFF">
        	<td class="tbl-login-midle-left-td">Địa chỉ:</td>
            <td>
            	<textarea name="txtDC" cols="34" rows="5"><?php echo $data[6]; ?></textarea>
            </td>
        </tr>
        <tr height="30"></tr>
        <tr bgcolor="#FFFFFF" align="center">
        	<td colspan="2">
            	<?php echo $msg; ?>
            </td>
        </tr>
        <tr height="30">
        	<td id="tbl-reg-footer-left">
                <input class="tbl-reg-btn" name="btnQV" type="submit" value="Quay về" />
            </td>
            <td id="tbl-reg-footer-right" align="right">
            	<input class="tbl-reg-btn" name="btnDK" type="submit" value="Đăng kí" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>