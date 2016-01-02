<section id="introduction">
    <!-- This section represents different types of events
    that are stored within small boxes -->
    <p>
        Welcome to the CoderCon! Here you can book tickets for workshops and conferences.
        Here is a list of boxes that describe each type of a conference or you can search
        for events using the search bar.
    </p>

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
