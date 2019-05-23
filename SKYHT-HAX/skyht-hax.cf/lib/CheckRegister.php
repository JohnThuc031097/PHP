<?php 
    $_SESSION['msg'] = '<p itemprop="description">Đăng ký tài khoản để có thể thực hiện thao tác trên trang quản lý tài khoản</p>';
        if(isset($_POST['reg-button'])){
            if(isset($_POST['name'])){
                if(isset($_POST['email'])){
                    if(!checkEmail(trim($_POST['email']))){
                        if(isset($_POST['password'])){
                            if(isset($_POST['password_confirm'])){
                                if(strcmp(trim($_POST['password']), trim($_POST['password_confirm']))==0){
                                    $result = $GLOBALS['sql_connect']->query("INSERT INTO account (NAME,EMAIL,PASSWORD)
                                                                                VALUES ('".$_POST['name']."','".trim($_POST['email'])."','".trim($_POST['password'])."')");
                                    if($result == TRUE){
                                        $result = $GLOBALS['sql_connect']->query("SELECT * FROM account WHERE EMAIL='".trim($_POST['email'])."'");
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                setcookie('name',$row['NAME'], time() + 1800, '/');
                                                setcookie('email',$row['EMAIL'], time() + 1800, '/');
                                                setcookie('password',password_hash($row['PASSWORD'], PASSWORD_DEFAULT), time() + 1800, '/');
                                                header('Location: panel/panel.php');
                                            }
                                        }else{
                                            $_SESSION['msg'] = '<p itemprop="description" style="color:purple;">Tạo tài khoản thành công. Vui lòng chờ vài giây hệ thống cập nhật rồi hãy đăng nhập tài khoản !</p>';
                                        }
                                    }else{
                                         $_SESSION['msg'] = '<p itemprop="description" style="color:red;">Lỗi hệ thống.  Vui lòng thử lại sau !</p>';
                                    }
                                }
                            }
                        }
                    }else{
                        $_SESSION['msg'] = '<p itemprop="description" style="color:red;">E-mail này đã được sử dụng.  Vui lòng sử dụng E-mail khác !</p>';
                    }             
                }     
            }
        }
?>