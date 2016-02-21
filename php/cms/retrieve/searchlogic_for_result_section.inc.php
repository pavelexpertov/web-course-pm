<?php
// The purpose of this page is to make a search query based on
// query that came either from simple or advanced search bar.

    include_once 'php/data_format/convert_date.func.php';
    include_once 'php/cms/verifydata/valid_serial_data.func.php';
    //The include gives a function that will output the result of the events.
    // include 'php/web_comp/result_events.func.php';
    //The variable below will be passed to a function, which will
    //use it to output values.
    $resultEvents = NULL;

    //This is a set of variables that will contain arguments for the search query

    if(isset($_GET['simplesearch']) && $_GET['simplesearch'] != "")
        $simpleSearch = checkString($_GET['simplesearch']);
    if(isset($_GET['adv-search']) && $_GET['adv-search'] != "")
        $advancedSearch = checkString($_GET['adv-search']);
    else
        $advancedSearch = "NULL321";
    if(isset($_GET['date']) && $_GET['date'] != "")
        $date = checkDateF($_GET['date']);
    if(isset($_GET['venueid']) && $_GET['venueid'] != "all")
        $venueId = checkInt($_GET['venueid']);
    if(isset($_GET['evetype']) && $_GET['evetype'] != "all")
        $eveType = checkInt($_GET['evetype']);

    $listOfVars = array();
    if(isset($_GET['simplesearch']) && $_GET['simplesearch'] != "")
        $listOfVars[] = $simpleSearch;
    if(isset($_GET['adv-search']) && $_GET['adv-search'] != "")
        $listOfVars[] = $advancedSearch;
    if(isset($_GET['venueid']) && $_GET['venueid'] != "all")
        $listOfVars[] = $venueId;
    if(isset($_GET['date']) && $_GET['date'] != "")
        $listOfVars[] = $date;
    if(isset($_GET['evetype']) && $_GET['evetype'] != "all")
        $listOfVars[] = $eveType;

    //if the list is not empty
    if(count($listOfVars) != 0)
        include 'php/cms/verifydata/check_for_false_vars.inc.php';

    if(isset($date))
        $date = convertDate($date);
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
    elseif(isset($_GET['adv-search']))
    {//If complicated search has been used
        //Logic of figuring out what the stuff is
        $listOfCond = array();
        if(isset($venueId))
            $listOfCond[] = "VenueID = $venueId";
        if(isset($eveType))
            $listOfCond[] = "ConfType = $eveType";
        if(isset($date))
            $listOfCond[] = "Date = '$date'";

        $stringofcond = "";
        if(count($listOfCond) > 0)
        {
            $stringofcond = implode(" and ", $listOfCond);
            $stringofcond = "and " . $stringofcond;
        }

        //echo $stringofcond . "<br>";
        //Setting up query
        $query = "select $fields from $view
                  where eveid in (select ID from Events
                   where (Name like ? or Description like ?) $stringofcond)";
        //echo $query . "<br>";
        //exit();
        $resultEvents = $mysqli->prepare($query);
        if($resultEvents == false)
        {
            echo "Something happened in clause where adv-search is used <br>";
            echo $resultEvents->error_list;
            exit();
        }

        if($advancedSearch != "NULL321")
          $stringQuery = '%' . $advancedSearch . '%';
        else
          $stringQuery = "%%";

        $resultEvents->bind_param("ss", $stringQuery, $stringQuery);
        $resultEvents->execute();
//NULL321

    }
    else
    {
        echo "Type in a search box to search for events";
    }
?>
