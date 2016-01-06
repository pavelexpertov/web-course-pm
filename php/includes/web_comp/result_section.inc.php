<!-- This page places a section for results  -->
<div>
    <?php
    //places logic code here. Remember there is a variable that gets assigned with
    //null value and you have to check it before calling placeEventResult function
    include 'php/cms/retrieve/searchlogic_for_result_section.inc.php';
    //The function that prints out the results from the search logic
    include 'php/web_comp/result_events.func.php';
    if(!is_null($resultEvents))
        placeEventResult($resultEvents);

    ?>
</div>
