<?php
//The purpose of the doc is to restore
//event type after it's been deleted.
include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);
foreach($listOfIncludes as $include)
    include $include;

$etid = checkInt($_GET['etid']);
$listOfVars = array($etid);
include '../../cms/verifydata/check_for_false_vars.inc.php';

$query = "update EventTypes set Archived = 0
	  where ID = ? and ManagerID = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
	echo "Ooops an error occured while restoring";
	exit();
}
$stmt->bind_param("ii", $etid, $_SESSION['usr']->id);
$stmt->execute();
header("Location: ../../../usr_page.php");
exit();

?>
