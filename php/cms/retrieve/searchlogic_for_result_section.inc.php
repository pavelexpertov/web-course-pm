<?php
// The purpose of this page is to make a search query based on
// query that came either from simple or advanced search bar.

    //The variable below will be passed to a function, which will
    //use it to output values.
    $resultEvents = 'sdf';
    if(isset($_GET['simplesearch']))
    {
        echo "{$_GET['simplesearch']}";
        echo "It worked, it worked!!";

        $query = "select evename from search_view where eveid = ?";
        $resultEvents = $mysqli->prepare($query);
        $resultEvents->bind_param('i', $_GET['simplesearch']);
        $resultEvents->execute();
        $resultEvents->bind_result($name);
        $resultEvents->fetch();

        echo "The result of the query is $name";
    }
    else
    {
        echo "Ehhhhhhhhhh the get doesn't work for some reason";
    }
?>
