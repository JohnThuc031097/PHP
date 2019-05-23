<?php 
    include ('../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../logout.php');
    }
    connectSQL();
    if(!checkConnectSQL()) header('Location: ../error.php');
    $result = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result) header('Location: ../logout.php');
    include ('../lib/CheckChangePassword.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <title>Đổi mật khẩu</title>
    <link rel="alternate" hreflang="x-default" href="https://skyht-hax.com/panel/change-password.php">
    <link rel="alternate" hreflang="en" href="https://skyht-hax.com/panel/change-password.php">
    <link rel="icon" href="../img/favicons/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../img/favicons/apple-touch-icon-120x120-precomposed.png">
    <meta robots="noindex,follow">
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/site.css" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
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
                        <span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><span class="brand-clr">SKYHT - HAX</span></a>
                </div>
                <div id="w0-collapse" class="collapse navbar-collapse">
                    <ul id="w1" class="navbar-nav navbar-right nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span
                                    class="caret"></span></a>
                            <ul id="w2" class="dropdown-menu">
                                <li>
                                    <a href="../products/skyht_hax/skyht_hax.php" tabindex="-1">
                                        <div class="media-menu">
                                            <div><img src="../img/icons/lock-icon-blue.png" alt="SkyHT-Hax"></div>
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
                                            <div><img src="../img/icons/mail-icon-green.png" alt="Contact Information">
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
                                            <div><img src="../img/icons/community-icon-green.png" alt="Community"></div>
                                            <div>
                                                <h5>Cộng đồng</h5>
                                                <p>Group facebook</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="../products/skyht_hax/download.php">Tải hack</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="/" data-toggle="dropdown"><span class="icon icon-user"
                                    aria-hidden="true"></span> <span class="caret"></span></a>
                            <ul id="w6" class="dropdown-menu">
                                <li>
                                    <a href="panel.php" tabindex="-1">
                                        <div class="media-menu">
                                            <div><img src="../img/icons/panel-icon.png" alt="CP"></div>
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
                                    <a href="licenses.php" tabindex="-1">
                                        <div class="media-menu">
                                            <div><img src="../img/icons/panel-icon-licenses.png" alt="Licenses"></div>
                                            <div>
                                                <h5>Thông tin thuê</h5>
                                                <p>Xem thông tin thuê &amp; thuê ngày</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="settings.php" tabindex="-1">
                                        <div class="media-menu">
                                            <div><img src="../img/icons/panel-icon-settings.png" alt="Settings"></div>
                                            <div>
                                                <h5>Thông tin tài khoản</h5>
                                                <p>Thông tin tài khoản của bạn</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="topup.php" tabindex="-1">
                                        <div class="media-menu">
                                            <div><img src="../img/icons/shuffle-icon-blue.png" alt="Topup"></div>
                                            <div>
                                                <h5>Nạp thẻ</h5>
                                                <p>Nạp tiền vào hệ thống SkyHT-Hax</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="../logout.php" data-method="post" tabindex="-1">
                                        <div class="media-menu">
                                            <div><img src="../img/icons/panel-icon-logout.png" alt="Logout"></div>
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
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="/"
                        itemprop="item"><span itemprop="name">Trang chủ</span></a></li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="panel.php"
                        itemprop="item"><span itemprop="name">Quản lý tài khoản</span></a></li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="settings.php"
                        itemprop="item"><span itemprop="name">Cài đặt tài khoản</span></a></li>
                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
                        itemprop="name">Đổi mật khẩu</span></li>
            </ul>
            <div class="panel-change-password">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron" data-anim="expand in">
                            <h1 class="color-dblue" itemprop="name">Đổi mật khẩu</h1>
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="active-form-login">
                            <p class="text-center header-icon"><span class="icon icon-key" aria-hidden="true"></span>
                            </p>
                            <form id="panel-change-password-form" action="change-password.php" method="post">
                                <div class="form-group field-panelchangepasswordform-old_password required">
                                    <input type="password" id="panelchangepasswordform-old_password"
                                        class="form-control" name="old_password"
                                        placeholder="Mật khẩu hiện tại" aria-required="true">
                                    <p class="help-block help-block-error"></p>
                                </div>
                                <div class="form-group field-panelchangepasswordform-password required">
                                    <input type="password" id="panelchangepasswordform-password" class="form-control"
                                        name="password" placeholder="Mật khẩu mới"
                                        aria-required="true">
                                    <p class="help-block help-block-error"></p>
                                </div>
                                <div class="form-group field-panelchangepasswordform-password_confirm required">
                                    <input type="password" id="panelchangepasswordform-password_confirm"
                                        class="form-control" name="password_confirm"
                                        placeholder="Nhập lại mật khẩu mới" aria-required="true">
                                    <p class="help-block help-block-error"></p>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="change_password-button">Đặt mật khẩu mới</button>
                            </form>
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
            jQuery('#panel-change-password-form').yiiActiveForm([{
                "id": "panelchangepasswordform-old_password",
                "name": "password",
                "container": ".field-panelchangepasswordform-old_password",
                "input": "#panelchangepasswordform-old_password",
                "error": ".help-block.help-block-error",
                "validate": function (attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "Vui lòng điền mật khẩu cũ"
                    });
                    yii.validation.string(value, messages, {
                        "message": "Mật khẩu phải là kí tự.",
                        "max": 30,
                        "min": 1,
                        "tooLong": "Mật khẩu không được dài quá 30 kí tự",
                        "tooShort": "Mật khẩu không được ngắn quá 6 kí tự",
                        "skipOnEmpty": 1
                    });
                }
            }, {
                "id": "panelchangepasswordform-password",
                "name": "password",
                "container": ".field-panelchangepasswordform-password",
                "input": "#panelchangepasswordform-password",
                "error": ".help-block.help-block-error",
                "validate": function (attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "Vui lòng điền mật khẩu mới"
                    });
                    yii.validation.string(value, messages, {
                        "max": 30,
                        "min": 6,
                        "tooLong": "Mật khẩu không được dài quá 30 kí tự",
                        "tooShort": "Mật khẩu không được ngắn quá 6 kí tự",
                        "skipOnEmpty": 1
                    });
                }
            }, {
                "id": "panelchangepasswordform-password_confirm",
                "name": "password",
                "container": ".field-panelchangepasswordform-password_confirm",
                "input": "#panelchangepasswordform-password_confirm",
                "error": ".help-block.help-block-error",
                "validate": function (attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "Vui lòng nhập lại mật khẩu"
                    });
                    yii.validation.string(value, messages, {
                        "max": 30,
                        "min": 6,
                        "tooLong": "Mật khẩu không được dài quá 30 kí tự",
                        "tooShort": "Mật khẩu không được ngắn quá 6 kí tự",
                        "skipOnEmpty": 1
                    });
                }
            }], []);
        });
    </script>
</body>

</html>