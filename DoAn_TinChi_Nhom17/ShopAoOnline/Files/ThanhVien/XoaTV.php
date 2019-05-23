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
		if(!isset($_SESSION["matv"]) || $_SESSION["chucvu"]==0){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm tra Request sql
		if(isset($_REQUEST["data"])){
			$result = sql($cnSQL, "quanlyshop", "Delete From thanhvien Where MaTV=".base64_decode($_REQUEST["data"]));	
			if($result){
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/ThanhVien/XoaTV.php");
			}else{
				$msg = "Xóa thất bại.";	
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
								$l = $l.'<a class="tbl-quantri-midle-left-a" href="../Loai/'.$rows[3].'">'.$rows[1].'</a></br>';
							}
							if($_SESSION["chucvu"]==2){
								if(strpos($rows[3], "TV")){
									if($rows[3]=="XoaTV.php")
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
                    <?php 
						$result = sql($cnSQL, "quanlyshop", "Select * From thanhvien");
						if($result){
							echo '<tr class="tbl-quantri-midle-right-tblChild-title" height="30">';
							echo 	'<td width="200" align="center">Username</td>';
							echo 	'<td width="200" align="center">Password</td>';
							echo 	'<td align="center">Thông tin</td>';
							echo '</tr>';
							while($rows=mysql_fetch_row($result)){
								echo '<tr class="tbl-quantri-midle-right-tblChild-body" height="30" align="center">';
								echo 	'<td width="200">'.$rows[1].'</td>';
								echo 	'<td width="200">'.$rows[2].'</td>';
								echo 	'<td class="tbl-quantri-midle-right-tblChild-body-td-click" align="center">';
								if($rows[3]!=2)
									echo '<a href="XoaTV.php?data='.base64_encode($rows[0]).'">Xóa</a>';
								echo	'</td>';
								echo '</tr>';
							}	
						}
					?>
                    <tr align="center">
                    	<td colspan="3"><?php $msg; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>