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
		$offset = 0;
		$page = 1;
		$total = 0;
		
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
			$result = sql($cnSQL, "quanlyshop", "Delete From mathang Where MaMH=".base64_decode($_REQUEST["mamh"]));
			if(!$result){
				$msg = "Xóa mặt hàng thất bại.";	
			}else{
				unlink("../../Images/".$_SESSION["img_xoamh"]);
				unset($_SESSION["img_xoamh"]);	
			}
		}
		if(isset($_REQUEST["offset"])){
			$offset = $_REQUEST["offset"];
			$page = $_REQUEST["page"];
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
                            	<tr align="center" bgcolor="#FFFFFF">
                                	<td colspan="3" class="c2">
                                    	<?php echo $msg; ?>
                                    </td>
                                </tr>
                            	<tr class="tbl-quantri-midle-right-tblChild-title" height="30" align="center">
                                	<td width="300">Tên mặt hàng</td>
                                    <td width="261">Tên loại áo</td>
                                    <td>Chức năng</td>
                                </tr>
                                <?php
									$total = mysql_num_rows(sql($cnSQL, "quanlyshop", "Select MaMH From mathang")); 
									$result = sql($cnSQL, "quanlyshop", "Select MaMH,TenMH,Hinh 
																		 From mathang 
																		 limit ".($offset).",2");
									if($result){
										while($rows=mysql_fetch_row($result)){
											$_SESSION["img_xoamh"] = $rows[2];
											echo '<tr class="tbl-quantri-midle-right-tblChild-body" height="20" align="center">';
											echo 	'<td width="300" class="c2" style="color:red;font-weight:bold;">'.$rows[1].'</td>';
											echo 	'<td width="261" class="c2">
														<img src="../../Images/'.$rows[2].'" width="261" height="261"/>
													</td>';
											echo 	'<td class="tbl-quantri-midle-right-tblChild-body-td-click">
														<a href="XoaMH-ChiTiet.php?mamh='.base64_encode($rows[0]).'&offset='.$offset.'&page='.$page.'">Xem chi tiết</a>
														&nbsp;&nbsp;
														<a href="XoaMH.php?mamh='.base64_encode($rows[0]).'">Xóa</a>
													</td>';
											echo '</tr>';
										}
									}else{
										$msg = "Lỗi truy xuất dữ liệu.";
									}
								?>
                                <tr align="right" bgcolor="#FFFFFF">
                                	<td colspan="3" class="c2-2">
                                    	<?php 
											$c = 0;
											for($i=0; $i<$total/2; $i++){
												if(($i+1)==$page)
													echo '<a href="XoaMH.php?offset='.($i+$c).'&page='.($i+1).'"><blink style="color:red">'.($i+1).'</blink></a>&nbsp;';	
												else
													echo '<a href="XoaMH.php?offset='.($i+$c).'&page='.($i+1).'">'.($i+1).'</a>&nbsp;';
												$c++;
											}
										?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>           
            </td>         
        </tr>   
    </table>
</body>
</html>