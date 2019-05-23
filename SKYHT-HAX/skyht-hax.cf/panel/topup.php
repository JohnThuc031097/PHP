<?php 
    include ('../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../logout.php');
    }
    connectSQL();
    connectSQLM();
    if(!checkConnectSQL() || !checkConnectSQLM()) header('Location: ../error.php');
    $result_account = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result_account) header('Location: ../logout.php');
    while($row_account = $result_account->fetch_assoc()){
        $_SESSION['vnd'] = $row_account['VND'];
        $_SESSION['id_mail'] = $row_account['ID'];
    }
    include ('../lib/CheckCard.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="unsafe-url">
    <title>Nạp thẻ</title>
    <link rel="alternate" hreflang="x-default" href="https://skyht-hax.cf/panel/topup.php">
    <link rel="alternate" hreflang="en" href="https://skyht-hax.cf/panel/topup.php">
    <link rel="icon" href="../img/favicons/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="../img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../img/favicons/apple-touch-icon-120x120-precomposed.png">
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/site.css" rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php 
        $result = $GLOBALS['sql_manager_connect']->query("SELECT * FROM card_type");
        if($result->num_rows>0){
            echo '<script type="text/javascript">function fix_it(){ var card_type = document.getElementById("cardtype").value;';
            while($row=$result->fetch_assoc()){
                echo 'if (card_type == '.$row['ID'].'){ $("#amount-'.$row['NAME'].'").show(); }else{ $("#amount-'.$row['NAME'].'").hide(); }';
            }
            echo '</script>';
        } 
    ?>
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
            <h1>Lưu ý khi nạp</h1>
            <div class="row">
                <div class="col-md-6">
                    <p itemprop="creator" itemscope itemtype="https://schema.org/Person">Thẻ của bạn sẽ được xử lý trong
                        thời gian trung bình 6 tiếng, từ 8h->22h, vui lòng chọn đúng mệnh giá. Nếu bạn gặp lỗi khi nạp
                        (chờ quá lâu, hoặc không có tiền, hay lỗi khác), vui lòng liên hệ <a
                            href="https://www.facebook.com/HoangSkyht">Admin</a> để được xử lý trong thời gian sớm nhất
                    </p>
                    <label class="control-label" for="balance">Số tiền hiện có trong tài khoản:
                        <strong><?php echo number_format($_SESSION['vnd']); ?></strong> VNĐ</label>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive table-vcenter">
                            <thead>
                                <?php echo $_SESSION['msg-error']; ?>
                            </thead>
                        </table>
                    </div>
                    <div class="active-form">
                        <form id="topup-form" action="topup.php" method="post">
                            <div class="form-group field-topupform-cardtype required">
                                <label class="control-label" for="topupform-cardtype"><strong>Loại thẻ</strong></label>
                                <select class="form-control" name="cardtype" id="cardtype">
                                    <?php 
                                        $result = $GLOBALS['sql_manager_connect']->query("SELECT * FROM card_type");
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                echo '<option value="'.$row['ID'].'">'.$row['NAME'].'</option>';
                                            }
                                        } 
                                    ?>
                                </select>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group field-topupform-cardamount required">
                                <label class="control-label" for="topupform-cardamount">Mệnh giá (chọn đúng hoặc
                                    mất tiền)
                                </label>
                                <?php 
                                    $result_type = $GLOBALS['sql_manager_connect']->query("SELECT * FROM card_type");
                                    if($result_type->num_rows>0){
                                        while($row_type=$result_type->fetch_assoc()){
                                            echo    '<select class="form-control" name="cardamount" id="amount-'.$row_type['NAME'].'" onchange="fix_it()" onclick="fix_it()">';
                                            $result_info = $GLOBALS['sql_manager_connect']->query("SELECT * FROM card_info_values WHERE ID_TYPE='".$row_type['ID']."'");
                                            if($result_info->num_rows>0){
                                                while($row_info=$result_info->fetch_assoc()){
                                                    echo '<option value="'.$row_info['ID'].'">'.number_format($row_info['CODE_VALUE']).'</option>';
                                                }
                                            }
                                            echo    '</select>';
                                        }
                                    }                                    
                                ?>
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group field-topupform-seri required">
                                <label class="control-label" for="topupform-seri">Seri thẻ</label>
                                <input type="number" id="topupform-seri" class="form-control" name="seri"
                                    aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group field-topupform-code required">
                                <label class="control-label" for="topupform-code">Mã thẻ</label>
                                <input type="number" id="topupform-code" class="form-control" name="code"
                                    aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                            <button id="topup-button" type="submit" class="btn btn-block btn-primary"
                                name="topup-button">Nạp thẻ</button>
                        </form>
                    </div>               
                </div>
            </div>
            <div class="table-responsive">
                <script type="text/javascript">
                    function loadPage_ajax(numPage) {
                        $.ajax({
                            url: "topup/topup_result_page.php",
                            type: "post",
                            dataType: "text",
                            data: {
                                page: numPage
                            },
                            success: function (result) {
                                $('#tbl-status').slideUp(0).delay(100).fadeIn(500).html(result);
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
                            url: "topup/topup_load_pagination.php",
                            type: "post",
                            dataType: "text",
                            data: {
                                page: page
                            },
                            success: function (result) {
                                $('#pagination-tbl-status').html(result);
                                loadPage_ajax(page);
                            },
                            error: function (result) {
                                alert("Error: Load failed !");
                            }
                        });
                    }
                </script>
                <table class="table table-striped table-responsive table-vcenter">
                    <thead>
                        <th>Loại thẻ</th>
                        <th>Số seri</th>
                        <th>Mệnh giá</th>
                        <th>Chiết khấu</th>
                        <th>Ngày nạp</th>
                        <th>Trạng thái</th>
                    </thead>
                    <tbody id="tbl-status">
                        <script type="text/javascript">
                            loadPage_ajax(1);
                        </script>
                    </tbody>
                </table>
            </div>
            <div id="pagination">
                <div class="row">
                    <div class="col-md-8">
                        <div id="pagination-tbl-status" class="pull-right">
                            <script type="text/javascript">
                                loadPagination_ajax(1);
                            </script>
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
    <script type="text/javascript">
        jQuery(function ($) {
            jQuery('#topup-form').yiiActiveForm([{
                "id": "topupform-seri",
                "name": "seri",
                "container": ".field-topupform-seri",
                "input": "#topupform-seri",
                "error": ".help-block.help-block-error",
                "validate": function (attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "Vui lòng điền mã seri"
                    });
                    value = yii.validation.trim($form, attribute, []);
                    yii.validation.string(value, messages, {
                        "message": "Seri phải là chữ số",
                        "min": 11,
                        "max": 14,
                        "tooLong": "Seri quá dài.",
                        "tooShort": "Seri quá ngắn.",
                        "skipOnEmpty": 1
                    });
                }
            }, {
                "id": "topupform-code",
                "name": "code",
                "container": ".field-topupform-code",
                "input": "#topupform-code",
                "error": ".help-block.help-block-error",
                "validate": function (attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "Vui lòng điền mã thẻ"
                    });
                    value = yii.validation.trim($form, attribute, []);
                    yii.validation.string(value, messages, {
                        "message": "Mã thẻ phải là chữ số",
                        "min": 13,
                        "max": 15,
                        "tooLong": "Mã thẻ quá dài.",
                        "tooShort": "Mã thẻ quá ngắn.",
                        "skipOnEmpty": 1
                    });
                }
            }]);
        });
    </script>
</body>

</html>