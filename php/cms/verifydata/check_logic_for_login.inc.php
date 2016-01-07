<?php
    //This is for error reporting
    // include '../../debug/turn_on_error_reporting.php';
    include '../../web_comp/place_sess_db_include.func.php';
    $list = placeSDIncludes(2);

    foreach($list as $include)
    {
        include $include;
    }

    //This is for database stuff
    // include '../../conn_sess/db_n_sess.inc.php';
    //Clear out the error variable
    if(isset($_SESSION['err']))
        unset($_SESSION['err']);

    //check the variables exist
    if(!isset($_POST['usr']) || !isset($_POST['pwd']))
    {
        $_SESSION['err'] = "Ooops, not enough variables been passed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $query = "select ID, Username, Password from Users where Username = ?";
    $querystmt = $mysqli->prepare($query);
    $querystmt->bind_param('i', $_POST['usr']);
    if($querystmt == false){
        $_SESSION['err'] = "Some problem with prepared statement " . $querystmt->error_list;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    $querystmt->execute();
    //Checking for a number of queries
    $querystmt->store_result();
    $usr_exist = $querystmt->num_rows;
    if($usr_exist == 0)
    {
        $_SESSION['err'] = "the values of usr_exit is $usr_exist";
        // $_SESSION['err'] = "Unfortunately incorrect username or password. Try again.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $querystmt->bind_result($usrid, $usrname, $usrpwd);
    $querystmt->fetch();
    $querystmt->close();
    if($_POST['pwd'] != $usrpwd)
    {
        $_SESSION['err'] = "Unfortunately incorrect username or password. Try again.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "usrpwd from post value is: {$_POST['pwd']} <br>";
        // echo "usrpwd from query is: $usrpwd <br>";
        exit();
    }




 ?>
