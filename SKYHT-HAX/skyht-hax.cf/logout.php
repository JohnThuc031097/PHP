<?php  
    include ('lib/Function.php'); 
    session_destroy();                                        
    setcookie('name',null, -1, '/');
    setcookie('email',null, -1, '/');
    setcookie('password',null, -1, '/');    
    disconnectSQL();
    disconnectSQLM();      
    header('Location: login.php');                                
?>