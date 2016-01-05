<?php
// The purpose of this page is to make a search query based on
// query that came either from simple or advanced search bar.

    if(isset($_GET['simplesearch']))
    {
        echo "{$_GET['simplesearch']}";
        echo "It worked, it worked!!";
    }
    else
    {
        echo "Ehhhhhhhhhh the get doesn't work for some reason";
    }
?>
