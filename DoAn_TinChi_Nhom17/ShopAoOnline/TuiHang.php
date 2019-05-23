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
		
		// Kiểm tra kết nối sql
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/BaoTri.html");
		}
	
		// Kiểm tra biến session
		if(isset($_SESSION["matv"])){
			$_SESSION["quayve"] = "TuiHang.php";
			$_SESSION["thongtin"] = '<a href="Files/ThongTin/XemThongTin.php?posx='.$_SESSION["pos_x"].'">'.$_SESSION["user"].'</a>
									 <ul class="item-hidden">
									 	<li><a href="Files/ThongTin/XemThongTin.php?posx='.$_SESSION["pos_x"].'">'.$_SESSION["tichluy"].' điểm</a></li>
										<li><a href="DangXuat.php">Đăng xuất</a></li>
									 </ul>';
		}else{
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php?reset=1");	
		}
		
		// Kiểm tra biến Request server
		if(isset($_REQUEST["posx"])){
			$_SESSION["pos_x"] = $_REQUEST["posx"];	
		}
		if(isset($_REQUEST["cn"])){
			if($_REQUEST["cn"]=="0"){
				$result = sql($cnSQL,"quanlyshop","Update tuihang
												   Set SoLuong=".$_REQUEST["sl"].",
												   	   LoaiGia=".$_REQUEST["lg"]."
												   Where MaTH=".$_REQUEST["math"]);
				if(!$result){
					$msg = "Cập nhật túi hàng thất bại.";
					header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TuiHang.php?posx=0");
				}
			}else{
				$result = sql($cnSQL,"quanlyshop","Delete From tuihang Where MaTH=".$_REQUEST["math"]);
				if(!$result){
					$msg = "Xóa túi hàng thất bại.";
					header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TuiHang.php?posx=0");	
				}
			}
		}
		
		// Kiểm tra nút click Thanh Toán
		if(isset($_POST["btnThanhToan"])){
			$count = mysql_num_rows(sql($cnSQL,"quanlyshop","Select MaTH From tuihang"));
			if($count==0)
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php");	
			$result = sql($cnSQL,"quanlyshop","Select mh.*,th.* 
											   From tuihang th,mathang mh 
											   Where th.MaTV=".$_SESSION["matv"]." And
													 th.SoLuong<=mh.SoLuong And
													 th.MaMH=mh.MaMH");
			if($result){
				$ngay = date("Y-m-d");
				$data_mh = array();
				$tichluy = $_SESSION["tichluy"];
				while($rows=mysql_fetch_row($result)){	
					if($rows[15]==0){
						$gia = 0;
						if($rows[8]>0)
							$gia = intval(($rows[6]/100)*$rows[8])*$rows[14];
						else{
							$gia = ($rows[6]*$rows[14]);
							
						}
						array_push($data_mh, array($rows[0], $rows[14], $ngay, $gia, $_SESSION["matv"], $rows[4], $rows[14],$rows[5]));
					}else{
						$diemht = ($rows[7]*$rows[14]);
						if($tichluy>=$diemht){
							array_push($data_mh, array($rows[0], $rows[14], $ngay, $diemht, $_SESSION["matv"], $rows[4], $rows[14],$rows[5]));
							$tichluy -= $diemht;
						}
					}
				}
				for($i=0;$i<count($data_mh);$i++){
					$result = sql($cnSQL,"quanlyshop","Insert Into lichsugd(MaMH,
																			SoLuong,
																			NgayGD,
																			TongTien,
																			MaTV)
																Values(".$data_mh[$i][0].",
																   	   ".$data_mh[$i][1].",
																	  '".$data_mh[$i][2]."',
																	   ".$data_mh[$i][3].",
																	   ".$data_mh[$i][4].")");
					if($result){
						$result = sql($cnSQL,"quanlyshop","Delete From tuihang 
														   Where MaMH=".$data_mh[$i][0]." And
															  	 MaTV=".$data_mh[$i][4]);
						if($result){
							$result = sql($cnSQL,"quanlyshop","Update thanhvien 
																	   Set TichLuy=".$_SESSION["tichluy"].'
																	   Where MaTV='.$_SESSION["matv"]);
							if($result){
								$result = sql($cnSQL,"quanlyshop","Update mathang
																   Set SoLuong=".($data_mh[$i][5]-$data_mh[$i][6])."
																   Where MaMH=".$data_mh[$i][0]);
								if($result){
									$tichluy += $data_mh[$i][7];
								}
							}
						}
							
					}
				}
				$_SESSION["tichluy"] = $tichluy;
				$_SESSION["InfoDB"] = array($_SESSION["matv"],
											$_SESSION["user"],
											$_SESSION["pass"],
											$_SESSION["chucvu"],
											$_SESSION["tichluy"]);
				$_SESSION["thongtin"] = 
					'<a href="Files/ThongTin/XemThongTin.php">'.$_SESSION["user"].'</a>
						<ul class="item-hidden">
							<li><a href="Files/ThongTin/XemThongTin.php">'.$_SESSION["tichluy"].' điểm</a></li>
							<li><a href="DangXuat.php">Đăng xuất</a></li>
						</ul>'; 
				$result_th_rest = mysql_num_rows(sql($cnSQL,"quanlyshop","Select MaTH 
																		  From tuihang 
																		  Where MaTV=".$_SESSION["matv"]));
				if($result_th_rest==0){
					$msg = 'Giao dịch thành công ! Nhân viên của chúng tôi sẽ ship áo đến nhà bạn trong chốc lát, để kiểm tra lại giao dịch bạn có thể vào phần <span style="font-weight:bold; color:blue">Xem Thông Tin Tài Khoản</span> chọn mục <span style="font-weight:bold; color:blue">Lịch sử giao dịch</span> để xem chi tiết. Cám ơn bạn đã mua hàng online trên <span style="font-weight:bold;color:red;font-style:italic;">StyleMen.com</span>';
				}else{
					$msg = 'Có <span style="font-weight:bold; color:red">'.$result_th_rest.'</span> đơn hàng chưa được thanh toán, rất có thể đơn hàng bạn chọn <span style="font-weight:bold; color:red">Số lượng tồn kho</span> đã hết, hoặc đơn hàng bạn chọn mua không đủ <span style="font-weight:bold; color:red">Điểm tích lũy</span> để đổi mặt hàng, <span style="font-weight:bold; color:red">mời bạn xem lại</span>. Xin cám ơn !';	
				}
			}	
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form id="frmTuiHang" action="TuiHang.php" method="post" >
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
        	<table width="100%" id="tbl-TuiHang" align="center">
            	<tr>
                	<td colspan="7" style="font-size:20px;"><?php echo $msg; ?></td>
                </tr>
                <tr align="left">
                	<td colspan="7">
                    	<?php 
							$result = sql($cnSQL,"quanlyshop","Select mh.*,th.* 
															   From tuihang th,mathang mh 
															   Where th.MaTV=".$_SESSION["matv"]." And
																	 th.MaMH=mh.MaMH");
							if($result){
								$tongtien = 0;
								$diemthuong = 0;
								$diemtra = 0;
								$soluong = 0;
								while($rows=mysql_fetch_row($result)){
									if($rows[15]==0){
										if($rows[8]>0)
											$tongtien += intval(($rows[6]/100)*$rows[8])*$rows[14];
										else
											$tongtien += $rows[6]*$rows[14];
									}else{
										$diemtra += $rows[7]*$rows[14];
									}
									$diemthuong += $rows[5]*$rows[14];
									$soluong += $rows[14];
								}
								echo 'Tổng số lượng:&nbsp;<span style="font-weight:bold; color:blue">'.$soluong.'</span>&nbsp;&nbsp;&nbsp;
									  Tổng tiền:&nbsp;<span style="color:red;font-weight:bold;">'.number_format($tongtien).'</span>₫&nbsp;&nbsp;&nbsp;
									  Tổng điểm trả:&nbsp;<span style="font-weight:bold; color:blue">'.$diemtra.'</span>&nbsp;&nbsp;&nbsp;
									  Tổng điểm thưởng:&nbsp;<span style="font-weight:bold; color:blue">'.$diemthuong.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									  <input name="btnThanhToan" class="btn-thanh-toan" type="submit" value="Thanh Toán">';
							}
						?>
                    </td>
                </tr>
            	<?php 
					$result = sql($cnSQL,"quanlyshop","Select mh.*,th.SoLuong,th.LoaiGia,th.MaTH
													   From tuihang th,mathang mh
													   Where th.MaTV=".$_SESSION["matv"]." And
													   		 th.MaMH=mh.MaMH");
					if($result){
						echo '<tr align="center" class="tbl-title">';
						echo 	'<td width="250">Tên hàng</td>';
						echo 	'<td width="261">Ảnh</td>';
						echo 	'<td width="80">Sô lượng</td>';
						echo 	'<td width="80">Giá tiền</td>';
						echo 	'<td width="80">Giá điểm</td>';
						echo 	'<td width="100">Loại thanh toán</td>';
						echo 	'<td width="200">Chức năng</td>';
						echo '</tr>';
						while($rows=mysql_fetch_row($result)){
							echo '<tr align="center">';
							echo 	'<td class="tbl-tenhang">'.$rows[1].'</td>';
							echo 	'<td>
								  		<img src="Images/'.$rows[9].'" width="261" height="261" />
								  	</td>';
							echo 	'<td>
								  		<input name="txtSL-'.$rows[13].'" style="text-align:center;" size="5" type="text" value="'.$rows[11].'" size="10">
								  	</td>';
							$gia = "";
							if($rows[8]>0)
								$gia = '<p style="text-decoration:line-through;">'.number_format($rows[6]).'₫</p>
										<span style="color:red">'.number_format(intval((($rows[6]/100)*$rows[8]))).'</span>';
							else
								$gia = '<span style="color:red">'.number_format($rows[6]).'</span>';
							echo 	'<td>'.$gia.'₫</td>';
							echo 	'<td><span style="color:blue;">'.$rows[7].'<span></td>';
							echo 	'<td>
								  		<select name="cmbGia-'.$rows[13].'">
											<option value="0" selected>Tiền mặt</option>
											<option value="1" '.($rows[12]==1?"selected":"").'>Điểm tích lũy</option>
										</select>
								  	</td>';
							echo 	'<td>
								  		<p>
											<input type="button" class="tbl-btn-capnhat" value="Cập nhật" onclick="redictTH('.$rows[13].',0)" />
										</p>
										<p>
											<input type="button" class="tbl-btn-xoa" value="Xóa hàng" onclick="redictTH('.$rows[13].',1)"/>
										</p>
										<p>
											<input type="button" class="tbl-btn-xem-hang" value="Xem hàng" onclick="redictXH('.$rows[0].')"/>
										</p>
								  	</td>';
							echo '</tr>';
						}	
					}
				?>
            </table>
      	</div>
      	<div id="footer">
      	</div>
    </div>
<form>
    <?php 
		echo '<script>window.scroll(0, '.$_SESSION["pos_x"].');</script>';
	?>
</body>
</html>