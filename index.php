<?

/*
        -----
        Omail  -  A PHP/Perl based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: index.php,v 1.3 2000/08/02 01:38:58 swix Exp $
        $Source: /cvsroot/omail/admin2/index.php,v $

        index.php
        ---------

        16.jan.2k   om   First version
        01.aug.2k   om   Rewrite for PHP4

*/


/*****************************************************************************/ 
require("./vmail.inc");
include("config.php");
include("func.php");
include("strings.php");
include("htmlstuff.php");
/*****************************************************************************/ 

session_start();
session_register("username","domain","passwd","type","ip","expire","lang","active");

if (!$lang) { $lang = $default_lang; }

if (!$active) {

	if ($A != "checkin") {

		if ($setlang) { $lang = $setlang; }	
	
		html_head("oMail Administration - Login");
		html_titlebar($txt_login[$lang], $txt_please_login[$lang], "");
		html_login();
		html_end();
		exit();

	} else {

		if (authenticate($form_login, $form_passwd, $REMOTE_ADDR)) {

			$active = 1;
			$A = "menu";
	
		} else {
				
			$active = 0;
	                $msg = $txt_login_failed[$lang];
	                $msg .= "<ul><li><a href=\"$script_url?A=login\">" . $txt_login_again[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">Mail Sysadmin</a>\n</ul>";
	
			html_head("oMail Administration");	
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}
	}

}

if ($active == 1) { 

	if (!check_session($REMOTE_ADDR)) {

		// session expired or bad ip -> exit

		$active = 0;
		session_destroy();
	
	        $msg = $txt_session_expired[$lang] . "<br><br>";
	        $msg .= "<ul><li><a href=\"$script_url?A=login\" onClick=\"return gO(this,true)\">" . $txt_login_again[$lang]  .  "</a>\n";
	        $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">Mail Sysadmin</a>\n</ul>";
	
		html_head("oMail Administration");	
	        html_titlebar($txt_error[$lang], "$msg",0);
	        html_end();
	        exit();
	}



	if (!$A) { $A = "menu"; }  // default action

	html_head("oMail Administration");	

	
	//
	// DOMAIN MENU
	// 

	if ($A == "menu") {

	html_titlebar($txt_menu[$lang] . " - $domain", $txt_menu_descr[$lang] . $txt_menu_add, 0);

	if ($type == "domain") {

		$mboxes = get_accounts(1);	
		html_display_mailboxes($mboxes,1);

		$aliases = get_accounts(2);
		html_display_mailboxes($aliases,2);

	} else {

		$testuser = get_accounts(0,"oli2");
		html_display_mailboxes($testuser,0);

	}

	html_end();
	exit();

} // menu

	

	//
	// LOGOUT 
	//

	if ($A == "logout") {

		$active = 0;
		session_destroy();

	        $msg = $txt_logout[$lang];
	        $msg .= "<ul><li><a href=\"$script_url?A=login\">" . $txt_login_again[$lang]  .  "</a>\n";
	        $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">Mail Sysadmin</a>\n</ul>";

	        html_titlebar($txt_logout[$lang], $msg ,0);
	        html_end();
	        exit();
	}	




} // end active=1


?>
