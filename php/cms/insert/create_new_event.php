<?php
  //The purpose of the file is to insert (i.e. creating) a new event
  //
  include '../../web_comp/place_sess_db_include.func.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  //Creating variables for input
  $evename = $_POST['evename'];
  $descr = $_POST['descr'];
  $stime = $_POST['stime'];
  $ftime = $_POST['ftime'];
  $date = convertDate($_POST['date']);
  $evetypeid = $_POST['evetype'];
  $venueid = $_POST['venueid'];

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
