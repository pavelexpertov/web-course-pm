<?php
//The pusrpose of the file is to update password
 ?>

 <form id="change-pwd" action="php/cms/update/update_pwd.php" method="post">
<fieldset>
    <legend>Change your password</legend>
    <label>Your current password</label>
    <input type="text" id="oldpwd" name="oldpwd">
    <br>
    <label>New password</label>
    <input type="text" id="newpwd" name="newpwd">
    <br>
    <label>Re-enter password</label>
    <input type="text" id="reppwd" name="reppwd">
    <br>
    <input type="submit" value="Change your password">
</fieldset>
 </form>
