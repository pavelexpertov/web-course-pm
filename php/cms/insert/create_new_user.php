<?php
//The purpose of the page is to collect some needed information before creating
//an account and then create an account using the insert statement
include '../../web_comp/place_sess_db_include.func.php';
$listOfIncludes = placeSDIncludes(2);
foreach($listOfIncludes as $include)
    include $include;


//Clear the error message just in case
if(isset($_SESSION['err']))
{
    unset($_SESSION['err']);
}

$fname = checkString($_POST['fname'], 25);
$lname = checkString($_POST['lname'], 25);
$job = checkString($_POST['job'], 25);
$usrname = checkUsername($_POST['usrname']);
$usrpwd = checkPassword($_POST['usrpwd']);
$reppwd = arePasswordsEqual($usrpwd, $_POST['reppwd']);
if(isset($_POST['bio_cbx']) && isset($_POST['biodesc']))
{
    $evemancbx = checkCheckbox($_POST['bio_cbx']);
    if($_POST['biodesc'] != "")
        $biodesc = checkString($_POST['biodesc']);
    else
        $biodesc = "No description";
}

$listOfVars = array();
$listOfVars[] = $usrname;
$listOfVars[] = $usrpwd;
$listOfVars[] = $reppwd;
if(isset($_POST['bio_cbx']) && isset($_POST['biodesc']))
{
    $listOfVars[] = $evemancbx;
    $listOfVars[] = $biodesc;
}
include '../../cms/verifydata/check_for_false_vars.inc.php';

//First stage is to collect some needed info to check against (i.e. existing username)
$query = "select Username from Users where Username = ?";
$usrnamestmt = $mysqli->prepare($query);
$usrnamestmt->bind_param('s', $usrname);
$usrnamestmt->execute();
$usrnamestmt->store_result();
$numOfQueries = $usrnamestmt->num_rows;
//Second stage is to compare the usrname against the post's
if($numOfQueries == 1)
{
    $usrnamestmt->bind_result($existusrname);
    $usrnamestmt->close();
    if($existusrname == $_POST['usrname'])
        $_SESSION['ue'] = "The username already exists";
    $returnaddress = $_SERVER['HTTP_REFERER'] . "?ue=The username already exists";
    header("Location: $returnaddress");
    exit();
}
elseif($numOfQueries > 1)
{
    $_SESSION['err'] = "For some reason you got more than one query you asked for, for username or email";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

//If all passed, you can insert the info into the database
if(isset($evemancbx) && $evemancbx) //If it's an event manager
{
$query = "insert into Users(ID, Username,
                Password, Description, EventAdmin, CurrentJob, FirstName, LastName)
          values(0, ?, ?, ?, 1, ?, ?, ?)";
$insertstmt = $mysqli->prepare($query);
if($insertstmt == false)
{
    echo "An error happened for the prepared statement within first if clause";
    echo $mysqli->error;
    exit();
}
$insertstmt->bind_param('sss', $usrname, $usrpwd, $biodesc);
if($insertstmt == false)
{
    echo "Oppppps, error happened while inserting";
    exit();
}
$insertstmt->execute();
$insertstmt->close();
}
else //If it's just the user
{
    $query = "insert into Users(ID, Username,
                    Password, EventAdmin)
              values(0, ?, ?, 0)";
    $stmt = $mysqli->prepare($query);
    if($stmt == false)
    {
        echo "An error happened for the prepared statement within else clause";
        echo $mysqli->error;
        exit();
    }
    $stmt->bind_param('ss', $usrname, $usrpwd);
    $stmt->execute();
    $stmt->close();
}
header("Location: {$_SERVER['HTTP_REFERER']}");
header("Location: ../../../index.php");
 ?>
