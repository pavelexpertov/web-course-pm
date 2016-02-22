<?php
//The purpose is to toggle between rights
include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);
foreach($listOfIncludes as $include)
    include $include;

$oldpwd = checkPassword($_POST['oldpwd']);
$newpwd = checkPassword($_POST['newpwd']);
$reppwd = arePasswordsEqual($_POST['reppwd'], $newpwd);
$listOfVars = array($oldpwd, $newpwd, $reppwd);
include '../../cms/verifydata/check_for_false_vars.inc.php';

$checkquery = "select Password from Users where ID = ?";
$checkstmt = $mysqli->prepare($checkquery);
if($checkstmt == false)
{
    echo "error happened";
    exit();
}
$checkstmt->bind_param("i", $_SESSION['usr']->id);
$checkstmt->execute();
$checkstmt->bind_result($returnedpwd);
$checkstmt->fetch();
$checkstmt->close();
if(!arePasswordsEqual($oldpwd, $returnedpwd))
{
    $_SESSION['errr'] = "Your password is incorrect. Try again!";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$query = "update Users set Password = ? where ID = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
	echo "Ooops an error occured while restoring";
	exit();
}
$stmt->bind_param("si", $newpwd, $_SESSION['usr']->id);
$stmt->execute();
$stmt->close();
header("Location: ../../../usr_page.php");
exit();

?>
