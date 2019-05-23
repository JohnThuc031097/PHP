<?php 
	include ('lib/Function.php');
	session_destroy();                                        
    setcookie('name',null, -1, '/');
    setcookie('email',null, -1, '/');
	setcookie('password',null, -1, '/');
	connectSQL();
    if(!checkConnectSQL()) header('Location: error.php'); 
	include ('lib/CheckRegister.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="referrer" content="no-referrer">
	<title>Đăng ký tài khoản SkyHT-Hax</title>
	<link rel="alternate" hreflang="x-default" href="register.php">
	<link rel="alternate" hreflang="en" href="register.php">
	<link rel="icon" href="img/favicons/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="120x120"
		href="img/favicons/apple-touch-icon-120x120-precomposed.html">
	<meta robots="noindex,follow">
	<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/site.css" rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
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
						<span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"><span
							class="brand-clr">SKYHT - HAX</span></a>
				</div>
				<div id="w0-collapse" class="collapse navbar-collapse">
					<ul id="w1" class="navbar-nav navbar-right nav">
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span
									class="caret"></span></a>
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
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Hỗ trợ <span
									class="caret"></span></a>
							<ul id="w5" class="dropdown-menu">
								<li>
									<a target='_blank' href="https://www.facebook.com/SkyhtHackCF" tabindex="-1">
										<div class="media-menu">
											<div><img src="img/icons/mail-icon-green.png" alt="Contact Information">
											</div>
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
			<ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="index.html"
						itemprop="item"><span itemprop="name">Trang chủ</span></a></li>
				<li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span
						itemprop="name">Đăng ký</span></li>
			</ul>
			<div class="panel-change-password">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron" data-anim="expand in">
							<h1 class="color-dblue" itemprop="name">Đăng ký tài khoản</h1>
							<?php echo $_SESSION['msg']; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="active-form-login">
							<p class="text-center header-icon"><span class="glyphicon glyphicon-log-in"
									aria-hidden="true"></span></p>
							<form id="panel-register-form" action="register.php" method="post">
								<div class="field-panelregister-name required">
									<input type="input" id="panelregister-name" class="form-control" name="name"
										placeholder="Họ tên" aria-required="true">
									<p class="help-block help-block-error"></p>
								</div>
								<div class="form-group field-panelregister-email required">
									<input type="email" id="panelregister-email" class="form-control" name="email"
										placeholder="E-mail" aria-required="true">
									<p class="help-block help-block-error"></p>
								</div>
								<div class="form-group field-panelregister-password required">
									<input type="password" id="panelregister-password" class="form-control"
										name="password" placeholder="Mật khẩu" aria-required="true">
									<p class="help-block help-block-error">
								</div>
								<div class="form-group field-panelregister-password_confirm required">
									<input type="password" id="panelregister-password_confirm" class="form-control"
										name="password_confirm" placeholder="Nhập lại mật khẩu" aria-required="true">
									<p class="help-block help-block-error">
								</div>
								<button type="submit" class="btn btn-primary btn-block" name="reg-button" id="reg-button">Đăng ký</button>
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
					jQuery('#panel-register-form').yiiActiveForm([{
							"id": "panelregister-email",
							"name": "email",
							"container": ".field-panelregister-email",
							"input": "#panelregister-email",
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
							"id": "panelregister-name",
							"name": "text",
							"container": ".field-panelregister-name",
							"input": "#panelregister-name",
							"error": ".help-block.help-block-error",
							"validate": function (attribute, value, messages, deferred, $form) {
								yii.validation.required(value, messages, {
									"message": "Vui lòng điền tên"
								});
								yii.validation.string(value, messages, {
									"message": "Tên phải là kí tự",
									"max": 64,
									"tooLong": "Tên không được dài quá 64 kí tự",
									"skipOnEmpty": 1
								});
							} , {
									"id": "panelregister-password",
									"name": "password",
									"container": ".field-panelregister-password",
									"input": "#panelregister-password",
									"error": ".help-block.help-block-error",
									"validate": function (attribute, value, messages, deferred, $form) {
										yii.validation.required(value, messages, {
											"message": "Vui lòng điền mật khẩu"
										});
										yii.validation.string(value, messages, {
											"message": "Mật khẩu phải là kí tự",
											"max": 30,
											"min":6,
											"tooLong": "Mật khẩu không được dài quá 30 kí tự",
											"tooShort": "Mật khẩu không được ngắn quá 6 kí tự",
											"skipOnEmpty": 1
										});
									}
								}, {
									"id": "panelregister-password_confirm",
									"name": "password",
									"container": ".field-panelregister-password_confirm",
									"input": "#panelregister-password_confirm",
									"error": ".help-block.help-block-error",
									"validate": function (attribute, value, messages, deferred, $form) {
										yii.validation.required(value, messages, {
											"message": "Vui lòng nhập lại mật khẩu"
										});
										yii.validation.string(value, messages, {
											"message": "Mật khẩu phải là kí tự",
											"max": 30,
											"min": 6,
											"tooLong": "Mật khẩu không được dài quá 30 kí tự",
											"tooShort": "Mật khẩu không được ngắn quá 6 kí tự",
											"skipOnEmpty": 1
										});
									}
								}],
							[]);
					});				
	</script>
</body>

</html>