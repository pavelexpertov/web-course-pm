<form action="php/cms/insert/create_event_type_category.php" method="post">
    <fieldset>
      <legend>Create a new Event Type</legend>
      <label>Event Type name</label>
      <input type="text" id="ename" name="ename">
      <label>Event's description</label>
      <textarea id="descr" name="descr"> </textarea>
      <input type="submit" value="Create a new venue">
      <input type="hidden" name="usrid" value="<?php echo $_SESSION['usr']->id;?>">
    </fieldset>
</form>
