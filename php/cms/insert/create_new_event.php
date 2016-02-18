<?php
  //The purpose of the file is to insert (i.e. creating) a new event
  //
  include '../../web_comp/place_sess_db_include.func.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  //Clearing out errors
  if(isset($_SESSION['time_err']))
    unset($_SESSION['time_err']);
  //Creating variables for input
  $evename = checkString($_POST['evename']);
  $descr = checkString($_POST['descr']);
  $stime = checkTime($_POST['stime']);
  $ftime = checkTime($_POST['ftime']);
  $date = checkDateF($_POST['date']);
  $evetypeid = checkInt($_POST['evetype']);
  $venueid = checkInt($_POST['venueid']);

  //Checking for incorrect input
  $listOfVars = array();
  $listOfVars = $evename;
  $listOfVars = $descr;
  $listOfVars = $stime;
  $listOfVars = $ftime;
  $listOfVars = $date;
  $listOfVars = $evetypeid;
  $listOfVars = $venueid;

  include '../../cms/verifydata/check_for_false_vars.inc.php';

  $date = convertDate($date);
  if(!checkTimings($stime, $ftime))
  {
      $_SESSION['time_err'] = "You need to make starting time earlier than finishing time";
      header("Location: {$_SERVER['HTTP_REFERER']}");
      exit();
  }

  $columns = "ID, Name, Description, EManagerID,
              Date, StartTime, FinishTime,
              ConfType, VenueID";

  $query = "insert into Events($columns)
            values(0, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      echo $stmt->error;
      exit();
  }
  $stmt->bind_param("ssisssii", $evename, $descr, $_SESSION['usr']->id,
                           $date, $stime, $ftime,
                           $evetypeid, $venueid);
  $stmt->execute();
  $stmt->close();
  //Redirect user back to usr page
  header("Location: ../../../usr_page.php");
  exit()
?>
