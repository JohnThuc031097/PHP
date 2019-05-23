<?php 
    $_SESSION['msg-error'] = '';
    if(isset($_POST['activationkey'], $_POST['activation-button'],$_POST['select-username_buy'])){
        $result_get_key = $GLOBALS['sql_connect']->query("SELECT * 
                                                        FROM activation_code 
                                                        WHERE ID='".$_POST['activationkey']."' AND 
                                                            ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'");
        if($result_get_key->num_rows>0){
            while($row_activation_code = $result_get_key->fetch_assoc()){
                $date_check = $row_activation_code['EXPIRATION_DATE'];
                $date_add = $row_activation_code['ADD_DATE'];
                $status = $row_activation_code['STATUS'];
            }
            if(date('Y-m-d', strtotime($date_check)) == date('Y-m-d', time()) && $status == 0){
                $result_get_date_expire = $GLOBALS['sql_connect']->query("SELECT 
                                                                            D_BEGIN, D_END 
                                                                        FROM 
                                                                            info_packages_rented 
                                                                        WHERE 
                                                                            ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'
                                                                    ");
                if($result_get_date_expire->num_rows>0){
                    $date_begin_account = $result_get_date_expire->fetch_assoc()['D_BEGIN'];
                    $result_get_date_expire->data_seek(0);
                    $date_end_account = $result_get_date_expire->fetch_assoc()['D_END'];
                    $date_end_add = $date_add;
                    if(date('Y-m-d', strtotime($date_end_account)) < date('Y-m-d')){
                        $date_begin_account = date('Y-m-d H:i:s', time());
                        $date_end_add = date('Y-m-d H:i:s', strtotime('+'.$date_add.' day', time()));  
                    }
                    $result_update_new_date = $GLOBALS['sql_connect']->query("UPDATE 
                                                                                     info_packages_rented 
                                                                                SET 
                                                                                    D_BEGIN='".$date_begin_account."', 
                                                                                    D_END='".$date_end_add."'  
                                                                                WHERE 
                                                                                    ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'
                                                                            ");
                    if($result_update_new_date == FALSE){
                        $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#fde7ea;">Lỗi hệ thống. Vui lòng thử lại sau !</th></tr>';
                    }else{
                        $result_update_status_code = $GLOBALS['sql_connect']->query("UPDATE 
                                                                                        activation_code 
                                                                                    SET 
                                                                                        STATUS='1' 
                                                                                    WHERE 
                                                                                        ID='".$_POST['activationkey']."' AND 
                                                                                        ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'
                                                                                ");
                        if($result_update_status_code == FALSE){
                            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#fde7ea;">Lỗi hệ thống. Vui lòng thử lại sau !</th></tr>';
                        }else{
                            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:green;background-color:#e2fdfa;">Mã kích hoạt được chấp nhận. <a href="../../panel/licenses.php">Nhấn vào đây</a> để xem cập nhật gói VIP ! </th></tr>';
                        }
                    }
                }else{
                    $D_BEGIN = date('Y-m-d H:i:s', time());
                    $D_END = date('Y-m-d H:i:s', strtotime('+'.$date_add.' day', time()));                     
                    $result_insert_new_packages = $GLOBALS['sql_connect']->query("INSERT INTO 
                                                                                        info_packages_rented (ID_INFO_ACCOUNT,D_BEGIN,D_END) 
                                                                                VALUES(
                                                                                        '".$_POST['select-username_buy']."',
                                                                                        '".$D_BEGIN."',
                                                                                        '".$D_END."'
                                                                                        )"
                                                                                );
                    if($result_insert_new_packages == FALSE){
                        $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#fde7ea;">Lỗi hệ thống. Vui lòng thử lại sau !</th></tr>';
                    }else{
                        $result_update_status_code = $GLOBALS['sql_connect']->query("UPDATE 
                                                                                        activation_code 
                                                                                    SET 
                                                                                        STATUS='1' 
                                                                                    WHERE 
                                                                                        ID='".$_POST['activationkey']."' AND 
                                                                                        ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'
                                                                                ");
                        if($result_update_status_code == FALSE){
                            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#fde7ea;">Lỗi hệ thống. Vui lòng thử lại sau !</th></tr>';
                        }else{
                            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:green;background-color:#e2fdfa;">Mã kích hoạt được chấp nhận. <a href="../../panel/licenses.php">Nhấn vào đây</a> để xem cập nhật gói VIP ! </th></tr>';
                        }
                    }
                }
            }else{
                $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#fde7ea;">Ngày kích hoạt đã kết thúc hoặc đã được sử dụng. Vui lòng kiểm tra lại mã kích hoạt !</th></tr>';
            }
        }else{
            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#fde7ea;">Mã kích hoạt không tồn tại. Vui lòng thử lại sau !</th></tr>';
        }
    }
?>