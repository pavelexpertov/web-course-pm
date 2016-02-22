<?php
  //The purpose of the document is to update data entries
  //for a certain event that belongs to the event manager (i.e. user)
  include '../../web_comp/place_sess_db_include.func.php';
  //include '../../obj/user.cs.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  $vname = checkString($_POST['vname']);
  $addrss = checkString($_POST['addrss']);
  $town = checkString($_POST['town']);
  $country = checkString($_POST['country']);
  $cap = checkString($_POST['cap']);
  $vid = checkInt($_POST['vid']);
  $listOfVars = array($vname, $addrss, $town, $country, $cap, $vid);
  include '../../cms/verifydata/check_for_false_vars.inc.php';

  //The statement updates existing entries for event's data
  //The event's event's name and start time are updated
  if($_SESSION['usr']->eveadmin != 2)
  {
  $query = "update Venues set Name = ?, Address = ?,
            Town = ?, Country = ?, Capacity = ?
            where ManagerID = ? and ID = ?";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      echo $mysqli->error_list;
      exit();
  }

  $stmt->bind_param("ssssiii", $vname, $addrss,
                    $town, $country, $cap,
                    $_SESSION['usr']->id, $vid);
  $stmt->execute();
  $stmt->close();
  }
  else
  {
  $query = "update Venues set Name = ?, Address = ?,
            Town = ?, Country = ?, Capacity = ?
            where ID = ?";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      echo $mysqli->error_list;
      exit();
  }

  $stmt->bind_param("ssssii", $vname, $addrss,
                    $town, $country, $cap, $vid);
  $stmt->execute();
  $stmt->close();
  }
  //Return the user to the userpage
  header("Location: ../../../usr_page.php");
  exit();

 ?>
