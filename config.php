<?

/* 
	-----
	Omail  -  A PHP4 based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

	$Id: config.php,v 1.23 2000/09/24 22:54:45 swix Exp $ 
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

// domains list  (keep empty to show a textfield)
// ------------

$domains_list = array( 'omail-test.com', 'omnis.ch', '8304.ch', 'test.com');
//$domains_list = array();

// expire session after 
// -------------------- 
// automatic logout after N minutes 

$expire_after = "20"; // minutes


// sysadmin mail
// -------------
// will be displayed on screens with error messages

$sysadmin_mail = "sysadmin@notdefined.yetx";


// default language
// ----------------
// look in strings.php for available languages

$default_language = "en";


// program_name
// ------------
// if you want to display something else as "omail-admin" as program name

$program_name = "oMail-admin";


// vmailmgrquota file location
// ---------------------------

$vmailmgrquota_file = "/var/qmail/control/vmailmgrquotas";
//$vmailmgrquota_file = "/etc/vmailmgr/vmailmgrquotas";


// config_use_settings_with_quota
// ------------------------------
// experimental stuff : show [settings] button for aliases too ? 1 = yes, 0 = no

$config_use_settings_with_quota = 0;

// hide_about_button
// -----------------
// to hide the about-screen button : I think it is fair to keep it zero.

$hide_about_button = 0;


/* END OF USER CONFIGURATION */

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////









/* you shouldn't have to change the following lines */

// version

$version = "0.96.1";
$cvs_version = '$Id: config.php,v 1.23 2000/09/24 22:54:45 swix Exp $';

// script URL

$script_url = "$SCRIPT_URL";
$script = $script_url;

// default lang

if ($cookie_omail_lang && !$default_lang) { $default_lang = htmlentities($cookie_omail_lang); }
if (!$default_lang) { $default_lang = $default_language; }       // default language


// yes, it's here:  Thanks for using oMail-admin! Enjoy :)

$splash_screen = 0;

?>
