<?php 
    include ('../lib/Function.php');

    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../logout.php');
    }
    connectSQL();
    if(!checkConnectSQL()) header('Location: ../error.php');
    $result = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result) header('Location: ../logout.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <title>Trang quản lý khách hàng - SkyHT-Hax</title>
    <link rel="alternate" hreflang="x-default" href="https://skyht-hax.cf/panel/panel.php">
    <link rel="alternate" hreflang="en" href="https://skyht-hax.cf/panel/panel.php">
    <link rel="icon" href="../img/favicons/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../img/favicons/apple-touch-icon-120x120-precomposed.png">
    <meta robots="noindex,follow">
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Jaldi:400,700&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="../css/site.css" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
</head>

<body itemscope itemtype="http://schema.org/WebPage">
    <div class="wrap">
        <nav id="w0" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><span
                            class="brand-clr">SKYHT - HAX</span></a>
                </div>
                <div id="w0-collapse" class="collapse navbar-collapse">
                    <ul id="w1" class="navbar-nav navbar-right nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm <span
                                    class="caret"></span></a>
                            <ul id="w2" class="dropdown-menu">
                                <li>
                                    <a href="../products/skyht_hax/skyht-hax.php" tabindex="-1">
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
            <div class="site-index">
                <div class="jumbotron animation" data-anim="slide down right">
                    <h1 class="color-blue">Xin chào <?php echo $_COOKIE['name']; ?></h1>
                    <p itemprop="description">Tại đây bạn có thể thuê ngày, nạp thẻ, thêm tài khoản game và điều chỉnh
                        cài đặt tài khoản.</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <a class="square square-blue" href="licenses.php" title="Xem các gói bạn đã thuê">
                            <div>
                                <h2><span class="icon icon-drawer-in" aria-hidden="true"></span> Sản phẩm đang thuê</h2>
                                <p>Xem các gói bạn đã thuê</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a class="square square-purple" href="settings.php" title="Cài đặt tài khoản của bạn.">
                            <div>
                                <h2><span class="icon icon-cog" aria-hidden="true"></span> Tài khoản</h2>
                                <p>Cài đặt tài khoản của bạn.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a class="square square-green" href="topup.php" title="Nạp tiền vào hệ thống Vn-Hax">
                            <div>
                                <h2><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Nạp tiền</h2>
                                <p>Nạp tiền vào hệ thống <strong>SkyHT-Hax</strong>.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a class="square square-orange" href="../logout.php" title="Thoát khỏi trang quản lý.">
                            <div>
                                <h2><span class="icon icon-exit3" aria-hidden="true"></span> Thoát</h2>
                                <p>Thoát khỏi trang quản lý.</p>
                            </div>
                        </a>
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
    <script src="../js/velocity.min.js"></script>
    <script src="../js/velocity.ui.min.js"></script>
    <script src="../js/anim-jumbotron.js"></script>
    <script src="../js/anim-squares.js"></script>
    <script src="../assets/59833360/js/bootstrap.js"></script>
    <script src="../js/lightbox.min.js"></script>
    <script src="../js/js.cookie-2.1.2.min.js"></script>
    <script src="../js/jquery.bootstrap-dropdown-hover.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>