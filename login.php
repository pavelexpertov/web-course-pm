<?php

    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Adding head element and body elements
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("Login");

    //Adding header element
    $includeList[] = 'php/includes/sections/header_section.inc.php';
    //Adding section designated for login.php
    $includeList[] = 'php/includes/sections/loginpage_section.inc.php';

    placeBodyElement($includeList, "js/login_form.js");

 ?>
