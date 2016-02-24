
<div id="tabs-4">
	<h2>User Settings</h2>
	<?php
	include_once "php/web_comp/button_element.func.php";
	placeWideButton("Change your password", "usr_settings.php?pwd=");
	if($_SESSION['usr']->eveadmin != 2)
		placeWideButton("Change your details", "usr_settings.php?usrinfo=");
	/*if($_SESSION['usr']->eveadmin != 2)
	{
	if($_SESSION['usr']->eveadmin)
		placeWideButton("Deactivate Admin Features", "php/cms/update/toggling_admin_rights.php");
	else
		placeWideButton("Activate Admin Features", "php/cms/update/toggling_admin_rights.php");
	}*/

	?>
</div>
