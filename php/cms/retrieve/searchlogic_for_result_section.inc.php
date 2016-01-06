<?php
// The purpose of this page is to make a search query based on
// query that came either from simple or advanced search bar.

    //The include gives a function that will output the result of the events.
    include 'php/web_comp/result_events.func.php';
    //The variable below will be passed to a function, which will
    //use it to output values.
    $resultEvents = 'sdf';

    //These variables are used so I can customise the query easily
    //in mulitple if conditions
    $fields = " eveid, evename, etypename, date, stime, ftime, town, country, price";
    // $fields = " eveid, evename";
    $view = "search_n_event_view";

    if(isset($_GET['simplesearch']))
    {
        echo "{$_GET['simplesearch']}";
        echo "It worked, it worked!!\n";

        // $query = "select $fields from $view where eveid = ?";
        // $query = "select $fields from $view where evename = ?";
        $query = "select $fields from $view where evename like ? or evedescr like ?";
                        echo "\n$query";
        $resultEvents = $mysqli->prepare($query);
        if($resultEvents == false)
        {
            echo "oooops, something went wrong";
            echo $resultEvents->error_list;
        }

        // $getmethod = "'%" . $_GET['simplesearch'] . "%'";
        // $simplesearchq = '%' . 'test' . '%';
        $simplesearchq = '%' . $_GET['simplesearch'] . '%';
        echo "\ngetmethod = $simplesearchq";

        $resultEvents->bind_param('ss', $simplesearchq, $simplesearchq);
        $resultEvents->execute();


        placeEventResult($resultEvents);
    }
    else
    {
        echo "Ehhhhhhhhhh the get doesn't work for some reason";
    }
?>
