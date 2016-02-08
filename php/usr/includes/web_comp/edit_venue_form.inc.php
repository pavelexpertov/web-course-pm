<!-- <form action="php/cms/update/update_created_event.php" method="post">
  <fieldset>
    <legend>Edit your event</legend>
    <label> Event Name</label>
    <input type="text" value = "This is the name to edit for" >
    <textarea>This is a text to edit </textarea>
    <input type="submit" value="Send the changes">
  </fieldset>

</form> -->

<?php
  //The purpose of the page is to get information about existing event
  //and enter it into the form field elements for the user to edit
  //Creating a query
  $query = "select Name, Address, Town, Country, Capacity
            from Venues where ID = ?";
  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
    echo "Oooops, there's been an error while passing a query";
    echo $stmt->error_list;
    exit();
  }
  $stmt->bind_param('i', $_GET['vid']);
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
<form action="php/cms/update/update_venue.php" method="post">
    <fieldset>
      <legend>Edit Venue</legend>
      <label>Venue name</label>
      <input type="text" id="vname" name="vname" value="<?php echo $name; ?>">
      <label>Town</label>
      <input type="text" id="town" name="town" value="<?php echo $town;?>">
      <label>Country</label>
      <input type="text" id="country" name="country" value="<?php echo $country;?>">
      <label>Venue's address</label>
      <textarea id="addrss" name="addrss"> <?php echo $add;?></textarea>
      <label>Capacity</label>
      <input type="text" id="cap" name="cap" value="<?php echo $cap;?>">
      <input type="submit" value="Create a new event">
      <input type="hidden" name="vid" value="<?php echo $_GET['vid'];?>">
    </fieldset>
</form>
