<?php
//The purpose of the section is to delete a event type
//That's been created by the user

include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);
foreach($listOfIncludes as $include)
    include $include;

$etid = checkInt($_GET['etid']);
$listOfVars = array($etid);
include '../../cms/verifydata/check_for_false_vars.inc.php';

//Deleting an event by assigning a flag to the event.
//--using get method to transfer id of the event.
//--SESSION array's usr contains id of the logged in user
//--Just assign 1 to booked event's Archived and that's it.
//--Return user back to where he came from

if($_SESSION['usr']->eveadmin != 2)
{
$query = "update EventTypes set Archived = 1
          where ID = ? and ManagerID = ?";

$stmt = $mysqli->prepare($query);
if($stmt == false)
{
    echo "Ooop an error has happened at prepare statement line";
    exit();
}
$stmt->bind_param("ii", $etid, $_SESSION['usr']->id);
$stmt->execute();
$stmt->close();
}
else
{
$query = "update EventTypes set Archived = 1
          where ID = ?";

$stmt = $mysqli->prepare($query);
if($stmt == false)
{
    echo "Ooop an error has happened at prepare statement line";
    exit();
}
$stmt->bind_param("i", $etid);
$stmt->execute();
$stmt->close();
}
//Return the user to the userpage
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
