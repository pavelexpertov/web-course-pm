<?php
//The purpose of the doc is to restore
//event type after it's been deleted.
$query = "update EventTypes set Archived = 0
	  where ID = ? and ManagerID = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
	echo "Ooops an error occured while restoring";
	exit();
}
$stmt->bind_param("ii", $_GET['etid'], $_SESSION['usr']->id);
$stmt->execute();
header("Location: ../../../usr_page.php");
exit();

?>
