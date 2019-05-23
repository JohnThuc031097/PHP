<?php 
    include ('../../lib/Function.php');

    if(!isset($_COOKIE['username_manager'],$_COOKIE['password_manager'])){
        header('Location: ../logout.php');
    }
    connectSQL();
    connectSQLM();
    if(!checkConnectSQLM() || !checkConnectSQL()) header('Location: ../../error.php');
    $result = checkAccountSQLM($_COOKIE['username_manager'],$_COOKIE['password_manager']);
    if($result == FALSE) header('Location: ../logout.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <title>Trang quản lý khách hàng - SkyHT-Hax</title>
    <link rel="alternate" hreflang="x-default" href="">
    <link rel="alternate" hreflang="en" href="">
    <link rel="icon" href="../../img/favicons/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../../img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../../img/favicons/apple-touch-icon-120x120-precomposed.png">
    <meta robots="noindex,follow">
    <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Jaldi:400,700&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="../../css/site.css" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
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
                            <a class="dropdown-toggle" href="/" data-toggle="dropdown"><span class="icon icon-user"
                                    aria-hidden="true"></span> <span class="caret"></span></a>
                            <ul id="w6" class="dropdown-menu">
                                <li>
                                    <a href="../logout.php" data-method="post" tabindex="-1">
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
        <!-- Container Main -->
        <div class="container">
            <script type="text/javascript">
                function loadPage_ajax(numPage, type) {
                    $.ajax({
                        url: "panel-card_result_page.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            page: numPage,
                            type: type
                        },
                        success: function (result) {
                            if (type == 0) {
                                $('#tbl-1-uncheck').slideUp(0).delay(100).fadeIn(500).html(result);
                            }
                            if (type == 1) {
                                $('#tbl-2-checked').slideUp(0).delay(100).fadeIn(500).html(result);
                            }
                        },
                        error: function (result) {
                            alert("Error: Load failed !");
                        }
                    });
                }
            </script>
            <script type="text/javascript">
                function loadPagination_ajax(page, type) {
                    $.ajax({
                        url: "panel-card_load_pagination.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            page: page,
                            type: type
                        },
                        success: function (result) {
                            if (type == 0) {
                                $('#tbl-1-1-pagination').html(result);
                            }
                            if (type == 1) {
                                $('#tbl-2-2-pagination').html(result);
                            }
                            loadPage_ajax(page, type);
                        },
                        error: function (result) {
                            alert("Error: Load failed !");
                        }
                    });
                }
            </script>
            <script type="text/javascript">
                function checkCardAccept_ajax(id_card, id_user, accept, page = 1) {
                    $.ajax({
                        url: "panel-card_result_type.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            id_card: id_card,
                            id_user: id_user,
                            accept: accept,
                            page: page
                        },
                        success: function (result) {
                            if (accept == 1) {
                                loadPagination_ajax(page, 1);
                                loadPagination_ajax(1, 0);
                            }
                            if (accept == 0) {
                                loadPagination_ajax(page, 0);
                                loadPagination_ajax(1, 1);
                            }
                        },
                        error: function (result) {
                            alert("Error: Update failed !");
                        }
                    });
                }
            </script>            
            <div id="tbl-card">
                <div id="tbl-1">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-responsive table-bordered table-vcenter">
                                <thead>
                                    <th>EMAIL</th>
                                    <th>LOẠI THẺ</th>
                                    <th>SERI</th>
                                    <th>CODE</th>
                                    <th>TRỊ GIÁ</th>
                                    <th>NGÀY NẠP</th>
                                    <th>TÙY CHỈNH</th>
                                </thead>
                                <tbody id="tbl-1-uncheck">
                                    <script type="text/javascript">
                                        loadPage_ajax(1, 0);
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tbl-1-1">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="tbl-1-1-pagination" class="pull-right">
                                <script type="text/javascript">
                                    loadPagination_ajax(1, 0);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:50px;"></div>
                <div id="tbl-2">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-responsive table-bordered table-vcenter">
                                <thead>
                                    <th>EMAIL</th>
                                    <th>LOẠI THẺ</th>
                                    <th>SERI</th>
                                    <th>CODE</th>
                                    <th>TRỊ GIÁ</th>
                                    <th>NGÀY NẠP</th>
                                    <th>TÙY CHỈNH</th>
                                </thead>
                                <tbody id="tbl-2-checked">
                                    <script type="text/javascript">
                                        loadPage_ajax(1, 1);
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tbl-2-2">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="tbl-2-2-pagination" class="pull-right">
                                <script type="text/javascript">
                                    loadPagination_ajax(1, 1);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Container Main -->
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
    <script src="../../js/velocity.min.js"></script>
    <script src="../../js/velocity.ui.min.js"></script>
    <script src="../../js/anim-jumbotron.js"></script>
    <script src="../../js/anim-squares.js"></script>
    <script src="../../assets/59833360/js/bootstrap.js"></script>
    <script src="../../js/lightbox.min.js"></script>
    <script src="../../js/js.cookie-2.1.2.min.js"></script>
    <script src="../../js/jquery.bootstrap-dropdown-hover.min.js"></script>
    <script src="../../js/main.js"></script>
</body>

</html>