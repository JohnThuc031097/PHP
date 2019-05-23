<?php 
    include ('../../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../../logout.php');
    }
    connectSQL();
	if(!checkConnectSQL()) header('Location: ../../error.php');
	$result_account = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
	if(!$result_account) header('Location: ../../logout.php');
	$_SESSION['vnd'] = $result_account->fetch_assoc()['VND'];
	include ('../../lib/CheckBuy.php');
	include ('../../lib/CheckActivationKey.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="unsafe-url">
	<title>Thuê Vn-Hax VIP</title>
	<link rel="alternate" hreflang="x-default" href="buy.php">
	<link rel="alternate" hreflang="en" href="buy.php">
	<link rel="icon" href="../../img/favicons/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="../../img/favicons/apple-touch-icon-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="120x120"
		href="../../img/favicons/apple-touch-icon-120x120-precomposed.png">
	<meta name="description" content="Mua hack SkyHT-Hax, thanh toán bằng thẻ cào hoặc chuyển khoản ngân hàng">
	<link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/site.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
		rel="stylesheet">
	<link href="../../assets/2eaecd09/css/activeform.min.css" rel="stylesheet">
</head>

<body itemscope itemtype="http://schema.org/WebPage" class="body-light">
	<div class="wrap">
		<nav id="w0" class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button><a class="navbar-brand" href="../../index.php">
						<span class="brand-clr">SKYHT - HAX</span></a>
				</div>
				<div id="w0-collapse" class="collapse navbar-collapse">
					<ul id="w1" class="navbar-nav navbar-right nav">
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span
									class="caret"></span></a>
							<ul id="w2" class="dropdown-menu">
								<li>
									<a href="skyht_hax.php" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/lock-icon-blue.png" alt="SkyHT-Hax"></div>
											<div>
												<h5>SkyHT-Hax</h5>
												<p>Bản hack hỗ trợ đa số đối tượng</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Hỗ trợ <span
									class="caret"></span></a>
							<ul id="w5" class="dropdown-menu">
								<li>
									<a target='_blank' href="https://www.facebook.com/SkyhtHackCF" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/mail-icon-green.png"
													alt="Contact Information">
											</div>
											<div>
												<h5>Liên hệ </h5>
												<p>Fanpage Facebook</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a target='_blank' href="https://www.facebook.com/groups/169672007162583"
										tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/community-icon-green.png" alt="Community">
											</div>
											<div>
												<h5>Cộng đồng</h5>
												<p>Group facebook</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li><a href="download.php">Tải hack</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="/" data-toggle="dropdown"><span class="icon icon-user"
									aria-hidden="true"></span> <span class="caret"></span></a>
							<ul id="w6" class="dropdown-menu">
								<li>
									<a href="../../panel/panel.php" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/panel-icon.png" alt="CP"></div>
											<div>
												<h5>Quản lý</h5>
												<p>Xin chào
													<em><?php echo $_COOKIE['name']; ?>
													</em>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="../../panel/licenses.php" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/panel-icon-licenses.png" alt="Licenses">
											</div>
											<div>
												<h5>Thông tin thuê</h5>
												<p>Xem thông tin thuê &amp; thuê ngày</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="../../panel/settings.php" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/panel-icon-settings.png" alt="Settings">
											</div>
											<div>
												<h5>Thông tin tài khoản</h5>
												<p>Thông tin tài khoản của bạn</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="../../panel/topup.php" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/shuffle-icon-blue.png" alt="Topup"></div>
											<div>
												<h5>Nạp thẻ</h5>
												<p>Nạp tiền vào hệ thống SkyHT-Hax</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="../../logout.php" data-method="post" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/panel-icon-logout.png" alt="Logout"></div>
											<div>
												<h5>Thoát</h5>
												<p>Thoát tài khoản khỏi hệ thống</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="skyht-hax.php"
						itemprop="item"><span itemprop="name">Sản phẩm</span></a></li>
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="skyht-hax.php"
						itemprop="item"><span itemprop="name">SkyHT-Hax</span></a></li>
				<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
						itemprop="name">Thuê SkyHT-Hax VIP</span></li>
			</ul>
			<div class="site-index">
				<div class="jumbotron">
					<h1 class="color-red" itemprop="name">Thuê ngày dùng SkyHT-Hax</h1>
					<p>Chúng tôi cung cấp thuê VIP theo ngày/tuần/tháng, bạn có thể thanh toán bằng thẻ cào hoặc chuyển
						khoản
						ngân hàng / ví điện tử</p>
				</div>
				<div class="tab-nav">
					<ul>
						<li role="presentation"><a href="skyht-hax.php" class="tab-blue">Thông tin</a></li>
						<li role="presentation"><a href="screenshots.php" class="tab-purple">Hình ảnh</a></li>
						<li role="presentation"><a href="download.php" class="tab-green">Tải về</a></li>
						<li role="presentation"><a href="buy.php" class="tab-red-active tab-active">Mua</a></li>
					</ul>
					<div class="tab-box">
						<div class="tab-box-item">
							<div class="row">
								<div class="col-md-12">
									<form id="username-packages-form" action="buy.php" method="post">
										<h2>Bảng giá</h2>
										<p><strong>SkyHT-Hax</strong> cung cấp 3 gói cho bạn thoải mái lựa chọn, có thể
											thanh toán bằng thẻ VCoin, bank, ví điện tử, chi tiết:</p>
										<label class="control-label" for="balance">Số tiền hiện có trong tài khoản:
											<strong><?php echo number_format($_SESSION['vnd']); ?></strong> VNĐ
										</label>
										<div class="table-responsive">

											<table class="table table-striped table-space">

												<?php echo $_SESSION['msg-error']; ?>
												<tr>
													<th class="col-md-12">Tài khoản thuê</th>
												</tr>
												<tr>
													<td>
														<div class="row">
															<div class="col-md-12">
																<div class="col-md-6">
																	Lựa chọn tài khoản CF:
																	<select class="form-control"
																		name="select-username_buy">
																		<?php 
																			$result = $GLOBALS['sql_connect']->query("SELECT 
																														ia.ID AS 'ID_USERNAME',ia.USERNAME,ia.ID_ACCOUNT,
																														a.ID,a.EMAIL 
																													FROM 
																														info_account ia,
																														account a 
																													WHERE 
																														a.ID=ia.ID_ACCOUNT AND 
																														a.EMAIL='".$_COOKIE['email']."'
																													");
																			if($result->num_rows > 0){
																				while($row = $result->fetch_assoc()){
																					echo '<option value="'.$row['ID_USERNAME'].'">'.$row['USERNAME'].'</option>';
																				}																	
																			}else{
																				echo '<option value="-1">- Không có tài khoản -</option>';
																			}
																		?>
																	</select>
																</div>
																<div class="col-md-6">
																	<br><a href="../../panel/settings.php"
																		class="btn btn-link btn-block" name="button-add"
																		id="button-add">Thêm tài khoản</a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<th class="col-md-12">Gói thuê</th>
												</tr>
												<?php 
													$result = $GLOBALS['sql_connect']->query("SELECT * FROM type_packages");
													if($result->num_rows > 0){
														while($row = $result->fetch_assoc()){
															echo '<tr>
																	<td><button class="btn btn-primary form-control" name="subscription" value="'.$row['ID'].'">
																	'.$row['NAME'].' &mdash; <strong>'.number_format($row['VND']).' VNĐ</strong></button></td>
																</tr>';
														}														
													}
												?>

											</table>
										</div>
										<p>Hoặc bạn có thể thuê ngày bằng cách sử dụng mã kích hoạt </p>
										<div class="row">
											<div class="col-md-12">
												<div class="active-form-newsletter">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group field-activationkey required">
																<label class="control-label" for="key-field">
																	Điền mã kích hoạt ngày dùng:
																</label>
																<input type="text" id="key-field" class="form-control"
																	name="activationkey" aria-required="true">
																<p class="help-block help-block-error"></p>
															</div>
															<button type="submit" class="btn btn-success btn-block"
																name="activation-button">
																<span class="icon icon-shuffle"></span> Kích hoạt
															</button>
														</div>
														<div class="col-md-6">
															<p>Nếu bạn có mã kích hoạt ngày thuê, hãy điền vào ô trên,
																nếu
																mã đúng hệ
																thống sẽ cộng ngày tương ứng với số ngày trên mã kích
																hoạt.
																Mã này có độ
																dài 30 kí tự, bao gồm cả chữ và số</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<h2>Thanh toán chuyển khoản</h2>
										<p>Nếu bạn không thể thanh toán bằng thẻ <strong>VCoin</strong>, bạn có thể
											thanh
											toán bằng
											chuyển khoản ngân hàng hoặc ví điện tử, mọi giao dịch đều được admin trực
											tiếp
											trò chuyện
											và thực hiện</p>
										<p>Chi tiết xin vui lòng liên hệ <a href="https://www.facebook.com/HoangSkyht"
												title="Admin">Admin</a> để được hỗ trợ kĩ hơn.</p>
									</form>
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">
		<div class="footer-bottom" itemprop="author" itemscope itemtype="https://schema.org/Organization">
			<ul>
				<li>&copy; <span itemprop="legalName name">SkyHT-Hax</span> 2019</li>
				<li>Giao diện bởi PELock.com</li>
				<li>
					<div id="google_translate_element"></div>
					<script type="text/javascript">
						function googleTranslateElementInit() {
							new google.translate.TranslateElement({
								pageLanguage: 'en',
								layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
								multilanguagePage: true
							}, 'google_translate_element');
						}
					</script>
					<script type="text/javascript"
						src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				</li>
			</ul>
		</div>
	</footer>
	<script src="../../assets/ef61ce3e/jquery.js"></script>
	<script src="../../assets/59833360/js/bootstrap.js"></script>
	<script src="../../js/lightbox.min.js"></script>
	<script src="../../js/js.cookie-2.1.2.min.js"></script>
	<script src="../../js/jquery.bootstrap-dropdown-hover.min.js"></script>
	<script src="../../js/main.js"></script>
</body>

</html>