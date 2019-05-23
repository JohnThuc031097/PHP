<?php 
session_start();
require_once ("Include.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
function connectSQL()
{
    $GLOBALS['sql_connect'] = new mysqli($GLOBALS['sql_host'], $GLOBALS['sql_username'], $GLOBALS['sql_password'], $GLOBALS['sql_dbname']);
}

function connectSQLM()
{
    $GLOBALS['sql_manager_connect'] = new mysqli($GLOBALS['sql_host'], $GLOBALS['sql_manager_username'], $GLOBALS['sql_manager_password'], $GLOBALS['sql_manager_dbname']);
}

function checkConnectSQL()
{
    if ($GLOBALS['sql_connect']->connect_error) {
        return false;
    } else {
        return true;
    }
}
function checkConnectSQLM()
{
    if ($GLOBALS['sql_manager_connect']->connect_error) {
        return false;
    } else {
        return true;
    }
}

function checkAccountSQL($email,$hash)
{
    $result = $GLOBALS['sql_connect']->query('SELECT *  
                                                  FROM account
                                                  WHERE EMAIL="'.$email.'"');
    if ($result->num_rows > 0) {
        if(password_verify($result->fetch_assoc()['PASSWORD'],$hash)){
            $result->data_seek(0);
            return $result;
        }
    }
    return false;
}

function checkEmail($email){
    $result = $GLOBALS['sql_connect']->query('SELECT EMAIL  
                                                  FROM account
                                                  WHERE EMAIL="'.$email.'"');
    if($result->num_rows>0){
        return true;
    }
    return false;
}

function checkAccountSQLM($username,$hash)
{
    $result = $GLOBALS['sql_manager_connect']->query('SELECT *  
                                                    FROM account
                                                    WHERE USERNAME="'.$username.'"');
    if ($result->num_rows > 0) {
        if(password_verify($result->fetch_assoc()['PASSWORD'],$hash)){
            $result->data_seek(0);
            return $result;
        }
    }
    return false;
}

function disconnectSQL()
{
    if (!empty($GLOBALS['sql_connect'])) {
        $GLOBALS['sql_connect']->close();
    }
}

function disconnectSQLM()
{
    if (!empty($GLOBALS['sql_manager_connect'])) {
        $GLOBALS['sql_manager_connect']->close();
    }
}

?>