<?php
// <!-- This is an page Allows users to create their own account-->
    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Adding head element and body elements
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("Create an account");

    //Adding header element
    $includeList[] = 'php/includes/sections/header_section.inc.php';
    //Adding section designated for event_info.php
    $includeList[] = 'php/includes/sections/createaccount_section.inc.php';
    $includeList[] = 'php/includes/sections/footer_section.inc.php';

    placeBodyElement($includeList, "js/create_usr_account.js");
?>
