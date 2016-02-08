<?php
  //The purpose of the file is to insert (i.e. creating) a new venue
  //
  include '../../web_comp/place_sess_db_include.func.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  $columns = "ID, Name, Address, Town, Country, Capacity, ManagerID";

  $query = "insert into Venues($columns)
            values(0, ?, ?, ?, ?, ?, ?)";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      echo "<br>"; echo $mysqli->error;
      exit();
  }
  $stmt->bind_param("ssssii", $_POST['vname'], $_POST['addrss'],
  $_POST['town'], $_POST['country'], $_POST['cap'], $_POST['usrid']);
                    //$_SESSION['usr']->id);
  $stmt->execute();
  $stmt->close();
  //Redirect user back to usr page
  header("Location: ../../../usr_page.php");
  exit()
?>
