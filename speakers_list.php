<!-- This is speakers_list page -->
<?php
    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Adding head element
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("List Of Speakers");

    $includeList[] = 'php/includes/sections/header_section.inc.php';
    $includeList[] = 'php/includes/sections/speakers_list_section.inc.php';
    placeBodyElement($includeList);
?>
