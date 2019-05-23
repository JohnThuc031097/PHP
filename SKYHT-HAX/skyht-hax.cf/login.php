<?php  
	include ('lib/Function.php');
	connectSQL();
	if(!checkConnectSQL()) header('Location: error.php');
	if(isset($_COOKIE['email'],$_COOKIE['password'])){
		$result = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
		if(!$result){
			header('Location: panel/panel.php');
		}
	}
	$_SESSION['msg'] = '<p itemprop="description">Trang quản lý thông tin tài khoản thuê VIP SkyHT-Hax</p>';
	include ('lib/CheckLogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="unsafe-url">
	<title>Quản lý tài khoản</title>
	<link rel="alternate" hreflang="x-default" href="index.html">
	<link rel="alternate" hreflang="en" href="index.html">
	<link rel="icon" href="img/favicons/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="120x120"
		href="img/favicons/apple-touch-icon-120x120-precomposed.html">
	<meta name="description" content="Trang quản lý tài khoản thuê VIP SkyHT-Hax.">
	<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/site.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
		rel="stylesheet">
</head>

<body itemscope="" itemtype="http://schema.org/WebPage">
	<div class="wrap">
		<nav id="w0" class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"><span
							class="brand-clr">SKYHT - HAX</span></a>
				</div>
				<div id="w0-collapse" class="collapse navbar-collapse">
					<ul id="w1" class="navbar-nav navbar-right nav">
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span class="caret"></span></a>
							<ul id="w2" class="dropdown-menu">
								<li>
									<a href="products/skyht_hax/skyht-hax.php" tabindex="-1">
										<div class="media-menu">
											<div><img src="img/icons/lock-icon-blue.png" alt="SkyHT-Hax"></div>
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
											<div><img src="img/icons/mail-icon-green.png" alt="Contact Information"></div>
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
											<div><img src="img/icons/community-icon-green.png" alt="Community"></div>
											<div>
												<h5>Cộng đồng</h5>
												<p>Group facebook</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li><a href="products/skyht_hax/download.php">Tải hack</a></li>
						<li><a href="login.php">Đăng nhập</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="site-login">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron" data-anim="expand in">
							<h1 class="color-dblue" itemprop="name">Đăng nhập quản lý tài khoản</h1>
							<?php echo $_SESSION['msg']; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="active-form-login">
							<p class="text-center header-icon"><span class="icon icon-user" aria-hidden="true"></span></p>
							<form id="login-form" action="login.php" method="post">
								<div class="form-group field-customersloginform-email required">
									<input type="email" id="customersloginform-email" class="form-control" name="email" 
										placeholder="E-mail" aria-required="true">
									<p class="help-block help-block-error">
								</div>
								<div class="form-group field-customersloginform-password required ">
									<input type="password" id="customersloginform-password" class="form-control" name="password"
										placeholder="Mật khẩu" aria-required="true">
									<p class="help-block help-block-error">
								</div>
								<button type="submit" class="btn btn-primary btn-block" name="login-button">Đăng nhập</button>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group field-customersloginform-rememberme">
											<div class="checkbox">
												<div class="col-xs-18 col-sm-18 col-md-18 register-user">
													<a href="register.php">Đăng ký tài khoản</a>
												</div>
												<p class="help-block help-block-error">
											</div>
										</div>
									</div>
									<!--
									<div class="col-xs-6 col-sm-6 col-md-6 reset-password">
										<a href="reset-password.php">Quên mật khẩu ?</a>
									</div>
									-->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer" itemscope="" itemtype="http://schema.org/WPFooter">
		<div class="footer-bottom" itemprop="author" itemscope="" itemtype="https://schema.org/Organization">
			<ul>
				<li>&copy; <span itemprop="legalName name">SkyHT-Hax</span> 2019 </li>
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
	<script src="assets/ef61ce3e/jquery.js"></script>
	<script src="assets/949053ee/yii.js"></script>
	<script src="assets/949053ee/yii.validation.js"></script>
	<script src="assets/949053ee/yii.activeForm.js"></script>
	<script src="assets/59833360/js/bootstrap.js"></script>
	<script src="js/lightbox.min.js"></script>
	<script src="js/js.cookie-2.1.2.min.js"></script>
	<script src="js/jquery.bootstrap-dropdown-hover.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		jQuery(function ($) {
			jQuery('#login-form').yiiActiveForm([{
				"id": "customersloginform-email",
				"name": "email",
				"container": ".field-customersloginform-email",
				"input": "#customersloginform-email",
				"error": ".help-block.help-block-error",
				"validate": function (attribute, value, messages, deferred, $form) {
					value = yii.validation.trim($form, attribute, []);
					yii.validation.email(value, messages, {
						"pattern": /^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
						"fullPattern": /^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/,
						"allowName": false,
						"message": "Vui lòng điền đúng dạng địa chỉ email.",
						"enableIDN": false,
						"skipOnEmpty": 1
					});
					yii.validation.required(value, messages, {
						"message": "Vui lòng điền địa chỉ email"
					});
					yii.validation.string(value, messages, {
						"message": "Email phải là kí tự.",
						"max": 128,
						"tooLong": "Email không được dài quá 128 kí tự",
						"skipOnEmpty": 1
					});
				}
			}, {
				"id": "customersloginform-password",
				"name": "password",
				"container": ".field-customersloginform-password",
				"input": "#customersloginform-password",
				"error": ".help-block.help-block-error",
				"validate": function (attribute, value, messages, deferred, $form) {
					yii.validation.required(value, messages, {
						"message": "Vui lòng điền mật khẩu"
					});
					yii.validation.string(value, messages, {
						"message": "Mật khẩu phải là kí tự",
						"max": 128,
						"tooLong": "Mật khẩu không được dài quá 128 kí tự",
						"skipOnEmpty": 1
					});
				}
			}, {
				"id": "customersloginform-rememberme",
				"name": "rememberMe",
				"container": ".field-customersloginform-rememberme",
				"input": "#customersloginform-rememberme",
				"error": ".help-block.help-block-error",
				"validate": function (attribute, value, messages, deferred, $form) {
					yii.validation.boolean(value, messages, {
						"trueValue": "1",
						"falseValue": "0",
						"message": "Remember Me must be either \"1\" or \"0\".",
						"skipOnEmpty": 1
					});
				}
			}], []);
		});
	</script>
</body>
</html>