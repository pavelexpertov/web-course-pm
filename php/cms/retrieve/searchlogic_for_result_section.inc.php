<?php
// The purpose of this page is to make a search query based on
// query that came either from simple or advanced search bar.

    include 'php/data_format/convert_date.func.php';
    //The include gives a function that will output the result of the events.
    // include 'php/web_comp/result_events.func.php';
    //The variable below will be passed to a function, which will
    //use it to output values.
    $resultEvents = NULL;

    //This is a set of variables that will contain arguments for the search query

    if(isset($_GET['simplesearch']) && $_GET['simplesearch'] != "")
        $simpleSearch = $_GET['simplesearch'];
    if(isset($_GET['adv-search']) && $_GET['adv-search'] != "")
        $advancedSearch = $_GET['adv-search'];
    if(isset($_GET['date']) && $_GET['date'] != "")
        $date = convertDate($_GET['date']);
    if(isset($_GET['venueid']))
        $venueId = $_GET['venueid'];
    if(isset($_GET['evetype']))
        $eveType = $_GET['evetype'];

    $listOfVars = array();
    if(isset($_GET['simplesearch']) && $_GET['simplesearch'] != "")
        $listOfVars[] = $simpleSearch;
    if(isset($_GET['adv-search']) && $_GET['adv-search'] != "")
        $listOfVars[] = $advancedSearch;
    if(isset($_GET['venueid']))
        $listOfVars[] = $venueId;
    if(isset($_GET['date']) && $_GET['date'] != "")
        $listOfVars[] = $date;
    if(isset($_GET['evetype']))
        $listOfVars[] = $eveType;

    //if the list is not empty
    if(count($listOfVars) != 0)
        include 'php/cms/verifydata/check_for_false_vars.inc.php';

    //These variables are used so I can customise the query easily
    //in mulitple if conditions
    $fields = " eveid, evename, etypename, date, stime, ftime, town, country, price";
    $view = "search_n_event_view2";

    if(isset($_GET['simplesearch']) && !isset($_GET['adv-search']))
    {

        $query = "select $fields from $view
                  where evename like ? or evedescr like ?";
        $resultEvents = $mysqli->prepare($query);
        if($resultEvents == false)
        { //This is used to check errors upon the query
            echo "oooops, something went wrong";
            echo $resultEvents->error_list;
        }

        if($_GET['simplesearch'] != "")
            $simplesearchq = '%' . $simpleSearch . '%';
        else
            $simplesearchq = '%' . "" . '%';


        $resultEvents->bind_param('ss', $simplesearchq, $simplesearchq);
        $resultEvents->execute();


        // placeEventResult($resultEvents);
    }
    elseif(isset($_GET['adv-search']) && $_GET['adv-search'] != "")
    {//If complicated search has been used
        //Logic of figuring out what the stuff is
        $listOfCond = array();
        if(isset($venueId))
            $listOfCond[] = "VenueID = $venueId";
        if(isset($eveType))
            $listOfCond[] = "ConfType = $venueId";
        if(isset($date))
            $listOfCond[] = "ConfType = $venueId";

    }
    else
    {
        echo "Type in a search box to search for events";
    }
?>
