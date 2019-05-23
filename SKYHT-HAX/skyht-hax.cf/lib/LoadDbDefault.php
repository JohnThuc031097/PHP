<?php 

    $result = $GLOBALS['sql_manager_connect']->query("SELECT FILENAME FROM background_index");
    $_SESSION['bgr_index'] = ($result->num_rows>0 ? $result->fetch_assoc()['FILENAME'] : '');

    $result = $GLOBALS['sql_manager_connect']->query("SELECT FILENAME FROM image_menu_hack");
    if($result->num_rows>0){
        $_SESSION['image_menu_hack'] = array();
        while($row = $result->fetch_assoc()){
            array_push($_SESSION['image_menu_hack'], $row['FILENAME']);
        }
    }
    $GLOBALS['sql_manager_connect']->query("SET character_set_results='utf8'");
    $result = $GLOBALS['sql_manager_connect']->query("SELECT * FROM info_skills_hack");
    if($result->num_rows>0){
        $_SESSION['info_skills_hack'] = array();
        $_SESSION['info_skills_hack'][0] = array();
        $_SESSION['info_skills_hack'][1] = array();
        $i = 0;
        while($row = $result->fetch_assoc()){
            array_push($_SESSION['info_skills_hack'][$i++], $row['SKILLS_NEW'], $row['SKILLS_HOT'], $row['SKILLS']);
        }
    }
?>