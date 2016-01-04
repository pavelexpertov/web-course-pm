<!-- This is an index page  -->
<?php
    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Adding head element and body elements
    include 'php/web_comp/head_element.func.php';
    include 'php/web_comp/body_element.func.php';
    placeHeadElement("Hello");

    //Adding header element
    $includeList[] = 'php/includes/sections/header_section.inc.php';
    //Adding section designated for index.php
    $includeList[] = 'php/includes/sections/index_section.inc.php';

    placeBodyElement($includeList);
?>
