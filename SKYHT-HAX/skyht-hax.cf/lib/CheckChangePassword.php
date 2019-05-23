<?php 
    $_SESSION['msg'] = '<p itemprop="description">Hãy chọn mật khẩu mới cho tài khoản của bạn</p>';
    if(isset($_POST['change_password-button'])){
        if(isset($_POST['old_password'])){
            if(isset($_POST['password'])){
                if(isset($_POST['password_confirm'])){
                    $result = $GLOBALS['sql_connect']->query("SELECT EMAIL,PASSWORD 
                                                                FROM account 
                                                                WHERE EMAIL='".$_COOKIE['email']."' AND PASSWORD='".$_POST['old_password']."'");
                    if($result->num_rows == 0){
                        $_SESSION['msg'] = '<p itemprop="description" style="color:red">Mật khẩu hiện tại bạn nhập không đúng. Vui lòng thử lại !</p>';
                    }else{
                        if(strcmp($_POST['password'],$_POST['password_confirm']) != 0){
                            $_SESSION['msg'] = '<p itemprop="description" style="color:red">Mật khẩu xác nhận lần 2 không khớp. Vui lòng thử lại !</p>';
                        }else{
                            $result = $GLOBALS['sql_connect']->query("UPDATE account 
                                                                        SET PASSWORD='".$_POST['password_confirm']."' 
                                                                        WHERE EMAIL='".$_COOKIE['email']."' AND PASSWORD='".$_POST['old_password']."'");
                            if($result === FALSE){
                                $_SESSION['msg'] = '<p itemprop="description" style="color:red">Có lỗi xảy ra trong quá trình cập nhật. Vui lòng thử lại !</p>';
                            }else{
                                setcookie('password',password_hash($_POST['password_confirm'], PASSWORD_DEFAULT), time() + 1800, '/');
                                $_SESSION['msg'] = '<p itemprop="description" style="color:green">Cập nhật mật khẩu mới thành công !</p>';
                            }
                        }
                    }
                }
            }
        }
    }
?>