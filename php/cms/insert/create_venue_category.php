<?php
  //The purpose of the file is to insert (i.e. creating) a new venue
  //
  include '../../web_comp/place_sess_db_include.func.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  $vname = checkString($_POST['vname']);
  $addrss = checkString($_POST['addrss']);
  $town = checkString($_POST['town']);
  $country = checkString($_POST['country']);
  $cap = checkString($_POST['cap']);
  $listOfVars = array($vname, $addrss, $town, $country, $cap);
  include '../../cms/verifydata/check_for_false_vars.inc.php';

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
  $stmt->bind_param("ssssii", $vname, $addrss,
  $town, $country, $cap, $_SESSION['usr']->id);
                    //$_SESSION['usr']->id);
  $stmt->execute();
  $stmt->close();
  //Redirect user back to usr page
  header("Location: ../../../usr_page.php");
  exit()
?>
