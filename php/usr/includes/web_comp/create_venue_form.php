<form action="php/cms/insert/create_venue_category.php" method="post">
    <fieldset>
      <legend>Create a new Venue</legend>
      <label>Venue name</label>
      <input type="text" id="vname" name="vname">
      <label>Town</label>
      <input type="text" id="town" name="town">
      <label>Country</label>
      <input type="text" id="country" name="country">
      <label>Venue's address</label>
      <textarea id="addrss" name="addrss"> </textarea>
      <label>Capacity</label>
      <input type="text" id="cap" name="cap">
      <input type="submit" value="Create a new event">
      <input type="hidden" name="usrid" value="<?php echo $_SESSION['usr']->id;?>">
    </fieldset>
</form>
