<?php
  //The purpose of the page is to get information about existing event
  //and enter it into the form field elements for the user to edit
  //Creating a query
  include 'php/cms/verifydata/valid_serial_data.func.php';
  include 'php/web_comp/button_element.func.php';
  $vid = checkInt($_GET['vid']);
  $listOfVars = array($vid);
  include 'php/cms/verifydata/check_for_false_vars.inc.php';

  $query = "select Name, Address, Town, Country, Capacity
            from Venues where ID = ?";
  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
    echo "Oooops, there's been an error while passing a query";
    echo $stmt->error_list;
    exit();
  }
  $stmt->bind_param('i', $vid);
  $stmt->execute();

  //Checking for a number of queries
  $stmt->store_result();
  $returnedquery = $stmt->num_rows;
  if($returnedquery != 1)
  {
    echo "One query has not returned. the value of query is $returnedquery";
    exit();
  }

  $stmt->bind_result($name, $add, $town, $country, $cap);
  $stmt->fetch();
  $stmt->close();

 ?>
<form id="venue-form" action="php/cms/update/update_venue.php" method="post">
    <fieldset>
      <legend>Edit Venue</legend>
      <label>Venue name</label>
      <input type="text" id="vname" name="vname" value="<?php echo $name; ?>">
      <br>
      <label>Town</label>
      <input type="text" id="town" name="town" value="<?php echo $town;?>">
      <br>
      <label>Country</label>
      <input type="text" id="country" name="country" value="<?php echo $country;?>">
      <br>
      <label>Venue's address</label>
      <br>
      <textarea id="addrss" name="addrss"><?php echo $add;?></textarea>
      <br>
      <label>Capacity</label>
      <input type="text" id="cap" name="cap" value="<?php echo $cap;?>">
      <br>
      <input type="submit" value="Save Changes">
      <br>
      <?php placeButton("Cancel", "usr_page.php");?>
      <input type="hidden" name="vid" value="<?php echo $vid;?>">
    </fieldset>
</form>
