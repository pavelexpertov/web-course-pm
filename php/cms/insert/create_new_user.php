<?php
//The purpose of the page is to collect some needed information before creating
//an account and then create an account using the insert statement
include '../../web_comp/place_sess_db_include.func.php';
// include '../../obj/user.cs.php';
$listOfIncludes = placeSDIncludes(2);
foreach($listOfIncludes as $include)
    include $include;

//Clear the error message just in case
if(isset($_SESSION['err']))
{
    unset($_SESSION['err']);
}
//First stage is to collect some needed info to check against (i.e. existing username)
$query = "select Username from Users where Username = ?";
$usrnamestmt = $mysqli->prepare($query);
$usrnamestmt->bind_param('s', $_POST['usrname']);
$usrnamestmt->execute();
$usrnamestmt->store_result();
$numOfQueries = $usrnamestmt->num_rows;
//Second stage is to compare the usrname against the post's
if($numOfQueries == 1)
{
    $usrnamestmt->bind_result($existusrname);
    $usrnamestmt->close();
    if($existusrname == $_SESSION['usrname'])
        $_SESSION['err'] = "The username already exists";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
elseif($numOfQueries > 1)
{
    $_SESSION['err'] = "For some reason you got more than one query you asked for, for username or email";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

//If all passed, you can insert the info into the database
$query = "insert into Users(ID, Username, Password, Description)
          values(?, ?, ?, ?)";
$insertstmt = $mysqli->prepare($query);
$a = 0;
$insertstmt->bind_param('isss', $a, $_SESSION['usrname'], $_SESSION['usrpwd'],
                        $_SESSION['biodesc']);
if($insertstmt == false)
{
    echo "Oppppps, error happened while inserting";
    exit();
}
$insertstmt->execute();
$insertstmt->close();
$_SESSION['err'] = "successfully created an account";
header("Location: {$_SERVER['HTTP_REFERER']}");


 ?>
