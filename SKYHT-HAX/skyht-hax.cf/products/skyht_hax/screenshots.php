<?php
   include ('../../lib/Function.php');
   connectSQL();
   connectSQLM();
   if (!checkConnectSQL() || !checkConnectSQLM()) header('Location: ../../error.php');
   include ('../../lib/LoadDbDefault.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="unsafe-url">
	<title>Hình ảnh bản hack Vn-Hax</title>
	<link rel="alternate" hreflang="x-default" href="screenshots.php">
	<link rel="alternate" hreflang="en" href="screenshots.php">
	<link rel="icon" href="../../img/favicons/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="../../img/favicons/apple-touch-icon-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="120x120"
		href="../../img/favicons/apple-touch-icon-120x120-precomposed.png">
	<meta name="description"
		content="Những hình ảnh dưới đây sẽ cho bạn biết về menu hack, tính năng được cung cấp trong hack của chúng tôi">
	<link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/site.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
		rel="stylesheet">
</head>

<body itemscope itemtype="http://schema.org/WebPage" class="body-light">
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
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span class="caret"></span></a>
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
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Hỗ trợ <span class="caret"></span></a>
							<ul id="w5" class="dropdown-menu">
								<li>
									<a target='_blank' href="https://www.facebook.com/SkyhtHackCF" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/mail-icon-green.png" alt="Contact Information"></div>
											<div>
												<h5>Liên hệ </h5>
												<p>Fanpage Facebook</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a target='_blank' href="https://www.facebook.com/groups/169672007162583" tabindex="-1">
										<div class="media-menu">
											<div><img src="../../img/icons/community-icon-green.png" alt="Community"></div>
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
			<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="skyht-hax.php"
						itemprop="item"><span itemprop="name">Sản phẩm</span></a></li>
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="skyht-hax.php"
						itemprop="item"><span itemprop="name">SkyHT-Hax</span></a></li>
				<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
						itemprop="name">Hình ảnh menu SkyHT-Hax</span></li>
			</ul>
			<div class="site-index">
				<div class="jumbotron">
					<h1 class="color-purple" itemprop="name">Hình ảnh menu SkyHT-Hax</h1>
					<p itemprop="description">Những hình ảnh dưới đây sẽ cho bạn biết về menu hack, tính năng được cung cấp
						trong hack của chúng tôi</p>
				</div>
				<div class="tab-nav">
					<ul>
						<li role="presentation"><a href="skyht-hax.php" class="tab-blue">Thông tin</a></li>
						<li role="presentation"><a href="screenshots.php" class="tab-purple-active tab-active">Hình ảnh</a></li>
						<li role="presentation"><a href="download.php" class="tab-green">Tải về</a></li>
						<li role="presentation"><a href="buy.php" class="tab-red">Mua</a></li>
					</ul>
					<div class="tab-box">
						<div class="tab-box-item">
							<div class="col-md-12">
								<h2><span class="icon icon-image5" aria-hidden="true"></span> Menu hack</h2>
							</div>
							<div class="col-md-6 col-sm-6">
								<h3>Bản Full</h3>
								<a href="<?php echo '../../img/products/skyht_hax/'.(is_array($_SESSION['image_menu_hack']) ? $_SESSION['image_menu_hack'][1] : 'error.png'); ?>" data-lightbox="image-free" data-title="VIP Version">
									<img src="<?php echo '../../img/products/skyht_hax/'.(is_array($_SESSION['image_menu_hack']) ? $_SESSION['image_menu_hack'][1] : 'error.png'); ?>" alt="Bản có phí full chức năng"
										class="img-responsive center-block" itemprop="image">
								</a>
							</div>
							<div class="col-md-6 col-sm-6">
								<h3>Bản Lite</h3>
								<a href="<?php echo '../../img/products/skyht_hax/'.(is_array($_SESSION['image_menu_hack']) ? $_SESSION['image_menu_hack'][0] : 'error.png'); ?>" data-lightbox="image-vip" data-title="Free Version">
									<img src="<?php echo '../../img/products/skyht_hax/'.(is_array($_SESSION['image_menu_hack']) ? $_SESSION['image_menu_hack'][0] : 'error.png'); ?>" alt="Bản miễn phí"
										class="img-responsive center-block" itemprop="image">
								</a>
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