<?php
//The purpose is to toggle between rights
include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2, true);
foreach($listOfIncludes as $include)
    include $include;

$pwd = checkPassword($_POST['pwd']);
$fname = checkString($_POST['fname'], 25);
$lname = checkString($_POST['lname'], 25);
$job = checkString($_POST['job'], 25);
if(isset($_POST['bio_cbx']))
    $bio_cbx = checkCheckbox($_POST['bio_cbx']);
if(isset($_POST['biodesc']))
{
    if($_POST['biodesc'] == "")
        $biodesc = "null";
    else
        $biodesc = checkString($_POST['biodesc']);
}
$listOfVars = array($pwd, $fname, $lname, $job);
if(isset($bio_cbx))
    $listOfVars[] = $bio_cbx;
if(isset($biodesc))
    $listOfVars[] = $biodesc;
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
if(!arePasswordsEqual($pwd, $returnedpwd))
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
$columns = "FirstName = ?, LastName = ?, CurrentJob = ?,
            EventAdmin = ?, Description = ?";
$query = "update Users set $columns where ID = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
	echo "Ooops an error occured while restoring";
	exit();
}
if(isset($bio_cbx))
{
    $_SESSION['usr']->eveadmin = 1;
    $eveadmin = 1;
}
else
{
    $_SESSION['usr']->eveadmin = 0;
    $eveadmin = 0;
}

$stmt->bind_param("sssisi", $fname, $lname, $job,
                        $eveadmin, $biodesc, $_SESSION['usr']->id);
$stmt->execute();
$stmt->close();
header("Location: ../../../usr_page.php");
exit();

?>
