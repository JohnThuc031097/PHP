<?php 
    if(isset($_POST['login-button'])){
        if(isset($_POST['email'])){
            if(isset($_POST['password'])){
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $result = checkAccountSQL($_POST['email'], $pass_hash);
                if(!$result) {
                    $_SESSION['msg'] = '<p itemprop="description" style="color:red;">Tài khoản hoặc mật khẩu sai. Vui lòng kiểm tra lại</p>';
                }else{
                    while($row = $result->fetch_assoc()){
                        setcookie('name',$row['NAME'], time() + 1800, '/');
                        setcookie('email',$row['EMAIL'], time() + 1800, '/');
                        setcookie('password',$pass_hash, time() + 1800, '/');
                        //$_SESSION['vnd'] = $row['VND'];
                        //$_SESSION['id_email'] = $row['ID'];
                    }
                    header('Location: panel/panel.php');
                }
            }
        }
    }
?>