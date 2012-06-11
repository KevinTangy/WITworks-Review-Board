<?php
	//this script will mark a users session as "true" for admin, and "false" for non-admin accounts
	//usernames can be added to the admin list by adding a new case line below. e.g. 'case "newadmin":' will give the useraccount 'newadmin' admin access 
	switch ( $_SESSION[ "username" ] )
	{
		case "tangk2":
		case "parroj":
		case "collinsd3":
		case "duncani":
		case "denong":
		case "sureshd":
			return true;
		default:
			return false;
	}
?>