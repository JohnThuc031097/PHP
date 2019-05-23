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

    if(isset($_POST['page'])){
        $result_count_card = $GLOBALS['sql_manager_connect']->query("SELECT COUNT(*) AS 'TOTAL' FROM card WHERE ID_ACCOUNT='".$result_account->fetch_assoc()['ID']."'");  
        if($result_count_card->num_rows>0){
            $isShowNextPage = TRUE;
            $isShowPrePage = TRUE;
            $limit_page = 3;
            $total_record_page = $result_count_card->fetch_assoc()['TOTAL'];
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
                echo '<strong>Total:</strong> <span style="color:blue;">'.$total_record_page.'</span> - <strong>Page</strong> ';
                if($isShowPrePage == TRUE) echo    '<input class="btn btn-info" type="button" name="prePage" id="prePage" onclick="loadPagination_ajax('.($start_page-1).')" value=" <<= "/>';
                echo    '  <span style="color:red;">'.$start_page.'</span> of '.$end_page.'  ';
                if($isShowNextPage == TRUE) echo    '<input class="btn btn-info" type="button" name="nextPage" id="nextPage" onclick="loadPagination_ajax('.($start_page+1).')" value=" =>> "/>';
            }
        }
    }
?>