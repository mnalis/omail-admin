<?

/* 
	-----------
	oMail-admin  -  A PHP4 based Vmailmgrd Web interface
	-----------

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

	$Id: config.php,v 1.46 2001/01/11 17:49:08 swix Exp $ 
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

$domains_list = array();   // empty : login for all.
//$domains_list = array( 'omail-test.com', 'omnis.ch', '8304.ch', 'test.com');

// expire session after 
// -------------------- 
// automatic logout after N minutes 

$expire_after = "20"; // minutes

// show how many accounts per page _
// -------------------- 
// ignore = 0

$show_how_many_accounts = 10;


// sysadmin mail
// -------------
// will be displayed on screens with error messages

$sysadmin_mail = "sysadmin@notdefined.yetx";


// default language
// ----------------
// look in strings.php for available languages

$default_language = "en";


// system accounts
// ---------------
// accounts which will be hidden and not usable anywhere (no edit, create, delete, login)

$system_accounts_list = array( );
//$system_accounts_list = array( 'abuse', 'root', 'hostmaster');

// readonly accounts
// ----------------
// accounts which will be shown, but will remain uneditable (no edit, create, delete or login)

$readonly_accounts_list = array( '', '', '');
//$readonly_accounts_list = array( 'postmaster', 'mailer-daemon' );

// program_name
// ------------
// if you want to display something else as "omail-admin" as program name

$program_name = "oMail-admin";


// vmailmgrquota file location
// ---------------------------

$vmailmgrquota_file = "/var/qmail/control/vmailmgrquotas";
//$vmailmgrquota_file = "/etc/vmailmgr/vmailmgrquotas";


// template name
// -------------
// you can create xxxxxx.TemplateName.temp files in the templates/ directory :
// omail-admin will first try to use "xxxxxx.TemplateName.temp" if it found it
// and "xxxxxxx.temp" otherwise.  Keep empty to use the standard set.

$template_name = "";


// config_use_settings_with_quota
// ------------------------------
// experimental stuff : show [settings] button for aliases too ? 1 = yes, 0 = no

$config_use_settings_with_quota = 0;

// hide_about_button
// -----------------
// to hide the about-screen button : I think it is fair to keep it zero.

$hide_about_button = 0;

// use_ldap
// --------
// define if you want to use an ldap server to store userinformation. 1 = yes, 0 = no
// Note that this is new and not yet fully developed. It works but you have to know
// what you're doing.

$use_ldap = 0;

// ldap_host
// ---------
// the ip address or hostname of the ldap server to use.

$ldap_host = "xxx.xx.xx.xxx";

// ldap_base and ldap_manager
// --------------------------
// these two together are the DN of the root user of the ldap server. These are
// configured in /etc/openldap/slapd.conf as the rootdn. It's here for the time
// being. As soon as I know more about ldap this setting will disappear as I
// want to use the login account for the virtual domains as the manager for just
// that domain. In that case only the ldap_base needs to be set and the manager
// part will be something like "cn=manager, ou=$domain"

$ldap_base = "o=ORGANISATION, c=COUNTRY";
$ldap_manager = "cn=manager";


// ldap_passwd
// -----------
// the password for the above rootdn. This is here also for the time being. As soon
// as I know how the implement the stuff mentioned above the password is no longer
// needed here as it will the same with which you login into the domain. Because the
// password is here in plaintext this file should be only readable by the user
// under which your webserver is running. On RedHat 7.0 this is the user apache so
// do a:
// chown apache apache config.php
// chmod 640 config.php
// so that normal users can't read what's in this file.

$ldap_passwd = "very_secret";


/* END OF USER CONFIGURATION */

/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////









/* you shouldn't have to change the following lines */

// version
$version = "0.96pre11";
$cvs_version = '$Id: config.php,v 1.46 2001/01/11 17:49:08 swix Exp $';

// script URL

$script_url = "$SCRIPT_URL";
$script = $script_url;

// default lang

if ($cookie_omail_lang && !$default_lang) { $default_lang = htmlentities($cookie_omail_lang); }
if (!$default_lang) { $default_lang = $default_language; }       // default language


// yes, it's here:  Thanks for using oMail-admin! Enjoy :)

$splash_screen = 0;

?>
