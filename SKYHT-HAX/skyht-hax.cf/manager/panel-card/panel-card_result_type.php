<?php 
    include ('../../lib/Function.php');
    connectSQL();
    connectSQLM();
    if(!checkConnectSQLM() || !checkConnectSQL()) header('Location: ../../error.php');
    $result_account = checkAccountSQLM($_COOKIE['username_manager'],$_COOKIE['password_manager']);
    if($result_account == FALSE) header('Location: ../logout.php');

    if(isset($_POST['id_card'],$_POST['id_user'],$_POST['accept'])){
        if($_POST['accept'] == 0){
            $result_delete_card = $GLOBALS['sql_manager_connect']->query("DELETE FROM card WHERE ID='".$_POST['id_card']."'");
            if($result_delete_card === TRUE){

            }
        }else{
            $result_update_status_card = $GLOBALS['sql_manager_connect']->query("UPDATE card SET STATUS='1' WHERE ID='".$_POST['id_card']."'");
            if ($result_update_status_card === TRUE) {
                $result_get_vnd_user = $GLOBALS['sql_connect']->query("SELECT ID,VND FROM account WHERE ID='".$_POST['id_user']."'");
                if($result_get_vnd_user->num_rows>0){
                    $vnd_user = $result_get_vnd_user->fetch_assoc()['VND'];
                    $result_get_vnd_card = $GLOBALS['sql_manager_connect']->query("SELECT 
                                                                                        c.ID,c.ID_CARD_INFO,c.ID_ACCOUNT, 
                                                                                        civ.ID,civ.CODE_VALUE 
                                                                                    FROM 
                                                                                        card c,card_info_values civ 
                                                                                    WHERE 
                                                                                        c.ID='".$_POST['id_card']."' AND 
                                                                                        c.ID_ACCOUNT='".$_POST['id_user']."' AND 
                                                                                        c.ID_CARD_INFO=civ.ID 
                                                                                ");
                    if($result_get_vnd_card->num_rows>0){
                        $vnd_card = $result_get_vnd_card->fetch_assoc()['CODE_VALUE'];
                        $result_update_vnd_user = $GLOBALS['sql_connect']->query("UPDATE account SET VND='".($vnd_card+$vnd_user)."' WHERE ID='".$_POST['id_user']."'");
                        if($result_update_vnd_user == TRUE){

                        }
                    }
                }
            }
        }
    }
?>