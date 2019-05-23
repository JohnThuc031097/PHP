<?php 
    include ('../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../logout.php');
    }
    connectSQL();
    if(!checkConnectSQL()) header('Location: ../error.php');
    $result = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result) header('Location: ../logout.php');
    include ('../lib/CheckSettings.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <title>Cài đặt tài khoản</title>
    <link rel="alternate" hreflang="x-default" href="https://skyht-hax.cf/panel/settings.php">
    <link rel="alternate" hreflang="en" href="https://skyht-hax.cf/panel/settings.php">
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body itemscope itemtype="http://schema.org/WebPage" class="body-light">
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
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="../index.php"
                        itemprop="item"><span itemprop="name">Trang chủ</span></a></li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="panel.php"
                        itemprop="item"><span itemprop="name">Quản lý tài khoản</span></a></li>
                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
                        itemprop="name">Cài đặt tài khoản</span></li>
            </ul>
            <div class="customer-panel">
                <div class="jumbotron">
                    <h1 class="color-blue" itemprop="name serviceType">Cài đặt tài khoản</h1>
                    <p itemprop="description">Thông tin cài đặt tài khoản của bạn.</p>
                </div>
                <div class="tab-nav">
                    <ul>
                        <li role="presentation"><a href="licenses.php" title="Licenses" class="tab-blue">Gói thuê</a>
                        </li>
                        <li role="presentation"><a href="settings.php" title="Settings"
                                class="tab-purple-active tab-active">Cài đặt</a></li>
                        <li role="presentation"><a href="topup.php" title="Settings" class="tab-green">Nạp tiền</a>
                        </li>
                    </ul>
                    <div class="tab-box">
                        <div class="tab-box-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Thông tin của bạn</h2>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-responsive table-vcenter">
                                            <tr>
                                                <td>Tên</td>
                                                <td><?php echo $_COOKIE['name'] ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>E-mail</td>
                                                <td><span style="color:blue;"><?php echo $_COOKIE['email'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mật khẩu</td>
                                                <td><span class="label label-default">(Đã mã hóa)</span></td>
                                                <td><a class="btn btn-block btn-primary" href="change-password.php">Đổi
                                                        mật khẩu mới</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="info-account-game">
                                <script type="text/javascript">
                                    function loadPage_ajax(numPage) {
                                        $.ajax({
                                            url: "setting/setting_result_page.php",
                                            type: "post",
                                            dataType: "text",
                                            data: {
                                                page: numPage
                                            },
                                            success: function (result) {
                                                $('#tbl-account_game').slideUp(0).delay(100).fadeIn(500).html(result);
                                            },
                                            error: function (result) {
                                                alert("Error: Load failed !");
                                            }
                                        });
                                    }
                                </script>
                                <script type="text/javascript">
                                    function loadPagination_ajax(page) {
                                        $.ajax({
                                            url: "setting/setting_load_pagination.php",
                                            type: "post",
                                            dataType: "text",
                                            data: {
                                                page: page
                                            },
                                            success: function (result) {
                                                $('#pagination-tbl-account_game').html(result);
                                                loadPage_ajax(page);
                                            },
                                            error: function (result) {
                                                alert("Error: Load failed !");
                                            }
                                        });
                                    }
                                </script>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Thông tin tài khoản game</h2>
                                        <form id="form-info_account_cf" action="settings.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" id="input-username" class="form-control"
                                                        placeholder="Nhập tên tài khoản CF mới" name="input-username"
                                                        aria-required="true">
                                                    <p><?php echo $_SESSION['msg-error-input_username']; ?></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-success btn-block"
                                                        name="button-add_username">+ Thêm tài khoản
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <p><?php echo $_SESSION['msg-error-del_username']; ?></p>
                                                <table class="table table-striped table-responsive table-vcenter">
                                                    <thead>
                                                        <tr>
                                                            <th>TÀI KHOẢN</th>
                                                            <th>TÙY CHỈNH</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl-account_game">
                                                        <script type="text/javascript">
                                                            loadPage_ajax(1);
                                                        </script>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="pagination">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div id="pagination-tbl-account_game" class="pull-right">
                                                <script type="text/javascript">
                                                    loadPagination_ajax(1);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
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
                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
                    </script>
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
    <script src="../assets/59833360/js/bootstrap.js"></script>
    <script src="../js/lightbox.min.js"></script>
    <script src="../js/js.cookie-2.1.2.min.js"></script>
    <script src="../js/jquery.bootstrap-dropdown-hover.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>