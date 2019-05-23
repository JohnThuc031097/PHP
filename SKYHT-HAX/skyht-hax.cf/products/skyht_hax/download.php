<?php
   include('../../lib/Function.php');
   connectSQL();
   connectSQLM();
   if (!checkConnectSQL() || !checkConnectSQLM()) header('Location: ../../error.php');
   include ('../../lib/LoadDbDefault.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="unsafe-url">
	<title>Tải SkyHT-Hax</title>
	<link rel="alternate" hreflang="x-default" href="download.php">
	<link rel="alternate" hreflang="en" href="download.php">
	<link rel="icon" href="../../img/favicons/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="../../img/favicons/apple-touch-icon-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="120x120"
		href="../../img/favicons/apple-touch-icon-120x120-precomposed.html">
	<meta name="description" content="Tải hack SkyHT-Hax">
	<link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/site.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
		rel="stylesheet">
</head>

<body itemscope="" itemtype="http://schema.org/WebPage" class="body-light">
	<div class="wrap">
		<nav id="w0" class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button><a class="navbar-brand" href="../../index.php"><span
							class="brand-clr">SKYHT - HAX</span></a>
				</div>
				<div id="w0-collapse" class="collapse navbar-collapse">
					<ul id="w1" class="navbar-nav navbar-right nav">
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span
									class="caret"></span></a>
							<ul id="w2" class="dropdown-menu">
								<li>
									<a href="skyht-hax.php" tabindex="-1">
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
													alt="Contact Information"></div>
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
						<?php
                     if (isset($_COOKIE['email'],$_COOKIE['password'])) {
                         $result = $GLOBALS['sql_connect']->query("SELECT * FROM account WHERE EMAIL='".$_COOKIE['email']."'");
                         if ($result->num_rows > 0) {
                             if (password_verify($result->fetch_assoc()['PASSWORD'], $_COOKIE['password'])) {
                                 echo '<li class="dropdown">
                              <a class="dropdown-toggle" href="/" data-toggle="dropdown"><span class="icon icon-user"
                                      aria-hidden="true"></span> <span class="caret"></span></a>
                              <ul id="w6" class="dropdown-menu">
                                  <li>
                                      <a href="../../panel/panel.php" tabindex="-1">
                                          <div class="media-menu">
                                              <div><img src="../../img/icons/panel-icon.png" alt="CP"></div>
                                              <div>
                                                  <h5>Quản lý</h5>
                                                  <p>Xin chào '.$_COOKIE['name'].'</em>
                                                  </p>
                                              </div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="../../panel/licenses.php" tabindex="-1">
                                          <div class="media-menu">
                                              <div><img src="../../img/icons/panel-icon-licenses.png" alt="Licenses"></div>
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
                                              <div><img src="../../img/icons/panel-icon-settings.png" alt="Settings"></div>
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
                          </li>';
                             }else{
                              echo '<li><a href="../../login.php">Đăng nhập</a></li>';
                             }
                         }else{
                           echo '<li><a href="../../login.php">Đăng nhập</a></li>';
                         }
                     }else{
                        echo '<li><a href="../../login.php">Đăng nhập</a></li>';
                     }
                  ?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
						href="skyht-hax.php" itemprop="item"><span itemprop="name">Sản phẩm</span></a></li>
				<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
						href="skyht-hax.php" itemprop="item"><span itemprop="name">SkyHT-Hax</span></a></li>
				<li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span
						itemprop="name">Tải SkyHT-Hax</span></li>
			</ul>
			<div class="site-index">
				<div class="jumbotron">
					<h1 class="color-green" itemprop="name">Tải về &amp; Sử dụng SkyHT-Hax</h1>
					<p itemprop="description">Tại đây bạn có thể tải về hack SkyHT-Hax và có thể sử dụng gần như ngay
						lập tức
					</p>
				</div>
				<div class="tab-nav">
					<ul>
						<li role="presentation"><a href="skyht-hax.php" class="tab-blue">Thông tin</a></li>
						<li role="presentation"><a href="screenshots.php" class="tab-purple">Hình ảnh</a></li>
						<li role="presentation"><a href="download.php" class="tab-green-active tab-active">Tải về</a>
						</li>
						<li role="presentation"><a href="buy.php" class="tab-red">Mua</a></li>
					</ul>
					<div class="tab-box">
						<div class="tab-box-item">
							<div class="row">
								<div class="col-md-12">
									<h2><span class="icon icon-download5" aria-hidden="true"></span> Tải về</h2>
									<p>Tại đây bạn có thể tải về bản hack miễn phí <strong>SkyHT-Hax</strong>
										<div class="row margin-md">
											<div class="col-md-5">
												<a target="_blank" href="https://mshare.io/file/fiSMscC"
													class="button-download button-download-green platform-win btn-block"
													role="button"><span><strong>SkyHT-Hax_FULL.zip</strong>
														<span>v1.0 | Link bản FULL</span>
												</a>
											</div>
											<div class="col-md-5">
												<a target="_blank" href="https://files.pw/nffxye5xs2bs"
													class="button-download button-download-blue platform-win btn-block"
													role="button"><span><strong>SkyHT-Hax_LITE.zip</strong>
														<span>v1.0 | Link bản LITE</span>
												</a>
											</div>
										</div>
										<h3><span class="icon icon-checkmark" aria-hidden="true"></span> Yêu cầu phần
											cứng</h3>
										<ul>
											<li>
												Chỉ hỗ trợ cho hệ điều hành Windows, bao gồm
												<ul>
													<li>Windows 10, 8.1, 8, 7, Vista, XP (32 / 64 bit)</li>
													<li>Windows Server 2012, Windows Server 2008, Windows Server 2003
														(32 / 64 bit)</li>
												</ul>
											</li>
											<li>
												<strong style="color:red">Lưu ý</strong>
												<ul>
													<li>Nếu mở tool hack hiện thông báo "Server SkyHT-Hax bảo trì": Thử
														mở lại tool hack bằng quyền <span style="color:red">Run as
															administrator</span></li>
													<li>Nếu vào game không hiện menu hack. Vui lòng cài thêm 2 phần mềm
														này (<a href="" download="download/vcredist_x86.exe"
															role="button"><span style="color:royalblue">Phần mềm
																1</span></a>, <a href=""
															download="download/dotNetFx45_Full_setup.exe"
															role="button"><span style="color:slateblue">Phần mềm
																2</span></a>)</li>
												</ul>
											</li>
										</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer" itemscope="" itemtype="http://schema.org/WPFooter">
		<div class="footer-bottom" itemprop="author" itemscope="" itemtype="https://schema.org/Organization">
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