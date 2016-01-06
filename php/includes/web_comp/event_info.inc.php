<!-- The purpose of the section is to present information about the event -->
<section>
    <?php
        //Getting some information about the query
        $fields = " evename, evedescr,
                    etypename, evedescr,
                    date, stime, ftime, noab, price,
                    venuename, address, town, country,
                    managerid, managerln, managerfn";
        $view = "search_n_event_view2";
        $query = "select $fields from $view where eveid = ?";

        $resultEvent = $mysqli->prepare($query);
        if($resultEvent == false)
        {
            echo "ops, something went wrong for the event";
            echo $resultEvents->error_list;
        }

        $resultEvent->bind_param('i', $_GET['eid']);
        $resultEvent->execute();
        $resultEvent->bind_result($evename, $evedescr,
                    $etypename, $evedescr,
                    $date, $stime, $ftime, $noab, $price,
                    $venuename, $address, $town, $country,
                    $managerid, $managerln, $managerfn);
        $resultEvent->fetch();
        $resultEvent->close();

        echo $price;



    ?>

</section>
