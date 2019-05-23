<?php 
    include ('../../lib/Function.php');
    connectSQL();
    connectSQLM();
    if(!checkConnectSQLM() || !checkConnectSQL()) header('Location: ../../error.php');
    $result = checkAccountSQLM($_COOKIE['username_manager'],$_COOKIE['password_manager']);
    if($result == FALSE) header('Location: ../logout.php');

    if (isset($_POST['page'], $_POST['type'])) {                          
        $result_count_card = $GLOBALS['sql_manager_connect']->query("SELECT COUNT(*) AS 'TOTAL' FROM card WHERE STATUS='".$_POST['type']."'");                      
        if ($result_count_card->num_rows>0) {
            $limit_page = 3;
            $total_record_page = $result_count_card->fetch_assoc()['TOTAL'];

            $start_page = $_POST['page'];
            $end_page = ceil($total_record_page/($limit_page));
            if($end_page > 0){
                if($start_page > $end_page){
                    $start_page = $end_page;            
                }

                $queryLimit = (($start_page-1)*$limit_page)-1;
                if ($queryLimit < 0) {
                    $queryLimit = 0;
                }else if($queryLimit > 0){
                    $queryLimit++;                              
                }else if ($queryLimit > $total_record_page) {
                    $queryLimit -= $limit_page;
                }

                if ($queryLimit >= 0 && $queryLimit <= $total_record_page) {
                    $result_table_card = $GLOBALS['sql_manager_connect']->query("SELECT 
                                                                                    c.*,c.ID AS 'ID_CARD',  
                                                                                    ct.*, 
                                                                                    civ.* 
                                                                                FROM card c,card_type ct,card_info_values civ 
                                                                                WHERE 
                                                                                    c.ID_CARD_INFO=civ.ID AND 
                                                                                    civ.ID_TYPE=ct.ID AND 
                                                                                    c.STATUS='".$_POST['type']."' 
                                                                                LIMIT ".$queryLimit.",".$limit_page);
                    if ($result_table_card->num_rows>0) {
                        $data_card = $result_table_card->fetch_all(MYSQLI_ASSOC);
                        $info_email = array();
                        $name_email = array();
                        foreach ($data_card as $value) {
                            if (!array_key_exists($value['ID_ACCOUNT'], $info_email)) {
                                array_push($info_email, $value['ID_ACCOUNT']);
                            }
                        }
                        $strIDEmail = '';
                        foreach ($info_email as $values) {
                            $strIDEmail .= "ID='".$values."' AND ";
                        }
                        $strIDEmail = substr($strIDEmail, 0, strlen($strIDEmail)-5);
                        $result_get_email = $GLOBALS['sql_connect']->query("SELECT ID,EMAIL FROM account WHERE ".$strIDEmail);
                        //echo var_dump($strIDEmail);
                        if ($result_get_email->num_rows>0) {
                            $name_email = $result_get_email->fetch_all(MYSQLI_ASSOC);
                            foreach ($data_card as $value) {
                                echo    '<tr>';
                                foreach ($name_email as $value_name) {
                                    if (strcmp($value_name['ID'], $value['ID_ACCOUNT']) == 0) {
                                        echo '<td>'.$value_name['EMAIL'].'</td>';
                                        break;
                                    }
                                }
                                echo   '<td>'.$value['NAME'].'</td>
                                        <td>'.$value['SERI'].'</td>
                                        <td>'.$value['CODE'].'</td>
                                        <td><span style="color:blue;">'.number_format($value['CODE_VALUE']).'</span></td>
                                        <td>'.date('d-m-Y', strtotime($value['DATE'])).'</td>
                                        <td>';
                                if($_POST['type'] == 0){
                                    echo    '<input type="button" class="btn btn-success btn-block" onclick="checkCardAccept_ajax('.$value['ID_CARD'].', '.$value['ID_ACCOUNT'].', 1,'.$start_page.')" value="Chấp nhận">';
                                }
                                    echo    '<input type="button" class="btn btn-danger btn-block" onclick="checkCardAccept_ajax('.$value['ID_CARD'].','.$value['ID_ACCOUNT'].', 0,'.$start_page.')" value="Xóa">
                                        </td>
                                </tr>';
                            }
                        }
                    }
                }                       
            }                                                     
        }
    }                                     
?>