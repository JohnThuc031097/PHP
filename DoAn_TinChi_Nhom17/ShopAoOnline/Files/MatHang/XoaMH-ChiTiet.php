<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý shop</title>
<link href="../../css/QuanTri.css" type="text/css" rel="stylesheet" rev="stylesheet" />
<style>
.t1{
	color:#F00;
	font-weight:bold;
	text-align:center;
}
</style>
</head>

<body>
	<?php 
		session_start();	
		// Khai báo các biến
		$cnSQL = @mysql_connect($_SESSION["host"][0], 'root', '');
		$_SESSION["quayve"] = "QuanTri.php";
		$msg = "";
		$data = "";
		$offset = 0;
		$page = 0;
		
		// Kiểm tra kết nối sql
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");
		}
		
		// Kiểm tra thành viên
		if(!isset($_SESSION["matv"])|| $_SESSION["chucvu"]==0){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm tra Request
		if(isset($_REQUEST["mamh"])){
			$offset = $_REQUEST["offset"];
			$page = $_REQUEST["page"];
			$result = sql($cnSQL, "quanlyshop", "Select mh.*, l.TenLoai, pb.TenPB 
												 From mathang mh,loaiao l,phobien pb 
												 Where MaMH=".base64_decode($_REQUEST["mamh"])
												 	.' And mh.MaLoai=l.MaLoai And mh.MaPB-pb.MaPB');
			if($result){
				if(!($data=mysql_fetch_array($result))){
					header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/XoaMH.php");
				}
			}else{
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/XoaMH.php");
			}
		}else{
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/XoaMH.php");	
		}
		
		// Kiểm tra nút click Xóa
		if(isset($_POST["btnXoa"])){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/XoaMH.php?mamh=".base64_encode($_POST["txtMaMH"]));	
		}else if(isset($_POST["btnQL"])){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/XoaMH.php?offset=".$_POST["txtOffset"]."&page=".$_POST["txtPage"]);
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form method="post" action="XoaMH-ChiTiet.php">
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
								if($rows[3]=="XoaMH.php")
									$mh = $mh.'<a id="tbl-quantri-left-a-selected" href="'.$rows[3].'">'.$rows[1].'</a></br>';
								else
									$mh = $mh.'<a class="tbl-quantri-midle-left-a" href="'.$rows[3].'">'.$rows[1].'</a></br>';
							}
							if(strpos($rows[3], "Loai")){
								$l = $l.'<a class="tbl-quantri-midle-left-a" href="../Loai/'.$rows[3].'">'.$rows[1].'</a></br>';
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
                    	<td colspan="5">
                        	<table width="800">
                            	<tr bgcolor="#FFFFFF" class="c2">
                                	<td width="150" class="c3">Tên mặt hàng</td>
                                    <td width="200" class="c3">
                                    	<input class="t1" type="text" value="<?php echo $data[1]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                    <td rowspan="9" align="center" valign="top">
                                    	<img src="../../Images/<?php echo $data[9]; ?>" width="261" height="261" />
                                        </br>
                                        <input hidden="true" name="txtMaMH" value="<?php echo $data[0] ?>" />
                                        </br>
                                        <input hidden="true" name="txtOffset" value="<?php echo $offset ?>" />
                                        </br>
                                        <input hidden="true" name="txtPage" value="<?php echo $page ?>" />
                                        </br>
                                        <input class="tbl-quantri-midle-right-tblChild-btn" name="btnXoa" type="submit" value="Xóa mặt hàng">
                                        </br></br></br></br>
                                        <input class="tbl-quantri-midle-right-tblChild-btn" name="btnQL" type="submit" value="Quay lại">
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Loại áo</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[11]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Loại phố biến</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[12]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Số lượng tồn</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[4]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Điểm thưởng</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[5]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Giá bán</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[6]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Số điểm đổi</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[7]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Giảm giá</td>
                                    <td class="c3">
                                    	<input type="text" value="<?php echo $data[8]; ?>" readonly="readonly" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Giới thiệu</td>
                                    <td class="c3">
                                    	<textarea class="c3" cols="35" rows="10" readonly="readonly"><?php echo $data[10]; ?></textarea>
                                    </td>
                                </tr>
                            	<tr align="center" bgcolor="#FFFFFF">
                                	<td colspan="3" class="c2">
                                    	<?php echo $msg; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>           
            </td>         
        </tr>   
    </table>
</form>
</body>
</html>