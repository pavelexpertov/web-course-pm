<?php
//The purpose is to toggle between rights
include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);
foreach($listOfIncludes as $include)
    include $include;


if($_SESSION['usr']->eveadmin)
{
    $query = "update Users set EventAdmin = 0 where ID = ?";
    $_SESSION['usr']->eveadmin = false;
}
else
{
    $query = "update Users set EventAdmin = 1 where ID = ?";
    $_SESSION['usr']->eveadmin = true;
}

$stmt = $mysqli->prepare($query);
if($stmt == false)
{
	echo "Ooops an error occured while restoring";
	exit();
}
$stmt->bind_param("i", $_SESSION['usr']->id);
$stmt->execute();
header("Location: ../../../usr_page.php");
exit();

?>
