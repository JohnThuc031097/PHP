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
		$msg = "";
		
		// Kiểm tra kết nối sql
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm tra thành viên
		if(!isset($_SESSION["matv"])|| $_SESSION["chucvu"]==0){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm tra nút click Cấp quyền
		if(isset($_POST["btnCQ"])){
			if($_POST["txtTK"] != ""){
				if($_POST["txtTK"] != $_SESSION["user"] && $_SESSION["chucvu"] == 2){
					$result = sql($cnSQL,"quanlyshop","Select MaTV From thanhvien Where User='".$_POST["txtTK"]."'");
					if($result){
						if($row=mysql_fetch_array($result)){
							$result = sql($cnSQL,"quanlyshop","Update thanhvien 
															   Set Level=".$_POST["cmbCV"]."
															   Where MaTV=".$row[0]);
							if($result){
								$msg = "Cấp quyền thành công.";
							}else{
								$msg = "Cấp quyền thất bại.";	
							}
						}else{
							$msg = "Tên tài khoản sai.";	
						}
					}else{
						$msg = "Lỗi truy xuất database.";
					}
				}else{
					$msg = "User này là VIP, bạn thể thay đổi quyền.";	
				}
			}else{
				$msg = "Bạn chưa nhập tên tài khoản.";
			}
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form action="CapQuyenTV.php" method="post">
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
								$l = $l.'<a class="tbl-quantri-midle-left-a" href="../Loai/'.$rows[3].'">'.$rows[1].'</a></br>';
							}
							if($_SESSION["chucvu"]==2){
								if(strpos($rows[3], "TV")){
									if($rows[3]=="CapQuyenTV.php")
										$tv = $tv.'<a id="tbl-quantri-left-a-selected" href="'.$rows[3].'">'.$rows[1].'</a></br>';
									else
										$tv = $tv.'<a class="tbl-quantri-midle-left-a" href="'.$rows[3].'">'.$rows[1].'</a></br>';
								}
							}
						}
					}
					echo $mh.$l.$tv;
				?>
            </td>          
            <td id="tbl-quantri-midle-right" valign="top">       
            	<table width="800">
                    <tr height="30" bgcolor="#FFFFFF">
                    	<td width="150" class="c3">Tên tài khoản:</td>
                        <td>
                        	<input name="txtTK" type="text" />
                        </td>
                    </tr>
                    <tr height="30" bgcolor="#FFFFFF">
                    	<td width="150" class="c3">Chức vụ:</td>
                        <td>
                        	<select name="cmbCV">
                            	<option value="0">Thành viên</option>
                                <option value="1">Admin</option>
                            </select>
                        </td>
                    </tr>
                    <tr align="center" bgcolor="#FFFFFF">
                    	<td colspan="2" class="c2">
							<?php echo $msg; ?>
                        </td>
                    </tr>
                    <tr height="30" align="right">
                    	<td colspan="2">
                        	<input class="tbl-quantri-midle-right-tblChild-btn" name="btnCQ" type="submit" value="Cấp quyền" />
                        </td>
                    </tr>
                </table>           
            </td>         
        </tr>     
    </table>
<form>
</body>
</html>