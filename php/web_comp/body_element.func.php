<?php
    //This page is to print out a number of includes, which
    // are passed using an array and using foreach loop

    function placeBodyElement($includeList, $scriptpath = "none")
    {
?>
<body>
    <div id="mainwrapper">
    <?php
        include "php/conn_sess/dbconn.inc.php";
        // include "php/conn_sess/db_n_sess.inc.php";
        foreach($includeList as $include)
        {
            include $include;
        }
    ?>
    </div>
    <?php // If a javascript file is provided
    if($scriptpath != "none")
    {
        ?>
        <script src="<?php echo $scriptpath; ?>"></script>
<?php
    }

     ?>
</body>
</html>

<?php }//End of the palce bodyEment?>
