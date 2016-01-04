<?php
    //This page is to print out a number of includes, which
    // are passed using an array and using foreach loop

    function placeBodyElement($includeList)
    {
?>
<body>
    <div id="mainwrapper">
    <?php
        foreach($includeList as $include)
        {
            include $include;
        }
    ?>
    </div>
</body>
</html>

<?php }//End of the palce bodyElement?>
