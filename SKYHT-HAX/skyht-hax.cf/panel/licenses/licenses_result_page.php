<?php 
    include ('../../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../../logout.php');
    }
    connectSQL();
    if(!checkConnectSQL()) header('Location: ../../error.php');
    $result_account = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result_account) header('Location: ../../logout.php');

    if (isset($_POST['page'])) {                          
        $result_count_account = $GLOBALS['sql_connect']->query("SELECT 
                                                                a.ID AS 'ID_ACCOUNT', 
                                                                ia.ID AS'ID_GAME_OF_ACCOUNT' 
                                                            FROM 
                                                                info_account ia, 
                                                                account a 
                                                            WHERE 
                                                                a.ID='".$result_account->fetch_assoc()['ID']."' AND 
                                                                a.ID=ia.ID_ACCOUNT 
                                                        ");            
        if (($total = $result_count_account->num_rows)>0) {
            $limit_page = 3;
            $total_record_page = $total;

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
                    $result_info_username = $GLOBALS['sql_connect']->query("SELECT 
                                                                                a.*,
                                                                                ia.*,
                                                                                ipr.ID AS 'ID_PACKAGES',ipr.ID_INFO_ACCOUNT,ipr.D_BEGIN,ipr.D_END 
                                                                            FROM 
                                                                                account a,
                                                                                info_account ia,
                                                                                info_packages_rented ipr 
                                                                            WHERE 
                                                                                a.EMAIL='".$_COOKIE['email']."' AND
                                                                                a.ID=ia.ID_ACCOUNT AND
                                                                                ia.ID=ipr.ID_INFO_ACCOUNT 
                                                                            LIMIT ".$queryLimit.",".$limit_page 
                                                                        );
                    if($result_info_username->num_rows>0){
                        while($row = $result_info_username->fetch_assoc()){
                            echo    '<tr>
                                        <td><strong style="color:blue;">'.$row['USERNAME'].'</strong></td>
                                        <td>'.date('d-m-Y', strtotime($row['D_BEGIN'])).'</td>
                                        <td>'.date('d-m-Y', strtotime($row['D_END'])).'</td>
                                        <td>'.(date('Y-m-d', strtotime($row['D_END']))>=date('Y-m-d')?'<span style="color:green;"><strong>Đang sử dụng</strong></span>':'<span style="color:red;"><strong>Hết hạn</strong></span>').'</td>
                                    </tr>';
                        }
                    }
                }                       
            }                                                     
        }
    }                                     
?>