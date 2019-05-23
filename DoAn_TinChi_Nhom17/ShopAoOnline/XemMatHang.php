<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Style Men</title>
<link href="css/TrangChu.css" type="text/css" rel="stylesheet" rev="stylesheet" />
<script src="js/script.js" language="javascript" type="text/javascript"></script>
</head>

<body>
	<?php 
		session_start();
		// Khởi tạo các biến		
		$cnSQL = @mysql_connect($_SESSION["host"][0], "root", "");
		$msg = "";
		$data = "";
		
		// Kiểm tra kết nối sql server
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/BaoTri.html");
		}
		
		// Kiểm tra biến session
		if(isset($_SESSION["matv"])){
			$_SESSION["thongtin"] = '<a href="Files/ThongTin/XemThongTin.php?posx='.$_SESSION["pos_x"].'">'.$_SESSION["user"].'</a>
									 <ul class="item-hidden">
									 	<li><a href="Files/ThongTin/XemThongTin.php?posx='.$_SESSION["pos_x"].'">'.$_SESSION["tichluy"].' điểm</a></li>
										<li><a href="DangXuat.php">Đăng xuất</a></li>
									 </ul>';
		}
		
		// Kiểm tra biến Request server
		if(isset($_REQUEST["posx"])){
			$_SESSION["pos_x"] = $_REQUEST["posx"];	
		}
		if(isset($_REQUEST["mah"])){
			$result = sql($cnSQL,"quanlyshop","Select mh.*,l.TenLoai 
											   From mathang mh,loaiao l 
											   Where mh.MaMH=".$_REQUEST["mah"].' And mh.MaLoai=l.MaLoai');
			if($result){
				if(!($data=mysql_fetch_array($result))){
					header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php");	
				}
			}else{
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php");	
			}
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
	<div id="wrapper">
    	<div id="banner">
        	<img src="Images Other/Style-Men.png" width="100%" height="300" />
        </div>
        <div id="nav">
        	<ul id="nav-menu">
            	<li><a href="TrangChu.php?reset=1&posx=0&offset=0&page=1">Trang Chủ</a></li>
                <li>
                	<a href="">Loại Áo</a>
                    <ul class="item-hidden">
                    	<?php 
							$result = sql($cnSQL,"quanlyshop","Select * From loaiao");
							if($result){
								while($rows=mysql_fetch_row($result)){
									echo '<li><a href="TrangChu.php?ml='.$rows[0].'">'.$rows[1].'</a></li>';
								}
							}
						?>
                    </ul>
                </li>
                <li>
                	<a href="">Phổ Biến</a>
                    <ul class="item-hidden">
                    	<?php 
							$result = sql($cnSQL,"quanlyshop","Select * From phobien");
							if($result){
								while($rows=mysql_fetch_row($result)){
									echo '<li><a href="TrangChu.php?mpb='.$rows[0].'">'.$rows[1].'</a></li>';
								}
							}
						?>
                    </ul>
                </li>
                <li >
                	<img src="Images Other/search-icon.png" width="40" height="40" style="margin:6px 5px auto 30px;" />
                </li>
                <li><input id="inputSearch" type="text" placeholder="Tìm kiếm theo tên áo ..." size="30" onkeyup="searchSP();" /></li>
              	<li>
                	<a href="TuiHang.php?posx=0">Túi Hàng
						<?php 
							if(!isset($_SESSION["matv"])){
								echo '(0)';
							}else{
								$sl = 0;
								$result = sql($cnSQL,"quanlyshop","Select SoLuong From tuihang Where MaTV=".$_SESSION["matv"]);
								if($result){
									while($rows=mysql_fetch_row($result)){
										$sl += $rows[0];	
									}
									echo '('.$sl.')';
								}else{
									echo '(0)';
								}
							}
						?>
                   	</a>
                </li>
              	<li>
              		<?php echo $_SESSION["thongtin"]; ?>
               	</li>
            </ul>    
      	</div>
      	<div id="midle">
        	<table width="1000" align="center" id="tbl-xem-hang">
            	<tr>
                	<td width="500" valign="top">
                    	<table width="500" id="tbl-xem-hang-c1">
                    		<tr>
                        		<td align="center" colspan="2" class="tbl-title">Thông tin mặt hàng</td>
                        	</tr>
                        	<tr>
                        		<td width="150">Tên áo:</td>
                            	<td ><span style="color:red; font-family:'Courier New', Courier, monospace;font-weight:bold"><?php echo $data[1]; ?></span></td>
                        	</tr>
                        	<tr>
                        		<td width="150">Loại áo:</td>
                            	<td><?php echo $data[11]; ?></td>
                        	</tr>
                        	<tr>
                        		<td width="150">Điểm thưởng:</td>
                            	<td><?php echo '<span style="color:blue;font-weight:bold">'.$data[5].'</span> điểm'; ?></td>
                        	</tr>
                        	<tr>
                        		<td width="150">Giảm giá:</td>
                            	<td><?php echo '<span style="color:red;font-weight:bold">'.$data[8].'</span> %'; ?></td>
                        	</tr>
                        	<tr>
                        		<td valign="top" width="150">Giới thiệu sơ lược:</td>
                            	<td><?php echo $data[10]; ?></td>
                        	</tr>
                    	</table>
                  	</td>
                    <td width="500" valign="top">
                    	<table width="500"id="tbl-xem-hang-c2" height="450">
                        	<tr>
                        		<td align="center" colspan="2" class="tbl-title">Mặt hàng</td>
                        	</tr>
                        	<tr>
                            	<td colspan="2" align="center">
                                	<img src="Images/<?php echo $data[9]; ?>" width="261" height="261" />
                                </td>
                            </tr>
                            <tr>
                            	<td align="right">Giá bán:</td>
                                <td align="left">
									<?php
										if($data[8]>0){
											echo '<span style="text-decoration:line-through;">'.number_format($data[6]).'₫</span>&nbsp;&nbsp;<span style="color:red">'.number_format(intval((($data[6]/100)*$data[8]))).'</span>₫';	
										}else{
											echo '<span style="color:red">'.number_format($data[6]).'</span>₫';	
										}
									?>
                               	</td>
                            </tr>
                            <tr>
                            	<td align="right">Điểm đổi:</td>
                                <td align="left"><?php echo '<span style="color:blue;">'.$data[7].'</span>'; ?></td>
                            </tr>
                            <tr>
                            	<td align="center" colspan="2">
                                	<input type="button" class="btn-Them-vao-tui" onclick="addCart(<?php echo $data[0] ?>)" value="Thêm vào túi" />
                                </td>
                            </tr>
                            <tr height="120">
                            	<td colspan="2" align="right" valign="bottom">
                                	<input type="button" class="btn-Quay-ve" value="Quay về" onclick="window.location.replace('http://<?php echo $_SESSION["host"][1].'/'.$_SESSION["domain"].'/'.$_SESSION["quayve"]; ?>');" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            	<tr>
                	<td colspan="2" style="color:red;font-weight:bold;font-size:20px;"><?php echo $msg; ?></td>
                </tr>
            </table>
      	</div>
      	<div id="footer">
      	</div>
    </div>
    <?php 
		echo '<script>window.scroll(0, 350);</script>';
	?>
</body>
</html>