<section id="introduction">
    <!-- This section represents different types of events
    that are stored within small boxes -->
    <?php
        include 'php/web_comp/small_info_box.func.php';
        $listOfEventTypes[] = array('Header 1', 'Desciption 1');
        $listOfEventTypes[] = array('Header 2', 'Desciption 2');

        foreach($listOfEventTypes as $eventType)
        {
            printSmallInfoBox($eventType[0],$eventType[1]);
        }
    ?>

</section>
