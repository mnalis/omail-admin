<?

/*
        -----
        Omail  -  A PHP/Perl based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: index.php,v 1.8 2000/08/02 23:07:45 swix Exp $
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

	if ($A == "about") {
	
		html_head("oMail Administration - about");
		html_titlebar($txt_about[$lang], "", "");
		html_about();
		html_end();
		exit();

	} elseif ($A != "checkin") {

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
	                $msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"$script_url?A=login\">" . $txt_login_again[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	
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
                $msg .= "<li><a href=\"$script_url?A=login\">" . $txt_login_again[$lang]  .  "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	
		html_head("oMail Administration");	
	        html_titlebar($txt_error[$lang], "$msg",0);
	        html_end();
	        exit();
	}



	if (!$A) { $A = "menu"; }  // default action

	html_head("oMail Administration");	

	//
	// ABOUT
	//

	if ($A == "about") {
	
		html_head("oMail Administration - about");
		html_titlebar($txt_about[$lang], "", "");
		html_about();
		html_end();
		exit();

	}
	

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

			$testuser = get_accounts(0,$username);
			html_display_mailboxes($testuser,0);
		}

		html_end();
		exit();

	} // menu


	//
	// Check arguments
	// 

	if ($A == "resp" || $A == "edit" || $A == "read" || $A == "delete" || $A == "parse") {

	        // check if $U ok
		
	        if (!(ereg("^[a-zA-Z0-9\_+\.\-]{0,}$", $U))) {

                        html_head("oMail Administration - Error");
                        $msg = "<b>" . $txt_error_invalid_chars_in_username[$lang] . "</b><br><br>";
                        $msg .= "<ul>";
			$msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
                        $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
			$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
                        html_titlebar($txt_error[$lang], "$msg",0);
                        html_end();
                        exit();
	        }


	}


	//
	// NEW ALIAS
	//

	if ($A == "newalias") {

	        html_titlebar($txt_newalias[$lang], $txt,1);
	        $userinfo[2] = "-";
	        html_userform($userinfo, "newalias");
	        html_end();
	        exit();
	}


	//
	// NEW USER
	//

	if ($A == "newuser") {
	
        	html_titlebar($txt_newuser[$lang], $txt,1);
        	$userinfo[2] = "-";
        	html_userform($userinfo, "newuser");
        	html_end();
        	exit();
	}



	//
	// ACCOUNT EDIT
	//

	if ($A == "edit") {
	                
        	html_titlebar($txt_edit_account[$lang], $txt,1);
	
	        $userinfo = get_accounts(0,$U);
	        html_userform($userinfo[0], "edit");
	        html_end();
	        exit();
	}


	//
	// DELETE ACCOUNT 
	// 
	
	if ($A == "delete") {

	        html_titlebar($txt_delete_account[$lang], $txt_delete_account_confirm[$lang],1);

	        $userinfo = get_accounts(0,$U);
	        html_delete_confirm($userinfo[0]);
	        html_end();
	        exit();
	}


	//
	// AUTORESPOND EDIT
	//

	if ($A == "resp") {
                
	        html_titlebar($txt_edit_account[$lang], $txt,1);
	        $user = get_accounts(0, $U);
		$userinfo = $user[0];

	        $respinfo = load_resp_file($U, $userinfo[11]);  // userinfo[11] = responder yes/no  

		if ($userinfo[11] || $respinfo[0] == 0) {
			
			list($respinfo["from"],$respinfo["subject"],$respinfo["body"]) = parse_resp_file($respinfo[1]);

		} else {
			$respinfo["from"] = $U . "@" . $domain;
			$respinfo["subject"] = $txt_autoresp_subj[$lang];
			$respinfo["body"] = $txt_autoresp_body[$lang];
		}	

	        html_respform($userinfo, $respinfo, $userinfo[11]);
	        html_end();
	        exit();
	}





	//
	// PARSE ACTION
	//

	if ($A == "parse") {
	
	        // before any operation check if username is not empty
	
	        if (!$U) {
	                html_head("oMail Administration - Error");
	                $msg = "<b>" . $txt_error_no_username[$lang] . "</b><br><br>";
	                $msg .= "<ul>";
			$msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
			$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	                html_titlebar($txt_error[$lang], "$msg",0);
	                html_end();
	                exit();
	        }
	

	        // "edit"
	
	        if ($action == "edit") {
	
	                // check args format... addslashed everywhere, etc...
	
	                // if passwd -> change password  
	
	                if (!($passwd1 == $passwd2)) {
	                        html_head("oMail Administration - Error");
	                        $msg = "<b>" . $txt_error_pw_not_same[$lang] . "</b><br><br>";
	                        $msg .= "<ul>";
				$msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
	                        $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	                        html_titlebar($txt_error[$lang], "$msg",0);
	                        html_end();
	                        exit();
	                }
		        
	
	                if ($passwd1 != "" && ($passwd1 == $passwd2)) { 
		                        $results = update_passwd($U, $passwd1);
	                } 
	
	
	                // update forwarders
                        $results .= "<br>" . update_account($U, $fwd);
	        
		
	                html_head("oMail Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_edit[$lang], "$msg",0);
	                html_end();
	                exit();
	        }
	
	
	        // "newuser"
	        // "newalias"
	
	        if ($action == "newuser" || $action == "newalias") {
	        
	                // check args format... addslashed everywhere, etc...	

	                if (!($passwd1 == $passwd2)) {
	                        html_head("oMail Administration - Error");
	                        $msg = "<b>" . $txt_error_pw_not_same[$lang] . "</b><br><br>";
	                        $msg .= "<ul>";
				$msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
	                        $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	                        html_titlebar($txt_error[$lang], "$msg",0);
	                        html_end();
	                        exit();
	                }
	        

	                if (!$passwd1 && $action == "newuser") {   // mailbox _needs_ a password
	                                                            // alias don't. 

	                        html_head("oMail Administration - Error");
	                        $msg = "<b>" . $txt_error_pw_needed[$lang] . "</b><br><br>";
	                        $msg .= "<ul>";
				$msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
	                        $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true,true)\">" . 
	                                $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	                        html_titlebar($txt_error[$lang], "$msg",0);
	                        html_end();
	                        exit();
	                } 
        
	                
	                // create empty list of forwarders if necessary

	                if (!$fwd[0] && $action == "newalias") {  // alias needs at least one fwd
			                                
                                html_head("oMail Administration - Error");
                                $msg = "<b>" . $txt_error_fwd_needed[$lang] . "</b><br><br>";
                                $msg .= "<ul>";
				$msg .= "<ul><li><a href=\"\" onClick=\"history.back();\">" . $txt_back[$lang]  .  "</a>\n";
                                $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true,true)\">" .
                                        $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
                                html_titlebar($txt_error[$lang], "$msg",0);  
                                html_end();
                                exit();
	                }
        
	                
	                if ($action == "newuser") {
	                        $results = "<br>" . create_account($U, $passwd1, $fwd);
	                }


	                if ($action == "newalias") {
	                        $results = create_alias($U, $passwd1, $fwd);
	                }



	                html_head("oMail Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";	
	                $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_edit[$lang], "$msg",0);
	                html_end();
	                exit();
		}


	        // "delete_ok"

	        if ($action == "delete_ok") {
		        
	                // check args format... addslashed everywhere, etc...
	                // update forwarders
                
	                // delete autoresponder if any


	            //    $temp_resp_file = $temp_directory . "/vtemp_del_" . $U . "_" . $session;
	            //    $results1 = update_responder("0", $U, "", "", "", $temp_resp_file);
	
	                // let vwrap copy the current resp file to a temp file, readable by all
	
	                $results2 = delete_account($U);  // T = type : alias, mailbox 
	                                                           // needed to know if it is necessary to backup or not


        	        html_head("oMail Administration");
        	        $msg = "<b>" . $results1 . "</b><br>";
        	        $msg .= "<b>" . $results2 . "</b><br><br>";
        	        $msg .= "<ul>";
        	        $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
        	        html_titlebar($txt_delete[$lang], "$msg",0);
        	        html_end();
        	        exit();
	       	}

	       // "responder"

	        if ($action == "responder") {
        
	                // check args format....

	                // update responder. 

	                $results = save_resp_file($U, "Subject: $subject\nFrom: $from\n\n$body", $responder);


	                html_head("oMail Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_delete[$lang], "$msg",0);
	                html_end();
	                exit();
	        }


	}


	//
	// LOGOUT 
	//

	if ($A == "logout") {

		$active = 0;
		session_destroy();

	        $msg = $txt_logout[$lang];
	        $msg .= "<ul><li><a href=\"$script_url?A=login\">" . $txt_login_again[$lang]  .  "</a>\n";
		$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	        html_titlebar($txt_logout[$lang], $msg ,0);
	        html_end();
	        exit();
	}	




} // end active=1


?>
