<?php 
    include ('../../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../../logout.php');
    }
    connectSQL();
    connectSQLM();
    if(!checkConnectSQL() || !checkConnectSQLM()) header('Location: ../../error.php');
    $result_account = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result_account) header('Location: ../../logout.php');

    if (isset($_POST['page'])) {               
        $id_account = $result_account->fetch_assoc()['ID'];
        $result_count_card = $GLOBALS['sql_manager_connect']->query("SELECT COUNT(*) AS 'TOTAL' FROM card WHERE ID_ACCOUNT='".$id_account."'");                      
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
                    $result = $GLOBALS['sql_manager_connect']->query("SELECT 
                                                                        c.*,
                                                                        ct.*,
                                                                        civ.* 
                                                                    FROM 
                                                                        card_type ct,card c,card_info_values civ 
                                                                    WHERE 
                                                                        c.ID_ACCOUNT='".$id_account."' AND 
                                                                        c.ID_CARD_INFO=civ.ID AND 
                                                                        civ.ID_TYPE=ct.ID 
                                                                    LIMIT ".$queryLimit.",".$limit_page);
                    if($result->num_rows>0){                    
                        while($row=$result->fetch_assoc()){
                            echo   '<tr>
                                        <td>'.$row['NAME'].'</td>
                                        <td>'.$row['SERI'].'</td>
                                        <td><span style="color:blue;">'.number_format($row['CODE_VALUE']).'</span></td>
                                        <td>'.$row['TRADE_DISCOUNT'].' %</td>
                                        <td>'.date('d-m-Y',strtotime($row['DATE'])).'</td>
                                        <td>'.($row['STATUS']==0?'<span style="color:red;"><strong>Waiting</strong></span>':'<span style="color:green;"><strong>Accept</strong></span>').'</td>
                                    </tr>';
                        }
                    }
                }                       
            }                                                     
        }
    }                                     
?>