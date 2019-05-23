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
<script src="../../js/jquery.js" language="javascript" type="text/javascript"></script>
<script src="../../js/script.js" language="javascript" type="text/javascript"></script>
</head>

<body>
	<?php 
		session_start();	
		// Khai báo các biến
		$cnSQL = @mysql_connect($_SESSION["host"][0], 'root', '');
		$_SESSION["quayve"] = "QuanTri.php";
		$msg = "";
		$offset = 0;
		$page = 1;
		
		// Kiểm tra kết nối sql
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");
		}
		
		// Kiểm tra thành viên
		if(!isset($_SESSION["matv"])|| $_SESSION["chucvu"]==0){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");	
		}
		
		// Kiểm tra Request server
		if(isset($_REQUEST["mamh"])){
			$_SESSION["offset_page"] = array($_REQUEST["offset"],$_REQUEST["page"]);
			$result = sql($cnSQL, "quanlyshop", "Select *
												 From mathang
												 Where MaMH=".base64_decode($_REQUEST["mamh"]));
			if($result){
				if(!($_SESSION["data"]=mysql_fetch_array($result))){
					header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/SuaMH.php");
				}
			}else{
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/SuaMH.php");
			}
		}else{
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/SuaMH.php");
		}
		
		// Kiểm tra nút click Cập nhật
		if(isset($_POST["btnCN"])){
			$_SESSION["data"] = array($_POST["txtMaMH"],
									  $_POST["txtTenMH"],
									  $_POST["cmbLoai"],
									  $_POST["cmbPB"],
									  $_POST["txtSoLuong"],
									  $_POST["txtDiemThuong"], 
									  $_POST["txtGiaA"],
									  $_POST["txtGiaB"],
									  $_POST["txtSale"],
									  $_SESSION["data"][9],
									  $_POST["txtGioiThieu"]);
			if(trim($_POST["txtTenMH"])!=""){
				if(is_numeric(trim($_POST["txtSoLuong"]))){
					if(is_numeric(trim($_POST["txtDiemThuong"]))){
						if(is_numeric(trim($_POST["txtGiaA"]))){
							if(is_numeric(trim($_POST["txtGiaB"]))){
								if(is_numeric(trim($_POST["txtSale"]))){
									if(trim($_POST["txtGioiThieu"])!=""){
										$pathImg = "";
										if($_FILES["pFile"]!=null && $_FILES["pFile"]["name"]!=""){
											unlink("../../Images/".$_SESSION["data"][9]);
											$pathImg = $_FILES["pFile"]["name"];
										}else{
											$pathImg = $_SESSION["data"][9];
										}
										if($pathImg != ""){
											$_SESSION["data"][9] = $pathImg;
											$result = sql($cnSQL, "quanlyshop", "Update mathang
																				 Set TenMH=N'".$_SESSION["data"][1]."',
																				 	 MaLoai=".$_SESSION["data"][2].",
																					 MaPB=".$_SESSION["data"][3].",
																					 SoLuong=".$_SESSION["data"][4].",
																					 DiemThuong=".$_SESSION["data"][5].",
																					 GiaA=".$_SESSION["data"][6].",
																					 GiaB=".$_SESSION["data"][7].",
																					 Sale=".$_SESSION["data"][8].",
																					 Hinh='".$_SESSION["data"][9]."',
																					 GioiThieu=N'".$_SESSION["data"][10]."' 
																				 Where MaMH=".$_SESSION["data"][0]
																					
														   );
											if($result){
												move_uploaded_file($_FILES["pFile"]["tmp_name"], "../../Images/".$_SESSION["data"][9]);
												$msg = "Cập nhật thành công.";
											}else{
												$msg = "Cập nhật thất bại.";	
											}
										}else{
											$msg = "Bạn chưa chọn file ảnh.";	
										}
									}else{
										$msg = "Bạn chưa nhập phần giới thiệu.";
									}
								}else{
									$msg = "Kiểu sale bạn nhập không đúng.";
								}
							}else{
								$msg = "Kiểu giá điểm bạn nhập không đúng.";
							}
						}else{
							$msg = "Kiểu giá tiền bạn nhập không đúng.";
						}
					}else{
						$msg = "Kiểu điểm thưởng bạn nhập không đúng.";
					}
				}else{
					$msg = "Kiểu số lượng bạn nhập không đúng.";	
				}
			}else{
				$msg = "Bạn chưa nhập tên mặt hàng.";	
			}
		}else if(isset($_POST["btnQL"])){
			unset($_SESSION["offset_page"],$_SESSION["data"]);
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/Files/MatHang/SuaMH.php?offset=".$_POST["txtOffset"]."&page=".$_POST["txtPage"]);
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form method="post" action="SuaMH-ChiTiet.php" enctype="multipart/form-data">
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
								if($rows[3]=="SuaMH.php")
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
                                    	<input class="t1" name="txtTenMH" type="text" value="<?php echo $_SESSION["data"][1]; ?>"  size="34"  />
                                    </td>
                                    <td rowspan="9" align="center" valign="top">
                                    	<img id="imgHinh" src="../../Images/<?php echo $_SESSION["data"][9]; ?>" width="261" height="261" />
                                        </br>
                                        <input type="file" name="pFile" id="pFile" accept="image/*" onchange="readURL(this, 'imgHinh');" />
                                        </br>
                                        <input hidden="true" name="txtMaMH" value="<?php echo $_SESSION["data"][0]; ?>" />
                                        </br>
                                        <input hidden="true" name="txtOffset" value="<?php echo $_SESSION["offset_page"][0]; ?>" />
                                        </br>
                                        <input hidden="true" name="txtPage" value="<?php echo $_SESSION["offset_page"][1]; ?>" />
                                        </br>
                                        <input class="tbl-quantri-midle-right-tblChild-btn" name="btnCN" type="submit" value="Cập nhật">
                                        </br></br>
                                        <input class="tbl-quantri-midle-right-tblChild-btn" name="btnQL" type="submit" value="Quay lại">
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Loại áo</td>
                                    <td class="c3">
                                    	<?php 
											$result = sql($cnSQL, "quanlyshop", "Select * From loaiao");
											if($result){
												echo '<select name="cmbLoai">';
												while($rows=mysql_fetch_row($result)){
													if($_SESSION["data"][2]==$rows[0])
														echo '<option value="'.$rows[0].'" selected>'.$rows[1].'</option>';
													else
														echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';
												}
												echo '</select>';
											}
										?>
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Loại phố biến</td>
                                    <td class="c3">
                                    	<?php 
											$result = sql($cnSQL, "quanlyshop", "Select * From phobien");
											if($result){
												echo '<select name="cmbPB">';
												while($rows=mysql_fetch_row($result)){
													if($_SESSION["data"][3]==$rows[0])
														echo '<option value="'.$rows[0].'" selected>'.$rows[1].'</option>';
													else
														echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';
												}
												echo '</select>';
											}
										?>
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Số lượng tồn</td>
                                    <td class="c3">
                                    	<input type="text" name="txtSoLuong" value="<?php echo $_SESSION["data"][4]; ?>" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Điểm thưởng</td>
                                    <td class="c3">
                                    	<input type="text" name="txtDiemThuong" value="<?php echo $_SESSION["data"][5]; ?>" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Giá bán</td>
                                    <td class="c3">
                                    	<input type="text" name="txtGiaA" value="<?php echo $_SESSION["data"][6]; ?>" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Số điểm đổi</td>
                                    <td class="c3">
                                    	<input type="text" name="txtGiaB" value="<?php echo $_SESSION["data"][7]; ?>" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Giảm giá</td>
                                    <td class="c3">
                                    	<input type="text" name="txtSale" value="<?php echo $_SESSION["data"][8]; ?>" size="34"  />
                                    </td>
                                </tr>
                                <tr bgcolor="#FFFFFF" class="c2">
                                	<td class="c3">Giới thiệu</td>
                                    <td class="c3">
                                    	<textarea class="c3" name="txtGioiThieu" cols="35" rows="10" ><?php echo $_SESSION["data"][10]; ?></textarea>
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