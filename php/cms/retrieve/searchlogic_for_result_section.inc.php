<?php
// The purpose of this page is to make a search query based on
// query that came either from simple or advanced search bar.

    //The include gives a function that will output the result of the events.
    // include 'php/web_comp/result_events.func.php';
    //The variable below will be passed to a function, which will
    //use it to output values.
    $resultEvents = 'sdf';

    //These variables are used so I can customise the query easily
    //in mulitple if conditions
    $fields = " eveid, evename, etypename, date, stime, ftime, town, country, price";
    $view = "search_n_event_view";

    if(isset($_GET['simplesearch']))
    {

        $query = "select $fields from $view
                  where evename like ? or evedescr like ?";
        $resultEvents = $mysqli->prepare($query);
        if($resultEvents == false)
        { //This is used to check errors upon the query
            echo "oooops, something went wrong";
            echo $resultEvents->error_list;
        }

        $simplesearchq = '%' . $_GET['simplesearch'] . '%';

        $resultEvents->bind_param('ss', $simplesearchq, $simplesearchq);
        $resultEvents->execute();


        // placeEventResult($resultEvents);
    }
    else
    {
        echo "Ehhhhhhhhhh the get doesn't work for some reason";
    }
?>
