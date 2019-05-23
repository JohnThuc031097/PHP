<?php 
    include ('../lib/Function.php');
    session_destroy();
    setcookie('name_manager', null, -1, '/');
    setcookie('username_manager', null, -1, '/');
    setcookie('password_manager', null, -1, '/');
    disconnectSQL();
    disconnectSQLM();
    header('Location: index.php');
?>