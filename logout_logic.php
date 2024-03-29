<?php
    //The purpose of the file is to destroy a session when a user wants to logout
    //from the website

    // session_set_cookie_params(0, '../../');
    // session_start();
    // include '../obj/user.cs.php';
    //Started a session with custom properties
    include 'php/conn_sess/sess.inc.php';
    //If the request is not from logged in user, redirect to original destination
    if(!isset($_SESSION['usr']))
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $_SESSION =  array();
    session_destroy();
    setcookie('PHPSESSID', time()-3600);
    header("Location: index.php");

 ?>
