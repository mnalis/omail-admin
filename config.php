<?

/* 
	-----
	Omail  -  A PHP/Perl based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

	config.php
	----------
	Config file for sql, web and other stuff.

	16.jan.2k   om   First version
	01.aug.2k   om   Rewrite for PHP4

*/

// version

$version = "0.8";

// script URL

$script_url = "http://192.168.0.76/omail/index.php";
$script = $script_url;

// temp directory (to save temporary files)

$temp_directory = "/tmp";

// number of lines to show in "select" mode
$max_select_size = 20;

// expire session after

$expire_after = "20"; // minutes

// sysadmin mail

$sysadmin_mail = "om@8304.ch";

// default lang

if ($cookie_omail_lang && !$default_lang) { $default_lang = htmlentities($cookie_omail_lang); }
if (!$default_lang) { $default_lang = "en"; }       // default language

?>
