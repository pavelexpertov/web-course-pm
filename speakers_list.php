<!-- This is speakers_list page -->
<?php
    //Creating database connection and starting session
    include 'php/conn_sess/db_n_sess.inc.php';
    //Adding head element
    include 'php/web_comp/head_element.func.php';
    placeHeadElement("List Of Speakers");
?>
<body>
    <div id="mainwrapper">
        <?php
            //Adding header element
            include 'php/includes/sections/header_section.inc.php';
            //Adding section designated for speakers_list
            include 'php/includes/sections/speakers_list_section.inc.php';
        ?>
    </div>
</body>
