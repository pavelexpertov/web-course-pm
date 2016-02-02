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
  $query = "select Name, Description from Events where ID = ?";
  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
    echo "Oooops, there's been an error while passing a query";
    echo $stmt->error_list;
    exit();
  }
  $stmt->bind_param('i', $_GET['eid']);
  $stmt->execute();

  //Checking for a number of queries
  $stmt->store_result();
  $returnedquery = $stmt->num_rows;
  if($returnedquery != 1)
  {
    echo "One query has not returned. the value of query is $returnedquery";
    exit();
  }

  $stmt->bind_result($evename, $evedescr);
  $stmt->fetch();
  $stmt->close();

 ?>
<form action="php/cms/update/update_created_event.php" method="post">
  <fieldset>
    <legend>Edit your event</legend>
    <label> Event Name</label>
    <input type="text" name="evename" id="evename" value = "<?php echo $evename; ?>" >
    <textarea name="descr" id="descr"><?php echo $evedescr; ?> </textarea>
    <input type="hidden" name="eid" id="eid" value="<?php echo $_GET['eid']; ?>">
    <input type="submit" value="Send the changes">
  </fieldset>

</form>
