<?php
//The purpose of the section is to delete a created event
//That's been chosen by the creator of the event.

include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);

print_r($listOfIncludes);

foreach($listOfIncludes as $include)
    include $include;
?>