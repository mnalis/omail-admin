<?

/* 
	-----
	Omail  -  A PHP4 based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

	$Id: config.php,v 1.14 2000/09/16 16:14:22 swix Exp $ 
	$Source: /cvsroot/omail/admin2/config.php,v $

	config.php
	----------
	Config file for sql, web and other stuff.

	16.jan.2k   om   First version
	01.aug.2k   om   Rewrite for PHP4

*/


/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////

/* START OF USER CONFIGURATION */


// expire session after 
// -------------------- 

$expire_after = "13"; // minutes


// sysadmin mail
// -------------

$sysadmin_mail = "sysadmin@notdefined.yet";


// default language
// ----------------

$default_language = "en";


// vmailmgrquota file location
// ---------------------------

$vmailmgrquota_file = "/var/qmail/control/vmailmgrquotas";
//$vmailmgrquota_file = "/etc/vmailmgr/vmailmgrquotas";


// config_use_settings_with_quota
// ------------------------------
// experimental stuff : show [settings] button for aliases too ? 1 = yes, 0 = no

$config_use_settings_with_quota = 0;



/* END OF USER CONFIGURATION */

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////









/* you shouldn't have to change the following lines */

// version

$version = "0.95";
$cvs_version = '$Id: config.php,v 1.14 2000/09/16 16:14:22 swix Exp $';

// script URL

$script_url = "$SCRIPT_URL";
$script = $script_url;

// default lang

if ($cookie_omail_lang && !$default_lang) { $default_lang = htmlentities($cookie_omail_lang); }
if (!$default_lang) { $default_lang = $default_language; }       // default language



?>
