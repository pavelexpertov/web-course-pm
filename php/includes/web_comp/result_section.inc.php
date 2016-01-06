<!-- This page places a section for results  -->
<div>
    <?php
    include 'php/cms/retrieve/searchlogic_for_result_section.inc.php';
    //The function that prints out the results from the search logic
    include 'php/web_comp/result_events.func.php';
    placeEventResult($resultEvents);

    ?>
</div>
