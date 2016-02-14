<?php
    function placeHeadElement($title)
    {
        ?>
        <!doctype html>
        <html>
        <head>

            <title> <?php echo $title; ?> </title>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
            <link rel="stylesheet" type="text/css" href="css/style.css">
        </head>

<?php }//End of the placeHeadElement function ?>
