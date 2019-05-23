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
		
		// Kiểm tra kết nối
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");
		}
		
		// Kiểm tra thành viên
		if(!isset($_SESSION["matv"])|| $_SESSION["chucvu"]==0){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm tra Request server
		if(isset($_REQUEST["mlao"])){
			$result = sql($cnSQL, "quanlyshop", "Delete From loaiao Where MaLoai=".base64_decode($_REQUEST["mlao"]));
			if(!$result){
				$msg_1 = "Không thể xóa loại này.";	
			}
		}else if(isset($_REQUEST["mlpb"])){
			$result = sql($cnSQL, "quanlyshop", "Delete From phobien Where MaPB=".base64_decode($_REQUEST["mlpb"]));
			if(!$result){
				$msg_2 = "Không thể xóa loại này.";	
			}
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
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
								if($rows[3]=="XoaLoai.php")
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
                    <tr>
                    	<td>
                        	<table width="800">
                            	<tr align="center" bgcolor="#FFFFFF">
                                	<td colspan="3" class="c2">
                                    	<?php echo $msg_1; ?>
                                    </td>
                                </tr>
                            	<tr class="tbl-quantri-midle-right-tblChild-title" height="30" align="center">
                                	<td width="200">Mã loại</td>
                                    <td width="400">Tên loại áo</td>
                                    <td>Chức năng</td>
                                </tr>
                                <?php 
									$result = sql($cnSQL, "quanlyshop", "Select * From loaiao");
									if($result){
										while($rows=mysql_fetch_row($result)){
											echo '<tr class="tbl-quantri-midle-right-tblChild-body" height="20" align="center">';
											echo 	'<td width="200" class="c2">'.$rows[0].'</td>';
											echo 	'<td width="400" class="c2">'.$rows[1].'</td>';
											echo 	'<td class="tbl-quantri-midle-right-tblChild-body-td-click">
														<a href="XoaLoai.php?mlao='.base64_encode($rows[0]).'">Xóa</a>
													</td>';
											echo '</tr>';
										}
									}else{
										$msg = "Lỗi truy xuất dữ liệu.";
									}
								?>
                            </table>
                        </td>
                    </tr>
                    <tr height="30"></tr>
                    <tr>
                    	<td>
                        	<table width="800">
                            	<tr align="center" bgcolor="#FFFFFF">
                                	<td colspan="3" class="c2">
                                    	<?php echo $msg_2; ?>
                                    </td>
                                </tr>
                            	<tr class="tbl-quantri-midle-right-tblChild-title" height="30" align="center">
                                	<td width="200">Mã loại</td>
                                    <td width="400">Tên loại phổ biến</td>
                                    <td>Chức năng</td>
                                </tr>
                                <?php 
									$result = sql($cnSQL, "quanlyshop", "Select * From phobien");
									if($result){
										while($rows=mysql_fetch_row($result)){
											echo '<tr class="tbl-quantri-midle-right-tblChild-body" height="20" align="center">';
											echo 	'<td width="200" class="c2">'.$rows[0].'</td>';
											echo 	'<td width="400" class="c2">'.$rows[1].'</td>';
											echo 	'<td class="tbl-quantri-midle-right-tblChild-body-td-click">
														<a href="XoaLoai.php?mlpb='.base64_encode($rows[0]).'">Xóa</a>
													</td>';
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
</body>
</html>