<?php
//The purpose of the section is to delete a created event
//That's been chosen by the creator of the event.

include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);

print_r($listOfIncludes);

foreach($listOfIncludes as $include)
    include $include;

//Deleting an event by assigning a flag to the event.
//--using post method to transfer id of the event.
//--SESSION array's usr contains id of the logged in user
//--Just assign 1 to event's Archived and that's it.
//--Return user back to where he came from

$query = "update Events set Archived = 1
          where EManagerID = ? and ID = ?";

$stmt = $mysqli->prepare($query);
if($stmt == false)
{
    echo "Ooop an error has happened at prepare statement line";
    exit();
}
$stmt->bind_param("ii", $_SESSION['usr']->id, $_GET['eid']);
$stmt->execute();
$stmt->close();
//Return the user to the userpage
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
