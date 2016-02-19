<?php include 'php/web_comp/button_element.func.php';?>
<form action="php/cms/insert/create_venue_category.php" method="post">
    <fieldset>
      <legend>Create a new Venue</legend>
      <label>Venue name</label>
      <input type="text" id="vname" name="vname">
      <br>
      <label>Town</label>
      <input type="text" id="town" name="town">
      <br>
      <label>Country</label>
      <input type="text" id="country" name="country">
      <br>
      <label>Venue's address</label>
      <br>
      <textarea id="addrss" name="addrss"></textarea>
      <br>
      <label>Capacity</label>
      <input type="text" id="cap" name="cap">
      <br>
      <input type="submit" value="Create new venue">
      <?php placeButton("Cancel", "usr_page.php");?>
    </fieldset>
</form>
