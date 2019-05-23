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
		$total_mh = 0;
		
		// Kiểm tra kết nối sql server
		if(!$cnSQL){
			header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/BaoTri.html");
		}
		
		// Kiểm tra Request server
		if(isset($_REQUEST["reset"])){
			unset($_SESSION["loaiao"],$_SESSION["loaipb"],$_SESSION["tenmh"],$_SESSION["strDK"]);
		}
		
		// Kiểm tra biến session
		if(!isset($_SESSION["pos_x"])){
			$_SESSION["pos_x"] = 0;
		}
		if(!isset($_SESSION["offset-page"])){
			$_SESSION["offset-page"] = array(0,1);
		}
		if(isset($_SESSION["matv"])){
			$_SESSION["quayve"] = "TrangChu.php";
			$_SESSION["thongtin"] = '<a href="Files/ThongTin/XemThongTin.php?posx='.$_SESSION["pos_x"].'">'.$_SESSION["user"].'</a>
									 <ul class="item-hidden">
									 	<li><a href="Files/ThongTin/XemThongTin.php?posx='.$_SESSION["pos_x"].'">'.$_SESSION["tichluy"].' điểm</a></li>
										<li><a href="DangXuat.php">Đăng xuất</a></li>
									 </ul>';
		}
		if(!isset($_SESSION["thongtin"])){
			$_SESSION["thongtin"] = '<a href="DangNhap.php">Đăng Nhập</a>';
		}
		
		// Kiểm tra Request server
		if(isset($_REQUEST["ml"])){
			$_SESSION["loaiao"] = $_REQUEST["ml"];
		}else if(isset($_REQUEST["mpb"])){
			$_SESSION["loaipb"] = $_REQUEST["mpb"];
		}
		
		// Kiểm tra nút click Search
		if(isset($_POST["btnSearch"])){
			$_SESSION["tenmh"] = $_POST["txtSearch"];	
		}
		
		// Kiểm tra biến session
		if(isset($_SESSION["loaiao"]) || isset($_SESSION["loaipb"]) || isset($_SESSION["tenmh"])){
			$_SESSION["strDK"] = "";
			if(isset($_SESSION["loaiao"])){
				if($_SESSION["strDK"]==""){
					$_SESSION["strDK"] = " MaLoai=".$_SESSION["loaiao"];
				}else{
					$_SESSION["strDK"] = " MaLoai=".$_SESSION["loaiao"].' And '.$_SESSION["strDK"];
				}	
			}
			if(isset($_SESSION["loaipb"])){
				if($_SESSION["strDK"]==""){
					$_SESSION["strDK"] = " MaPB=".$_SESSION["loaipb"];	
				}else{
					$_SESSION["strDK"] = " MaPB=".$_SESSION["loaipb"].' And '.$_SESSION["strDK"];		
				}
			}
			if(isset($_SESSION["tenmh"])){
				if($_SESSION["strDK"]==""){
					$_SESSION["strDK"] = " TenMH like '%".$_SESSION["tenmh"]."%'";
				}else{
					$_SESSION["strDK"] = " TenMH like '%".$_SESSION["tenmh"]."%'".' And '.$_SESSION["strDK"];		
				}
			}
		}
		
		// Kiểm tra Request server
		if(isset($_REQUEST["posx"])){
			$_SESSION["pos_x"] = $_REQUEST["posx"];	
		}
		if(isset($_REQUEST["addcard"])){
			if(!isset($_SESSION["matv"])){
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/DangNhap.php");
			}else{
				$result = sql($cnSQL,"quanlyshop","Select SoLuong 
										   	   	   From tuihang 
										       	   Where MaTV=".$_SESSION["matv"]." And 
												   		 MaMH=".$_REQUEST["addcard"]);
				if($result){
					$sl = "";
					if(!($sl=mysql_fetch_array($result))){
						$result = sql($cnSQL,"quanlyshop","Insert Into tuihang(MaMH,MaTV,SoLuong) 
												   	   	   Values(".$_REQUEST["addcard"].",
												   		      	  ".$_SESSION["matv"].",1)"); 
					}else{
						$result = sql($cnSQL,"quanlyshop","Update tuihang 
												   		   Set SoLuong=".($sl[0]+1)." 
												   		   Where MaMH=".$_REQUEST["addcard"]." And
														   		 MaTV=".$_SESSION["matv"]);
					}
				}
				header("Location:http://".$_SESSION["host"][1]."/".$_SESSION["domain"]."/TrangChu.php?reset=1");
			}
		}
		if(isset($_REQUEST["offset"])){
			$_SESSION["offset-page"] = array($_REQUEST["offset"],$_REQUEST["page"]);
		}
		
		// Hàm truy vấn sql
		function sql($cn, $db, $sql){
			mysql_select_db($db, $cn);
			mysql_query("set names utf8", $cn);
			return mysql_query($sql, $cn);	
		}
	?>
<form id="frmTrangChu" action="TrangChu.php" method="post">
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
                <li>
                	<input id="btnSearch" name="btnSearch" type="submit" value="Search" style="border:0px;border-radius:20px;background-color:#666;color:#FFF;padding:10px 10px 10px 10px;width:100px;" />
                	<input id="inputSearch" name="txtSearch" type="text" placeholder="Tìm kiếm theo tên áo ..." size="30" />
                </li>
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
        	<div id="midle-left-right">
            <table>
        	<?php 
				$strDK = "";
				if(isset($_SESSION["strDK"])){
					$strDK = "Select * From mathang Where ".$_SESSION["strDK"]." limit ".$_SESSION["offset-page"][0].",12";
				}else{
					$strDK = "Select * From mathang limit ".$_SESSION["offset-page"][0].",12";	
				}
				$result = sql($cnSQL, "quanlyshop",$strDK);
				$i = 0;
				if($result){
					while($rows=mysql_fetch_row($result)){
						if($i==0){
							echo '<tr>';
						}
						echo '<td class="a1">
								<table width="300">
									<tr align="center">
										<td colspan="2"><blink style="color:red;font-weight:bold;">'.$rows[1].'</blink></td>
									</tr>
									<tr>
										<td colspan="2">
											<img class="img-item" src="Images/'.$rows[9].'" width="280" height="261" />
										</td>
									</tr>';
									
						$sale = "";
						if($rows[8]>0){
							$sale = '<span style="text-decoration:line-through;">'.number_format($rows[6]).'₫</span>
									&nbsp;&nbsp;
									<span style="color:red">'.number_format(intval((($rows[6]/100)*$rows[8]))).'</span>';	
						}else{
							$sale = '<span style="color:red">'.number_format($rows[6]).'</span>';	
						}
						
						echo 		'<tr align="center">
										<td width="80">Giá bán:</td>
										<td align="left">'.$sale.'₫</td>
									</tr>';
						echo 		'<tr align="center">
										<td width="80">Điểm đổi:</td>
										<td align="left"><span style="color:blue;">'.$rows[7].'</span></td>
									</tr>';
						echo 		'<tr>
										<td align="right" width="130">
											<input class="btn-Them" type="button" value="Thêm vào túi" onclick="addCart('.$rows[0].');" />
										</td>
										<td align="left">
											<input class="btn-Xem" type="button" value="Xem mặt hàng" onclick="redictXH('.$rows[0].')" />
										</td>
									</tr>';
						echo 	'</table>
							 </div></td>';
						if($i==3){
							echo '</tr>';
							$i = -1;
						}
						$i++;
					}
					if(mysql_num_rows($result)%2!=0){
						echo '</tr>';
					}
					$total_mh = mysql_num_rows(sql($cnSQL, "quanlyshop", $strDK));	
				}
			?>  
            </table>
            </div>     
        </div>
        <div id="pagination">
        	<table width="100%" align="right">
            	<tr height="50" align="right"><td>
            	<?php 
					if($total_mh>0){
						$c = 0;
						for($i=0;$i<$total_mh/11;$i++){
							if(($i+1)==$_SESSION["offset-page"][1]){
								echo '<input class="btn-PageCrr" type="button" value="'.($i+1).'" onclick="redictPage('.($i+$c).','.($i+1).');" />&nbsp;&nbsp;';
							}else{
								echo '<input class="btn-Page" type="button" value="'.($i+1).'" onclick="redictPage('.($i+$c).','.($i+1).');" />&nbsp;&nbsp;';
							}
							$c += 11;
						}
					}
				?>
                </td></tr>
         	</table>
        </div> 
        <div id="footer">
        </div>
    </div>
</form>
    <?php 
		echo '<script>window.scroll(0, '.$_SESSION["pos_x"].');</script>';
	?>
</body>
</html>