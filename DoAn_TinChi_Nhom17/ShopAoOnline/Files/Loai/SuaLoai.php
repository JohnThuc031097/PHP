<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý shop</title>
<link href="../../css/QuanTri.css" type="text/css" rel="stylesheet" rev="stylesheet" />
</head>

<body>
	<?php 
		session_start();	
		// Khai báo các biến
		$cnSQL = @mysql_connect($_SESSION["host"][0], 'root', '');
		$_SESSION["quayve"] = "QuanTri.php";
		$msg_1 = "";
		$msg_2 = "";
		
		// Kiểm tra kết nối sql
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");
		}
		
		// Kiểm tra thành viên
		if(!isset($_SESSION["matv"])|| $_SESSION["chucvu"]==0){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm nút click Sửa
		if(isset($_POST["btnCPAo"])){
			if(trim($_POST["txtTenLoai"]) != ""){
				$result = sql($cnSQL, "quanlyshop", "Update loaiao 
													 Set TenLoai=N'".$_POST["txtTenLoai"]."' 
													 Where MaLoai=".$_POST["cmbTenLoai"]);
				if($result){
					$msg_1 = "Cập nhật thành công.";
				}else{
					$msg_1 = "Cập nhật thất bại.";	
				}
			}else{
				$msg_1 = "Bạn chưa nhập tên áo.";
			}
		}else if(isset($_POST["btnCPPB"])){
			if(trim($_POST["txtTenPB"]) != ""){
				$result = sql($cnSQL, "quanlyshop", "Update phobien 
													 Set TenPB=N'".$_POST["txtTenPB"]."' 
													 Where MaPB=".$_POST["cmbTenPB"]);
				if($result){
					$msg_1 = "Cập nhật thành công.";
				}else{
					$msg_1 = "Cập nhật thất bại.";	
				}				
			}else{
				$msg_2 = "Bạn chưa nhập tên phồ biến.";
			}
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form action="SuaLoai.php" method="post">
	<table id="tbl-quantri" width="1000" align="center">
    	<tr height="50" align="center">
        	<td id="tbl-quantri-header" colspan="2">Quản lý shop</td>
        </tr>
        <tr height="30">
        	<td id="tbl-quantri-nav-left" width="150" align="left">
            	<?php echo 'ID:&nbsp;<blink style="color:red;font-weight:bold;"/>'.$_SESSION["user"]; ?>
            </td>
            <td id="tbl-quantri-nav-right" align="right">
            	<a href="../../DangXuat.php">Đăng xuất</a>
            </td>
        </tr>
        <tr>
        	<td id="tbl-quantri-midle-left" valign="top">
            	<?php 
					$mh = "<p>Mặt hàng</p>";
					$l = "<p>Loại</p>";
					$tv = "<p>Thành viên</p>";
					$result = sql($cnSQL, "quanlyshop", "Select * From chucvu");
					if($result){
						while($rows=mysql_fetch_row($result)){
							if(strpos($rows[3], "MH")){
								$mh = $mh.'<a class="tbl-quantri-midle-left-a" href="../MatHang/'.$rows[3].'">'.$rows[1].'</a></br>';
							}
							if(strpos($rows[3], "Loai")){
								if($rows[3]=="SuaLoai.php")
									$l = $l.'<a id="tbl-quantri-left-a-selected" href="'.$rows[3].'">'.$rows[1].'</a></br>';
								else
									$l = $l.'<a class="tbl-quantri-midle-left-a" href="'.$rows[3].'">'.$rows[1].'</a></br>';
							}
							if($_SESSION["chucvu"]==2){
								if(strpos($rows[3], "TV")){
									$tv = $tv.'<a class="tbl-quantri-midle-left-a" href="../ThanhVien/'.$rows[3].'">'.$rows[1].'</a></br>';
								}
							}
						}
					}
					echo $mh.$l.$tv;
				?>
            </td>           
            <td id="tbl-quantri-midle-right" valign="top">       
            	<table width="800">
                    <tr height="30" bgcolor="#FFFFFF" align="center">
                    	<td width="80" class="c3">Chọn loại:</td>
                        <td width="100">
                        	<?php 
								$result = sql($cnSQL, "quanlyshop", "Select * From loaiao");
								if($result){
									echo '<select name="cmbTenLoai">';
									while($rows=mysql_fetch_row($result)){
										echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';	
									}
									echo '</select>';
								}else{
									$msg_1 = "Lỗi truy xuất dữ liệu.";
								}
							?>
                        </td>
                        <td width="80" class="c3">Tên mới:</td>
                        <td width="100" class="c3">
                        	<input name="txtTenLoai" type="text" />
                        </td>
                        <td>
                        	<input class="tbl-quantri-midle-right-tblChild-btn" name="btnCPAo" type="submit" value="Cập nhật" />
                        </td>
                    </tr>
                    <tr align="center" bgcolor="#FFFFFF">
                    	<td colspan="5" class="c2">
							<?php echo $msg_1; ?>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="5">
                        	<table width="800">
                            	<tr class="tbl-quantri-midle-right-tblChild-title" height="30" align="center">
                                	<td width="200">Mã loại</td>
                                    <td>Tên loại áo</td>
                                </tr>
                                <?php 
									$result = sql($cnSQL, "quanlyshop", "Select * From loaiao");
									if($result){
										while($rows=mysql_fetch_row($result)){
											echo '<tr class="tbl-quantri-midle-right-tblChild-body" height="20" align="center">';
											echo 	'<td width="200" class="c2">'.$rows[0].'</td>';
											echo 	'<td >'.$rows[1].'</td>';
											echo '</tr>';
										}
									}else{
										$msg = "Lỗi truy xuất dữ liệu.";
									}
								?>
                            </table>
                        </td>
                    </tr>
                    <tr height="20"></tr>
                    <tr height="30" bgcolor="#FFFFFF" align="center">
                    	<td width="80" class="c3">Chọn loại:</td>
                        <td width="100">
                        	<?php 
								$result = sql($cnSQL, "quanlyshop", "Select * From phobien");
								if($result){
									echo '<select name="cmbTenPB">';
									while($rows=mysql_fetch_row($result)){
										echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';	
									}
									echo '</select>';
								}else{
									$msg_1 = "Lỗi truy xuất dữ liệu.";
								}
							?>
                        </td>
                        <td width="80" class="c3">Tên mới:</td>
                        <td width="100" class="c3">
                        	<input name="txtTenPB" type="text" />
                        </td>
                        <td>
                        	<input class="tbl-quantri-midle-right-tblChild-btn" name="btnCPPB" type="submit" value="Cập nhật" />
                        </td>
                    </tr>
                    <tr align="center" bgcolor="#FFFFFF">
                    	<td colspan="5" class="c2">
							<?php echo $msg_2; ?>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="5">
                        	<table width="800">
                            	<tr class="tbl-quantri-midle-right-tblChild-title" height="30" align="center">
                                	<td width="200">Mã loại</td>
                                    <td>Tên loại phổ biến</td>
                                </tr>
                                <?php 
									$result = sql($cnSQL, "quanlyshop", "Select * From phobien");
									if($result){
										while($rows=mysql_fetch_row($result)){
											echo '<tr class="tbl-quantri-midle-right-tblChild-body" height="20" align="center">';
											echo 	'<td width="200" class="c2">'.$rows[0].'</td>';
											echo 	'<td >'.$rows[1].'</td>';
											echo '</tr>';
										}
									}else{
										$msg = "Lỗi truy xuất dữ liệu.";
									}
								?>
                            </table>
                        </td>
                    </tr>
                </table>           
            </td>         
        </tr>   
    </table>
<form>
</body>
</html>