<?php 
   include ('lib/Function.php');
   connectSQL();
   if(!checkConnectSQL()) header('Location: error.php');
   include ('lib/CheckResetPassword.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="referrer" content="unsafe-url">
   <title>Lấy lại mật khẩu</title>
   <link rel="alternate" hreflang="x-default" href="index.html">
   <link rel="alternate" hreflang="en" href="index.html">
   <link rel="alternate" hreflang="pl" href="pl.html">
   <link rel="icon" href="img/favicons/favicon.png">
   <link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.html">
   <link rel="apple-touch-icon-precomposed" sizes="120x120"
      href="img/favicons/apple-touch-icon-120x120-precomposed.html">
   <meta name="description" content="Have you lost your login password? Reset the password to the customer panel.">
   <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="css/site.css" rel="stylesheet">
   <link
      href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic&amp;subset=latin,latin-ext"
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
                  <span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"><span class="brand-clr">SKYHT - HAX</span></a>
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
         <div class="site-request-password-reset">
            <div class="row">
               <div class="col-md-12">
                  <div class="jumbotron" data-anim="expand in">
                     <h1 class="color-dblue" itemprop="name">Lấy lại mật khẩu</h1>
                     <?php 
                        echo $_SESSION['msg'];
                     ?>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-offset-3 col-md-6">
                  <div class="active-form-login">
                     <p class="text-center header-icon"><span class="icon icon-key" aria-hidden="true"></span></p>
                     <form id="request-password-reset-form" action="reset-password.php" method="post">
                        <div class="form-group field-passwordresetrequestform-email required">
                           <input type="email" id="passwordresetrequestform-email" class="form-control"
                              name="email" placeholder="E-mail" aria-required="true">
                           <p class="help-block help-block-error">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login-button">Lấy lại mật khẩu</button>
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
   <script type="text/javascript">
      jQuery(function ($) {
         jQuery('#request-password-reset-form').yiiActiveForm([{
            "id": "passwordresetrequestform-email",
            "name": "email",
            "container": ".field-passwordresetrequestform-email",
            "input": "#passwordresetrequestform-email",
            "error": ".help-block.help-block-error",
            "validate": function (attribute, value, messages, deferred, $form) {
               value = yii.validation.trim($form, attribute, []);
               yii.validation.required(value, messages, {
                  "message": "Vui lòng điền địa chỉ email"
               });
               yii.validation.email(value, messages, {
                  "pattern": /^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,
                  "fullPattern": /^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/,
                  "allowName": false,
                  "message": "Vui lòng điền đúng địa chỉ email",
                  "enableIDN": false,
                  "skipOnEmpty": 1
               });
               yii.validation.string(value, messages, {
                  "message": "Email phải là kí tự",
                  "max": 128,
                  "tooLong": "Quá chiều dài cho phép (128 kí tự)",
                  "skipOnEmpty": 1
               });
            }
         }], []);
      });
   </script>
</body>

</html>