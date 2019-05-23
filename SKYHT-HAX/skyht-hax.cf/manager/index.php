<?php  
    include ('../lib/Function.php');
    connectSQLM();
    if(!checkConnectSQLM()) header('../error.php');
    include ('function/CheckLogin.php');
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
    <link rel="alternate" hreflang="x-default" href="">
    <link rel="alternate" hreflang="en" href="">
    <link rel="icon" href="../img/favicons/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../img/favicons/apple-touch-icon-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../img/favicons/apple-touch-icon-120x120-precomposed.html">
    <meta name="description" content="Trang quản lý SkyHT-Hax">
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/site.css" rel="stylesheet">
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
            </div>
        </nav>
        <div class="container">
            <div class="site-login">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron" data-anim="expand in">
                            <h1 class="color-dblue" itemprop="name">Đăng nhập quản lý</h1>
                            <?php echo $_SESSION['msg-error']; ?>
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="active-form-login">
                            <p class="text-center header-icon"><span class="icon icon-user" aria-hidden="true"></span></p>
                            <form id="login-form" action="index.php" method="post">
                                <div class="form-group field-customersloginform-username required">
                                    <input type="text" id="customersloginform-username" class="form-control" name="username"
                                        placeholder="Tên tài khoản" aria-required="true">
                                    <p class="help-block help-block-error">
                                </div>
                                <div class="form-group field-customersloginform-password required ">
                                    <input type="password" id="customersloginform-password" class="form-control"
                                        name="password" placeholder="Mật khẩu" aria-required="true">
                                    <p class="help-block help-block-error">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="login-button">Đăng nhập</button>
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
    <script src="../assets/ef61ce3e/jquery.js"></script>
    <script src="../assets/949053ee/yii.js"></script>
    <script src="../assets/949053ee/yii.validation.js"></script>
    <script src="../assets/949053ee/yii.activeForm.js"></script>
    <script src="../assets/59833360/js/bootstrap.js"></script>
    <script src="../js/lightbox.min.js"></script>
    <script src="../js/js.cookie-2.1.2.min.js"></script>
    <script src="../js/jquery.bootstrap-dropdown-hover.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        jQuery(function ($) {
            jQuery('#login-form').yiiActiveForm([{
                "id": "customersloginform-username",
                "name": "username",
                "container": ".field-customersloginform-username",
                "input": "#customersloginform-username",
                "error": ".help-block.help-block-error",
                "validate": function (attribute, value, messages, deferred, $form) {
                    value = yii.validation.trim($form, attribute, []);
                    yii.validation.required(value, messages, {
                        "message": "Vui lòng điền tên tài khoản"
                    });
                    yii.validation.string(value, messages, {
                        "message": "Tên tài khoản phải là kí tự.",
                        "max": 30,
                        "tooLong": "Tên tài khoản không được dài quá 30 kí tự",
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
                        "max": 30,
                        "tooLong": "Mật khẩu không được dài quá 30 kí tự",
                        "skipOnEmpty": 1
                    });
                }
            }], []);
		});
    </script>
</body>

</html>