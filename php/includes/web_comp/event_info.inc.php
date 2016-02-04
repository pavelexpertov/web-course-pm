<!-- The purpose of the section is to present information about the event -->
<section>
    <?php
        //Pasting a small booking section so user can book the event.
        include 'php/includes/web_comp/bookingevent_small_section.inc.php';
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

        echo $evename;
        echo "<br>";
        echo $price;



    ?>

</section>
