<?php
    $_SESSION['msg'] = '<p itemprop="description">Vui lòng điền vào email bên dưới. Hệ thống sẽ gửi cho bạn một mật khẩu mới</p>';
    if (isset($_POST['login-button'])) {
        if (isset($_POST['email'])) {
            $result = $GLOBALS['sql_connect']->query("SELECT EMAIL,PASSWORD FROM account WHERE EMAIL='".$_POST['email']."'");
            if ($result->num_rows > 0) {
                $password = $result->fetch_assoc()['PASSWORD'];
                $to = $_POST['email'];
                $subject = "[SkyHT-Hax] Khôi phục lại mật khẩu";
                $message = "Hệ thống đã khôi phục mật khẩu cho bạn. Vui lòng đăng nhập bằng mật khẩu này vào kiểm tra !\n password=".$password;
                $headers =  'MIME-Version: 1.0' . "\r\n"; 
                $headers .= 'From: ' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                if (mail($to, $subject, $message, $headers)) {
                    $_SESSION['msg'] = '<p itemprop="description" style="color:green;">Hệ thống khôi phục lại mật khẩu của bạn. Vui lòng vào email kiểm tra.</p>';
                } else {
                    $_SESSION['msg'] = '<p itemprop="description" style="color:red;">Có lỗi xảy ra trong quá trình khôi phục mật khẩu. Vui lòng thử lại hoặc liên hệ với Admin</p>';
                }
            } else {
                $_SESSION['msg'] = '<p itemprop="description" style="color:red;">Email này chưa tồn tại. Vui lòng nhập chính xác email cần lấy lại mật khẩu</p>';
            }
        }
    }
