<?

/* 
	-----
	Omail  -  A PHP4 based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

	$Id: config.php,v 1.7 2000/08/11 13:15:28 swix Exp $ 
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

$expire_after = "10"; // minutes


// sysadmin mail
// -------------

$sysadmin_mail = "sysadmin@notdefined.yet";


// default language
// ----------------

$default_language = "en";



/* END OF USER CONFIGURATION */

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////









/* you shouldn't have to change the following lines */

// version

$version = "0.91";
$cvs_version = '$Id: config.php,v 1.7 2000/08/11 13:15:28 swix Exp $';

// script URL

$script_url = "$SCRIPT_URL";
$script = $script_url;

// default lang

if ($cookie_omail_lang && !$default_lang) { $default_lang = htmlentities($cookie_omail_lang); }
if (!$default_lang) { $default_lang = $default_language; }       // default language


?>
