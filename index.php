<?

/*
        -----
        Omail  -  A PHP4 based Vmailmgrd Web interface
        -----

        * Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: index.php,v 1.23 2000/10/12 22:17:47 swix Exp $
        $Source: /cvsroot/omail/admin2/index.php,v $

        index.php
        ---------

        16.jan.2k   om   First version
        01.aug.2k   om   Rewrite for PHP4
	13.sep.2k   om   Adding templates support -> done on 25.sep.2k

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
  
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

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
session_register("quota_on","quota_data");

if (!$lang) { 

	// try to findout users language by checking it's HTTP_ACCEPT_LANGUAGE variable
    
    if ($HTTP_ACCEPT_LANGUAGE) {
	$langaccept = explode(",", $HTTP_ACCEPT_LANGUAGE);
	for ($i = 0; $i < count($langaccept); $i++) { 
	    $tmplang = trim($langaccept[$i]);  $tmplang2 = substr($tmplang,0,2);
	    if ($txt_langname[$tmplang] && !$lang) {   // if the whole string matchs ("de-CH", or "en", etc)
		$lang = $tmplang;
	    } elseif ($txt_langname[$tmplang2] && !$lang) { // then try only the 2 first chars ("de", "fr"...)
		$lang = $tmplang2; 
	    }
	}
    }

    if (!$lang) {
        // didn't catch any valid lang : we use the default settings
	$lang = $default_lang; 
    }
}

if (!$active) {

	if ((($sysadmin_mail == "sysadmin@notdefined.yet" || $splash_screen == 1) && $A != "about") || $A == "splash") {
	
		html_head("$program_name Administration - Welcome!");
		html_titlebar($txt_welcome[$lang], "", "");
		html_splash();
		html_end();
		exit();

	} elseif ($A == "about") {
	
		html_head("$program_name Administration - about");
		html_titlebar($txt_about[$lang], "", "");
		html_about();
		html_end();
		exit();

	} elseif ($A != "checkin") {

		if ($setlang) { $lang = $setlang; }	
	
		html_head("$program_name Administration - Login");
		html_titlebar($txt_login[$lang], $txt_please_login[$lang], "");
		html_login();
		html_end();
		exit();

	} else {
	

		if (count($domains_list)) { 
			if (!$login_domain) { $form_login = ""; }   // -> failure : we need a domain!

			if ($form_login) { $form_login .= "@"; }
			$form_login .= $login_domain;
		}

		if ($form_passwd && $form_login && authenticate($form_login, $form_passwd, $REMOTE_ADDR)) {

			// login and password can't be left empty!

			$active = 1;
			$A = "menu";
	
		} else {
				
			$active = 0;
	                $msg = $txt_login_failed[$lang];
	                $msg .= "<ul><li><a href=\"$script_url?A=login&" . SID . "\">" . $txt_login_again[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	
			html_head("$program_name Administration");	
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}
	}

}


if ($active == 1) {    // active=1 -> user logged in

	if (!check_session($REMOTE_ADDR)) {

		// session expired or bad ip -> exit

		$active = 0;
		session_destroy();
	
	        $msg = $txt_session_expired[$lang] . "<br><br>";
                $msg .= "<ul><li><a href=\"$script_url?A=login&" . SID . "\">" . $txt_login_again[$lang]  .  "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	
		html_head("$program_name Administration");	
	        html_titlebar($txt_error[$lang], "$msg",0);
	        html_end();
	        exit();
	}



	if (!$A) { $A = "menu"; }  // default action
	if ($A == "login") { $A = "menu"; }  // we're already logged in! So we show the menu instead.
	if ($A == "checkin") { $A = "menu"; }  // we're already logged in! So we show the menu instead.

	html_head("$program_name Administration");	

	//
	// ABOUT
	//

	if ($A == "about") {
	
		html_head("$program_name Administration - about");
		html_titlebar($txt_about[$lang], "", "");
		html_about();
		html_end();
		exit();

	}


	//
	// SPLASH
	//

	if ($A == "splash") {
	
		html_head("$program_name Administration - Welcome!");
		html_titlebar($txt_welcome[$lang], "", "");
		html_splash();
		html_end();
		exit();
	}
	

	//
	// MENU - ACCOUNTS LISTING
	// 

	if ($A == "menu") {


		if ($type == "domain") {

			html_titlebar($txt_menu[$lang] . " - $domain", $txt_menu_domain_descr[$lang] . $txt_menu_add, 0);

			if (!$quota_on || ($quota_on && $quota_data["users_support"])) {
				$mboxes = get_accounts(1);	
				html_display_mailboxes($mboxes,1);
			}

			if (!$quota_on || ($quota_on && $quota_data["alias_support"])) {
				$aliases = get_accounts(2);
				html_display_mailboxes($aliases,2);
			}

		} else {

			if (!$quota_on || ($quota_on && $quota_data["user_login_allowed"])) {

				html_titlebar($txt_menu[$lang] . " - $domain", $txt_menu_account_descr[$lang] . $txt_menu_add, 0);
				$testuser = get_accounts(0,$username);
				html_display_mailboxes($testuser,0);

			} else {
		
				// user logged in correctely, but quota/domain info don't allow user login.			

	                	$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script_url?A=login&" . SID . "\">" . $txt_login_again[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
				html_head("$program_name Administration");	
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				$active = 0;
				session_destroy();
				exit();
			}				
		}

		html_end();
		exit();

	} // menu


	//
	// Check arguments
	// 

	if ($A == "resp" || $A == "edit" || $A == "read" || $A == "delete" || $A == "parse" || $A == "quota") {

	        // check if $U ok
		
	        if (!(ereg("^[a-zA-Z0-9\_+\.\-]{0,}$", $U))) {

                        html_head("$program_name Administration - Error");
                        $msg = "<b>" . $txt_error_invalid_chars_in_username[$lang] . "</b><br><br>";
                        $msg .= "<ul><li><a href=\"$script?A=menu&" . SID. "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
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


		if ($type == "domain" && (!$quota_on || ($quota_on && ($quota_data["alias_support"]  && $quota_data["nb_alias"] < $quota_data["max_alias"])))) {
		        html_titlebar($txt_newalias[$lang], $txt,1);
		        $userinfo[2] = "-";
		        html_userform($userinfo, "newalias");
		        html_end();
		        exit();

		} else {
			if ($type != "domain") { 
				$msg = $txt_error_not_allowed[$lang];
			} else {
	                	$msg = $txt_error_quota_expired[$lang];
			}
	                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
			html_head("$program_name Administration");	
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}				





	}


	//
	// NEW USER
	//

	if ($A == "newuser") {
	
		if ($type == "domain" && (!$quota_on || ($quota_on && ($quota_data["users_support"]  && $quota_data["nb_users"] < $quota_data["max_users"])))) {
	        	html_titlebar($txt_newuser[$lang], $txt,1);
	        	$userinfo[2] = "-";
	        	html_userform($userinfo, "newuser");
	        	html_end();
	        	exit();
		} else {
			if ($type != "domain") { 
				$msg = $txt_error_not_allowed[$lang];
			} else {
	                	$msg = $txt_error_quota_expired[$lang];
			}
	                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
			html_head("$program_name Administration");	
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}				
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
                
		if (!$quota_on || ($quota_on && $quota_data["autoresp_support"])) {
	
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



		} else {
			$msg = $txt_error_not_allowed[$lang];
	                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
			html_head("$program_name Administration");	
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}				

	}




	//
	// QUOTAS EDIT
	//

	if ($A == "quota") {
                
		if (!$quota_on || ($quota_on && $quota_data["user_quota_support"]) || ($type != "domain")) {
	
		        html_titlebar($txt_edit_account[$lang], $txt,1);

		        $userinfo = get_accounts(0,$U);
		        html_quotaform($userinfo[0], "edit");
		        html_end();
		        exit();


		} else {
			$msg = $txt_error_not_allowed[$lang];
	                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
			html_head("$program_name Administration");	
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}				

	}





	//
	// PARSE ACTION
	//

	if ($A == "parse") {
	
	        // before any operation check if username is not empty
	
	        if (!$U) {
	                html_head("$program_name Administration - Error");
	                $msg = "<b>" . $txt_error_no_username[$lang] . "</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
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
	                        html_head("$program_name Administration - Error");
	                        $msg = "<b>" . $txt_error_pw_not_same[$lang] . "</b><br><br>";
	                        $msg .= "<ul>";
	                        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
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

	                // update user detail
			if ($type == "domain") {
                        	$results .= "<br>" . update_userdetail($U, $userdetail);
			}
	        
		
	                html_head("$program_name Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_edit[$lang], "$msg",0);
	                html_end();
	                exit();
	        }
	
	
	        // "newuser"
	        // "newalias"
	
	        if ($action == "newuser" || $action == "newalias") {


			// check if domain admin is logged in and if quota are ok		
	
			if (($type != "domain") ||
			($quota_on && $action == "newuser" && (!$quota_data["users_support"] || ($quota_data["nb_users"] >= $quota_data["max_users"]))) ||
			($quota_on && $action == "newalias" && (!$quota_data["alias_support"] || ($quota_data["nb_alias"] >= $quota_data["max_alias"])))) {

				if ($type != "domain") { 
					$msg = $txt_error_not_allowed[$lang];
				} else {
		                	$msg = $txt_error_quota_expired[$lang];
				}
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
				html_head("$program_name Administration");	
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}				

	        
	                // check args format... addslashed everywhere, etc...	

	                if (!($passwd1 == $passwd2)) {
	                        html_head("$program_name Administration - Error");
	                        $msg = "<b>" . $txt_error_pw_not_same[$lang] . "</b><br><br>";
	                        $msg .= "<ul>";
	                        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	                        html_titlebar($txt_error[$lang], "$msg",0);
	                        html_end();
	                        exit();
	                }
	        

	                if (!$passwd1 && $action == "newuser") {   // mailbox _needs_ a password
	                                                            // alias don't. 

	                        html_head("$program_name Administration - Error");
	                        $msg = "<b>" . $txt_error_pw_needed[$lang] . "</b><br><br>";
	                        $msg .= "<ul>";
	                        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	                        html_titlebar($txt_error[$lang], "$msg",0);
	                        html_end();
	                        exit();
	                } 

	                
	                // create empty list of forwarders if necessary

	                if (!$fwd[0] && $action == "newalias") {  // alias needs at least one fwd
			                                
                                html_head("$program_name Administration - Error");
                                $msg = "<b>" . $txt_error_fwd_needed[$lang] . "</b><br><br>";
                                $msg .= "<ul>";
                                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" .
                                        $txt_menu[$lang]  .  "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
                                html_titlebar($txt_error[$lang], "$msg",0);  
                                html_end();
                                exit();
	                }
        
	                
	                if ($action == "newuser") {
	                        $results = "<br>" . create_account($U, $passwd1, $fwd);
	                       	update_userdetail($U, $userdetail);
	                }


	                if ($action == "newalias") {
	                        $results = create_alias($U, $passwd1, $fwd);
	                       	update_userdetail($U, $userdetail);
	                }




	                html_head("$program_name Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";	
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
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


        	        html_head("$program_name Administration");
        	        $msg = "<b>" . $results1 . "</b><br>";
        	        $msg .= "<b>" . $results2 . "</b><br><br>";
        	        $msg .= "<ul>";
        	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
        	        html_titlebar($txt_delete[$lang], "$msg",0);
        	        html_end();
        	        exit();
	       	}

	       // "responder"

	        if ($action == "responder") {


			// if autoresp support is off, show error

			if ($quota_on && !$quota_data["autoresp_support"]) {

				$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
				html_head("$program_name Administration");	
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}				

        
	                // check args format....

	                // update responder. 

	                $results = save_resp_file($U, "Subject: $subject\nFrom: $from\n\n$body", $responder);


	                html_head("$program_name Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_delete[$lang], "$msg",0);
	                html_end();
	                exit();
	        }


	       // "quota"

	        if ($action == "quota") {


			// if quota support is off, show error

			if ($quota_on && !$quota_data["user_quota_support"]) {

				$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";	
				html_head("$program_name Administration");	
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}				

        
	                // check args format....

	                // update quotas


	                $results = update_userquota($U, $form_softquota, $form_hardquota, $form_expiry, $form_msgcount, $form_msgsize, $form_enabled);

	                html_head("$program_name Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_delete[$lang], "$msg",0);
	                html_end();
	                exit();
	        }




	}


	//
	// LOGOUT 
	//

	if ($A == "logout") {


	        $msg = $txt_goodbye[$lang];
	        $msg .= "<ul><li><a href=\"$script_url?A=login&setlang=$lang&" . SID . "\">" . $txt_login_again[$lang]  .  "</a>\n";
		$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";

		$active = 0;
		session_destroy();

	        html_titlebar($txt_logout[$lang], $msg ,0);
	        html_end();
	        exit();
	}	


	// fixme : if we're here, $A seems not to exist : should we show something ?



} // end active=1


?>
