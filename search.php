<?php
    include 'php/conn_sess/db_n_sess.inc.php';

    //Adding head element
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("Speaker's information");
    //Adding body element
    $includeList[] = 'php/includes/sections/header_section.inc.php';
    $includeList[] = 'php/includes/sections/searchpage_section.php';
    placeBodyElement($includeList);
 ?>
