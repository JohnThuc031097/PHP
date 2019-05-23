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
                    $result_info = $GLOBALS['sql_connect']->query("SELECT 
                                                                        ia.ID AS 'ID_INFO_ACCOUNT',
                                                                        ia.USERNAME,
                                                                        a.ID AS 'ID_ACCOUNT',
                                                                        a.EMAIL 
                                                                    FROM 
                                                                        info_account ia,
                                                                        account a 
                                                                    WHERE  
                                                                        a.EMAIL='".$_COOKIE['email']."' AND
                                                                        a.ID=ia.ID_ACCOUNT 
                                                                    LIMIT ".$queryLimit.",".$limit_page
                                                                );
                    if($result_info->num_rows>0){
                        while($row=$result_info->fetch_assoc()){
                            echo    '<tr>
                                        <td style="color:blue;">'.$row['USERNAME'].'</td>
                                        <td width="150px">
                                            <button type="submit" name="button-del_username"
                                                    class="btn btn-danger btn-block"
                                                    value="'.$row['ID_INFO_ACCOUNT'].'">Xóa
                                            </button>
                                        </td>
                                    </tr>';
                        }
                    }
                }                       
            }                                                     
        }
    }                                     
?>