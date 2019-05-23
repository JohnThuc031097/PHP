<?php 
    include ('../../lib/Function.php');
    if(!isset($_COOKIE['email'],$_COOKIE['password'])){
        header('Location: ../../logout.php');
    }
    connectSQL();
    if(!checkConnectSQL()) header('Location: ../../error.php');
    $result_account = checkAccountSQL($_COOKIE['email'], $_COOKIE['password']);
    if(!$result_account) header('Location: ../../logout.php');

    if(isset($_POST['page'])){
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
        if(($total = $result_count_account->num_rows)>0){
            $isShowNextPage = TRUE;
            $isShowPrePage = TRUE;
            $limit_page = 3;
            $total_record_page = $total;
            $start_page = $_POST['page'];
            $end_page = ceil($total_record_page/($limit_page));

            if($end_page > 0){
                if($start_page > $end_page){
                    $start_page = $end_page;            
                }
                if($start_page >= $end_page){
                    $isShowNextPage = FALSE;
                }
                if ($start_page < 1) {
                    $start_page = 1;               
                }
                if($start_page <= 1){
                    $isShowPrePage = FALSE;
                }
                echo '<strong>Total:</strong> <span style="color:blue;">'.$total.'</span> - <strong>Page</strong> ';
                if($isShowPrePage == TRUE) echo    '<input class="btn btn-info" type="button" name="prePage" id="prePage" onclick="loadPagination_ajax('.($start_page-1).')" value=" <<= "/>';
                echo    '  <span style="color:red;">'.$start_page.'</span> of '.$end_page.'  ';
                if($isShowNextPage == TRUE) echo    '<input class="btn btn-info" type="button" name="nextPage" id="nextPage" onclick="loadPagination_ajax('.($start_page+1).')" value=" =>> "/>';
            }
        }
    }
?>