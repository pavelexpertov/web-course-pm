<?php
// <!-- This is an page that presents event's information  -->
    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Adding head element and body elements
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("Event's inforamtion");

    //Adding header element
    $includeList[] = 'php/includes/sections/header_section.inc.php';
    //Adding section designated for event_info.php
    $includeList[] = 'php/includes/sections/eventinfo_section.inc.php';

    placeBodyElement($includeList, "js/event_info.js");
?>
