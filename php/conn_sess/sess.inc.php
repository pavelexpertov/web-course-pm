<?php
    //The purpose of the file is to start a session and it
    //may have custom cookie settings
    //The include of the class file is necessary for the object class to work
    include 'php/obj/user.cs.php';
    session_set_cookie_params(0, '/');
    session_start();

    echo "<br>";
    echo $_SERVER['HTTP_REFERER'];
    echo "</br>";
    if($_SERVER['HTTP_REFERER'] == "http://localhost/web-course-pm/php/conn_sess/logout_logic.php")
    {
        $_SESSION =  array();
        session_destroy();
        setcookie('PHPSESSID', time()-3600);
        header("Location: index.php");
    }
 ?>
