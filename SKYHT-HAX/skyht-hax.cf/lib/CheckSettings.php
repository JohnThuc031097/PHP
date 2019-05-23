<?php 
    $_SESSION['msg-error-input_username'] = '';
    $_SESSION['msg-error-del_username'] = '';
    if(isset($_POST['button-add_username'])){
        if(isset($_POST['input-username'])){
            $result_get_account = $GLOBALS['sql_connect']->query("SELECT ID,EMAIL FROM account WHERE EMAIL='".$_COOKIE['email']."'");
            if($result_get_account->num_rows<1){
                header('Location: ../login.php');
            }else{
                while($row_get_account = $result_get_account->fetch_assoc()){
                    $result_get_username = $GLOBALS['sql_connect']->query("SELECT * 
                                                                            FROM info_account 
                                                                            WHERE 
                                                                                ID_ACCOUNT='".$row_get_account['ID']."' AND 
                                                                                USERNAME='".$_POST['input-username']."'
                                                                            ");
                    if($result_get_username->num_rows>0){
                        $_SESSION['msg-error-input_username'] = '<span class="col-md-12" style="color:red;background-color:#faefef;">Tài khoản này đã tồn tại !</span>';
                    }else{
                        $result_insert_account_cf = $GLOBALS['sql_connect']->query("INSERT INTO info_account (
                                                                                                                ID_ACCOUNT,
                                                                                                                USERNAME
                                                                                                            )
                                                                                    VALUES (
                                                                                            '".$row_get_account['ID']."',
                                                                                            '".$_POST['input-username']."'
                                                                                            ) 
                                                                                    ");
                        if($result_insert_account_cf === FALSE){
                            $_SESSION['msg-error-input_username'] = '<span class="col-md-12" style="color:red;background-color:#faefef;">Có lỗi trong quá trình thêm mới.Vui lòng thử lại sau !</span>';
                        }                        
                    }
                }
            }
        }else{
            $_SESSION['msg-error-input_username'] = '<span class="col-md-12" style="color:red;background-color:#faefef;">Vui lòng nhập tên tài khoản !</span>';
        }
    }
    if(isset($_POST['button-del_username'])){
        $result_del_username = $GLOBALS['sql_connect']->query("DELETE FROM info_account WHERE ID='".$_POST['button-del_username']."'");
        if($result_del_username === FALSE){
            $_SESSION['msg-error-del_username'] = '<span class="col-md-12" style="color:red;background-color:#faefef;">Có lỗi trong quá trình xóa. Vui lòng thử lại sau !</span>';
        }
    }
?>