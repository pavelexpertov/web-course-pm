
<div id="tabs-4">
	<h2>User Settings</h2>
	<?php
	include_once "php/web_comp/button_element.func.php";
	placeWideButton("Change your password", "usersettings.php?pwd=");
	placeWideButton("Change your details", "usersettings.php?usrinfo=");
	if($_SESSION['usr']->eveadmin)
		placeWideButton("Deactivate Admin Features", "php/cms/update");
	else
		placeWideButton("Activate Admin Features", "php/cms/update");

	?>
</div>
