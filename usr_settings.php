<?php
    //<!-- This is speakers_list page -->
    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Checking if it's the legit user
    include 'php/usr/verify/check_if_user_legit.inc.php';
    //Adding head element
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("User Settings");

    $includeList[] = 'php/includes/sections/header_section.inc.php';
    $includeList[] = 'php/usr/includes/sections/usrpagesettings_section.inc.php';
    $includeList[] = 'php/includes/sections/footer_section.inc.php';
    placeBodyElement($includeList, "js/user_settings.js");
?>
