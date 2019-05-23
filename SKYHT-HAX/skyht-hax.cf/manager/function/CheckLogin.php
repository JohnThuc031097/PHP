<?php 
    $_SESSION['msg-error'] = '';
    if(isset($_POST['login-button'],$_POST['username'],$_POST['password'])){
        $GLOBALS['sql_manager_connect']->set_charset('utf8');
        $result = $GLOBALS['sql_manager_connect']->query("SELECT * FROM account WHERE USERNAME='".$_POST['username']."' AND PASSWORD='".$_POST['password']."'");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                setcookie('name_manager', $row['NAME'], time() + 3600, '/');
                setcookie('username_manager', $row['USERNAME'], time() + 3600, '/');
                setcookie('password_manager', password_hash($row['PASSWORD'], PASSWORD_DEFAULT), time() + 3600, '/');
                if($row['LEVEL'] == 1){
                    header('Location: panel-card/panel-card.php');
                }else if($row['LEVEL'] == 0){
                    header('Location: panel.php');
                }
            }
        }else{
            $_SESSION['msg-error'] = '<p itemprop="description" style="color:red;">Tài khoản hoặc mật khẩu sai. Vui lòng kiểm tra lại</p>';
        }
    }
?>