<?php
    //The purpose of the file is to destroy a session when a user wants to logout
    //from the website

    session_start();
    include '../obj/user.cs.php';
    //Started a session with custom properties
    // include 'sess.inc.php';
    //If the request is not from logged in user, redirect to original destination
    if(!isset($_SESSION['usr']))
    {
        // header("Location: {$_SERVER['HTTP_REFERER']}");
        echo "Ehhhhhhhh, something went wrong, if you logged in and wanted to
         log out, the condition must not have found the 'usr' variable in session";
         echo "<br>";
         print_r($_SESSION['usr']);
        exit();
    }

    $_SESSION =  array();
    session_destroy();
    setcookie('PHPSESSID', time()-3600);
    header("Location: ../../index.php");

 ?>
