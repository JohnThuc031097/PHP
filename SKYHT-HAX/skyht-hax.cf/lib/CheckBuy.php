<?php
    $_SESSION['msg-error'] = '';
        if (isset($_POST['subscription'])) {
            if (isset($_POST['select-username_buy'])) {
                $result_info_packages = $GLOBALS['sql_connect']->query("SELECT * 
                                                                        FROM type_packages 
                                                                        WHERE ID='".$_POST['subscription']."'");
                if ($result_info_packages->num_rows>0) {
                    $vndPackages = 0;
                    $datePackages = 0;
                    while ($row = $result_info_packages->fetch_assoc()) {
                        $vndPackages = $row['VND'];
                        $datePackages = $row['DATE'];
                    }
                    $result_get_full_info_account = $GLOBALS['sql_connect']->query("SELECT 
                                                                                        a.ID,a.EMAIL,a.VND,a.PASSWORD,
                                                                                        ia.ID AS 'ID_INFO_ACCOUNT',ia.ID_ACCOUNT 
                                                                                    FROM 
                                                                                        account a,info_account ia 
                                                                                    WHERE 
                                                                                        ia.ID='".$_POST['select-username_buy']."' AND 
                                                                                        a.EMAIL='".$_COOKIE['email']."' AND 
                                                                                        a.ID=ia.ID_ACCOUNT
                                                                                    ");
                    if ($result_get_full_info_account->num_rows>0) {
                        while ($row_account = $result_get_full_info_account->fetch_assoc()) {
                            if ($row_account['VND'] >= $vndPackages) {
                                $result_get_double_packages = $GLOBALS['sql_connect']->query("SELECT 
                                                                                                    D_BEGIN,D_END  
                                                                                                FROM 
                                                                                                    info_packages_rented 
                                                                                                WHERE ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'");                              
                                if($result_get_double_packages->num_rows>0){
                                    $date_begin = $result_get_double_packages->fetch_assoc()['D_BEGIN'];                              
                                    if(date('Y-m-d', strtotime($date_begin))<date('Y-m-d')){
                                        $date_begin = date('Y-m-d H:i:s', time());
                                    }
                                    $result_get_double_packages->data_seek(0);
                                    $date_end = strtotime($result_get_double_packages->fetch_assoc()['D_END']);
                                    $date_new = date('Y-m-d H:i:s', strtotime('+'.$datePackages.' day', $date_end)); 
                                    
                                    $result_insert_packages = $GLOBALS['sql_connect']->query("UPDATE 
                                                                                                    info_packages_rented 
                                                                                                SET 
                                                                                                    D_BEGIN='".$date_begin."', 
                                                                                                    D_END='".$date_new."'
                                                                                                WHERE 
                                                                                                    ID_INFO_ACCOUNT='".$_POST['select-username_buy']."'
                                                                                                ");
                                }else{      
                                    $D_BEGIN = date('Y-m-d H:i:s', time());
                                    $D_END = date('Y-m-d H:i:s', strtotime('+'.$datePackages.' day', time()));                           
                                    $result_insert_packages = $GLOBALS['sql_connect']->query("INSERT INTO 
                                                                                                    info_packages_rented (ID_INFO_ACCOUNT,D_BEGIN,D_END) 
                                                                                                VALUES(
                                                                                                    '".$_POST['select-username_buy']."',
                                                                                                    '".$D_BEGIN."',
                                                                                                    '".$D_END."'
                                                                                                    )"
                                                                                                );
                                }                      
                                if ($result_insert_packages === false) {
                                    $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#f69c9e;">Có lỗi trong quá trình xử lý. Vui lòng thử lại sau !</th></tr>';
                                } else {
                                    $vndResult = $row_account['VND'] - $vndPackages;
                                    if (!password_verify($row_account['PASSWORD'], $_COOKIE['password'])) {
                                        header('Location: ../../login.php');
                                    } else {
                                        $result_vnd = $GLOBALS['sql_connect']->query("UPDATE 
                                                                                            account  
                                                                                        SET 
                                                                                            VND='".$vndResult."' 
                                                                                        WHERE 
                                                                                            ID='".$row_account['ID']."' AND 
                                                                                            EMAIL='".$row_account['EMAIL']."' AND 
                                                                                            PASSWORD='".$row_account['PASSWORD']."'
                                                                                        ");
                                        if ($result_vnd === false) {
                                            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#f69c9e;">Có lỗi trong quá trình thanh toán. Vui lòng thử lại sau !</th></tr>';
                                        } else {
                                            $_SESSION['vnd'] = $vndResult;
                                            $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:green;background-color:#e2fdfa;">Bạn đã mua gói VIP thành công. Vui lòng vào quản lý gói để kiểm tra lại ! </th></tr>';
                                        }
                                    }
                                }
                            } else {
                                $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#f69c9e;">Số tiền trong tài khoản bạn không đủ để mua gói VIP này !</th></tr>';
                            }
                        }
                    } else {
                        $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#f69c9e;">Lỗi hệ thống. Vui lòng thử lại sau !</th></tr>';
                    }
                } else {
                    $_SESSION['msg-error'] = '<tr><th class="col-md-12" style="color:red;background-color:#f69c9e;">Gói VIP bạn chọn hiện tại đã bị xóa. Vui lòng thử lại sau !</th></tr>';
                }
            }
        }
?>