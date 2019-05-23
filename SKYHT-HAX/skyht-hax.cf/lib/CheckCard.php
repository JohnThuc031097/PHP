<?php 
    $_SESSION['msg-error'] = '';
    if(isset($_POST['topup-button'],$_POST['seri'],$_POST['code'],$_POST['cardamount'])){
        $result_check = $GLOBALS['sql_manager_connect']->query("SELECT CODE FROM card WHERE CODE='".$_POST['code']."'");
        if($result_check->num_rows<1){
            $dateCrr = date('Y-m-d H:i:s', time());
            $result_insert_card = $GLOBALS['sql_manager_connect']->query("INSERT INTO 
                                                                                    card (ID_ACCOUNT,ID_CARD_INFO,SERI,CODE,DATE) 
                                                                                VALUES (
                                                                                    '".$_SESSION['id_mail']."',
                                                                                    '".$_POST['cardamount']."',
                                                                                    '".$_POST['seri']."',
                                                                                    '".$_POST['code']."',
                                                                                    '".$dateCrr."'
                                                                                )");
            if($result_insert_card === FALSE){
                $_SESSION['msg-error'] = '<th style="color:red;background-color:#fbe9da;">Có lỗi trong quá trình xử lý. Vui lòng thử lại !</th>';
            }else{
                $_SESSION['msg-error'] = '<th style="color:green;background-color:#fbe9da;">Nạp thẻ thành công. Vui lòng chờ Admin xử lý duyệt thẻ !</th>';
            }
        }else{
            $_SESSION['msg-error'] = '<th style="color:red;background-color:#fbe9da;">Mã thẻ này đã được sử dụng. Vui lòng thử lại !</th>';
        }
    }
?>