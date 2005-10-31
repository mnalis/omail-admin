<?

#$globar[debug] = 1;
#$debug = 1;

/*
        -----------
        oMail-admin  -  A PHP4 based Vmailmgrd Web interface
        -----------

        * Copyright (C) 2004  Olivier Mueller <om@omnis.ch>

        $Id: index.php,v 1.56 2005/10/31 22:34:19 swix Exp $
        $Source: /cvsroot/omail/admin2/index.php,v $

        index.php
        ---------

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

ob_start();

session_start();

extract($_REQUEST);

if (is_array($_SESSION)) {
	extract($_SESSION);
}


/*****************************************************************************/
require("./vmail.inc");
include("config.php");
include("func.php");
include("strings.php");
include("htmlstuff.php");
require("./mysql.inc");
/*****************************************************************************/

session_register("username", "domain", "passwd", "type", "ip", "expire", "lang", "active");
session_register("quota_on","quota_data","catchall_active", "sort_order");
session_register("mb_start","al_start");
session_register("mb_letter","al_letter");
session_register("vm_tcphost","vm_tcphost_port");   // for vmailmgrd-tcp
session_register("vmailstats");

extract($_SESSION);

// try to improve speed

$vm_list = array();
$vm_list_loaded = 0;
$vm_resp_status = array();


// clean input values (because of magic quotes...)

if (count($_GET)) {
        foreach ($_GET as $key => $value) {
                if (!is_array($$key)) {
                        $$key = stripslashes($value);
                }
        }
}
if (count($_POST)) {
        foreach ($_POST as $key => $value) {
                if (!is_array($$key)) {
                        $$key = stripslashes($value);
                }
        }
}


if (!$lang) {

	// if no language defined yet (cookie or session):
	// try to findout users language by checking it's HTTP_ACCEPT_LANGUAGE variable

    if ($_SERVER["HTTP_ACCEPT_LANGUAGE"]) {
	$langaccept = explode(",", $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
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

	if ((($sysadmin_mail == "sysadmin@notdefined.yet") && $A != "about") || $A == "splash") {

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

	} elseif ($A == "help") {

		html_head("$program_name Administration - Help");
		html_titlebar($txt_help[$lang], "", "");
		html_help();
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

		// checkin:

		if (count($domains_list)) {
			if (!$login_domain) { $form_login = ""; }   // -> failure : we need a domain!

			if ($form_login) { $form_login .= "@"; }
			$form_login .= $login_domain;
		}

		$form_login = strtolower(trim($form_login));

		// setup tcp host if necessary and if we are using vmailmgrd_tcp

		if ($use_vmailmgrd_tcp) {

			$vm_tcphost = "";
			$vm_tcphost_port = "";

			switch ($vmailmgrd_tcp_host_method) {

				case "0":  // one host
					$vm_tcphost = $vmailmgrd_tcp_host;
					break;

				case "1":  // multi host via select

					$vm_tcphost = $vmailmgrd_tcp_hosts_list[$form_tcphost];
					break;

				case "2":  // multi host with transparent host selection
					$vm_tcphost = tcp_host_findout($form_login);
					break;

			}
		}


		if ($form_passwd && $form_login && authenticate($form_login, $form_passwd, $_SERVER["REMOTE_ADDR"], $form_tcphost)) {

			// login and password can't be left empty!

			$active = 1;
			$A = "menu";


			// if we have vmailstats, load the data into the session

			if ($vmailstats_directory) {

				if (preg_match("/@/", $form_login)) {
					list($tmpuser,$tmpdomain) = explode("@", $form_login);
				} else {
					$tmpdomain = $form_login;
				}

				if (file_exists("$vmailstats_directory/$tmpdomain")) {
					$vmstats = @fopen("$vmailstats_directory/$tmpdomain", "r");
					$firstline = @fgets($vmstats);
					list($tmp1, $tmp2) = explode("\t", $firstline);
					if ($tmp1 == "total_dir_size") {
						$vmailstats["active"] = "1";
						$vmailstats["global_size"] = $tmp2;
						$tmpstat = fstat($vmstats);
						$vmailstats["date"] = $tmpstat["ctime"];
					}

					while($line = fgets($vmstats)) {

						list($tmpuser, $maildirsize, $cursize, $newsize, $curfiles, $newfiles) = explode("\t", $line);
						$vmailstats[$tmpuser]["size"] = $maildirsize;
						$vmailstats[$tmpuser]["cursize"] = $cursize;
						$vmailstats[$tmpuser]["newsize"] = $newsize;
						$vmailstats[$tmpuser]["curfiles"] = $curfiles;
						$vmailstats[$tmpuser]["newfiles"] = $newfiles;
					}
				}
			}

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

	if (!check_session($_SERVER["REMOTE_ADDR"])) {

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



	// spamassassin stuff, in case of multiple hosts ($use_vmailmgrd_tcp = 1)

	if ($use_vmailmgrd_tcp && $vm_tcphost) {

		$use_spamassassin = $spamassassin_remote_conf[$vm_tcphost]["use_spamassassin"];
		$db_login = $spamassassin_remote_conf[$vm_tcphost]["db_login"];
		$db_passwd = $spamassassin_remote_conf[$vm_tcphost]["db_passwd"];
		$db_database = $spamassassin_remote_conf[$vm_tcphost]["db_database"];
		$db_server = $spamassassin_remote_conf[$vm_tcphost]["db_server"];
		$tb_userpref = $spamassassin_remote_conf[$vm_tcphost]["tb_userpref"];

	}


	if (!$A) { $A = "menu"; }  // default action
	if ($A == "login") { $A = "menu"; }  // we're already logged in! So we show the menu instead.
	if ($A == "checkin") { $A = "menu"; }  // we're already logged in! So we show the menu instead.

	//
	// ABOUT
	//

	if ($A == "about") {

		html_head("$program_name Administration - About");
		html_titlebar($txt_about[$lang], "", "");
		html_about();
		html_end();
		exit();

	}


	//
	// HELP
	//

	if ($A == "help") {

		html_head("$program_name Administration - Help");
		html_titlebar($txt_help[$lang], "", "");
		html_help();
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


		html_head("$program_name Administration - Menu");

		if ($type == "domain") {

			if ($form_sort == "info") { $sort_order = "info"; }
			if ($form_sort == "username") { $sort_order = "username"; }

			if ($catchall_active) {
			    $txt_menu_add = "<br>" . $txt_current_catchall_account_is[$lang] . ": <b>$catchall_active@$domain</b>";
			    $txt_menu_add .= ' [ <a href="' . $script_url . '?A=create_catchall&" onClick="oW(this,\'pop\')">' . $txt_edit[$lang] . '</a> ]';
			    // $txt_menu_add .= ' [ <a href="' . $script_url . '?A=create_catchall&U='.$catchall_active.'" onClick="oW(this,\'pop\')">' . $txt_edit[$lang] . '</a> ]';
			    // $txt_menu_add .= ' [ <a href="' . $script_url . '?A=remove_catchall&U='.$catchall_active.'" onClick="oW(this,\'pop\')">' . $txt_delete[$lang] . '</a> ]';
			} else {
			    $txt_menu_add = "<br>" . $txt_current_catchall_not_defined[$lang] ;
			    $txt_menu_add .= ' [ <a href="'. $script_url . '?A=create_catchall&U=" onClick="oW(this,\'pop\')">' . $txt_edit[$lang] . '</a> ]';
			}


			if ($vmailstats["active"]) {
				$txt_menu_add .= "<br>$txt_total_size[$lang]: ";
				if ($vmailstats["global_size"]<1024) {
					$txt_menu_add .= "<b>" . $vmailstats["global_size"] . " kB</b>.";
				} else {
					$txt_menu_add .= "<b>" . round($vmailstats["global_size"]/1024,1) . " MB</b>.";
				}
				$txt_menu_add .= " (" . date("j.m.y H:i:s", $vmailstats["date"]) . ") ";
			}


			html_titlebar($txt_menu[$lang] . " - $domain", $txt_menu_domain_descr[$lang] . $txt_menu_add, 0);

			flush();

			if (!$quota_on || ($quota_on && $quota_data["users_support"])) {
                                if (isset($show_mb_letter)) { $mb_letter = $show_mb_letter; }
				$mboxes = get_accounts(1);

				if (isset($new_mb_start)) { $mb_start = $new_mb_start; }

				if (isset($mb_start) && $show_how_many_accounts) {
				    html_display_mailboxes($mboxes,1,$mb_start,$show_how_many_accounts);
				} else {
				    html_display_mailboxes($mboxes,1);
				}
			}


			if (!$quota_on || ($quota_on && $quota_data["alias_support"])) {
                                if (isset($show_al_letter)) { $al_letter = $show_al_letter; }
				$aliases = get_accounts(2);

				if (isset($new_al_start)) { $al_start = $new_al_start; }

				if (isset($al_start) && $show_how_many_accounts) {
				    html_display_mailboxes($aliases,2,$al_start,$show_how_many_accounts);
				} else {
				    html_display_mailboxes($aliases,2);
				}
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

	if ($A == "spam" || $A == "resp" || $A == "edit" || $A == "read" || $A == "delete" || $A == "parse" || $A == "quota" || $A == "catchall" || $A == "catchall_remove" || $A == "remove_catchall" || $A == "user_enable" || $A == "user_disable") {

	        // check if $U ok

		$U = trim($U);  // remove blanks at the beginning and end, if any

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


		if ($type == "domain" && (!$quota_on || ($quota_on && ($quota_data["alias_support"]  && $quota_data["nb_alias"] < $quota_data["max_alias"]))) && !$quota_data["new_alias_forbidden"]) {
			html_head("$program_name Administration - New Alias");
		        html_titlebar($txt_newalias[$lang], $txt,1);
		        $userinfo[2] = "-";
			$quota_data["nb_alias"] = 0;
                        if (isset($show_mb_letter)) { $mb_letter = $show_mb_letter; }
			$mboxlist = get_accounts(3);
		        html_userform($userinfo, "newalias", $mboxlist);
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
			html_head("$program_name Administration - Error");
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}





	}


	//
	// NEW USER
	//

	if ($A == "newuser") {

		if ($type == "domain" && (!$quota_on || ($quota_on && ($quota_data["users_support"]  && $quota_data["nb_users"] < $quota_data["max_users"]))) && !$quota_data["new_mailbox_forbidden"]) {

			html_head("$program_name Administration - New User");
	        	html_titlebar($txt_newuser[$lang], $txt,1);
	        	$userinfo[2] = "-";
			$quota_data["nb_users"] = 0;
                        if (isset($show_mb_letter)) { $mb_letter = $show_mb_letter; }
			$mboxlist = get_accounts(3);
	        	html_userform($userinfo, "newuser", $mboxlist);
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
			html_head("$program_name Administration - Error");
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}
	}



	//
	// ACCOUNT EDIT
	//

	if ($A == "edit") {

	    if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

		html_head("$program_name Administration - Error");
		$msg = $txt_error_not_allowed[$lang];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
    	        html_titlebar($txt_error[$lang], $msg ,0);
                html_end();
		exit();

	    }

	    if ($use_ldap) {
		if (!is_array($results=ldap_entry("search",$U,"",""))) {
		    html_head("$program_name Administration - Error");
		    $msg = "<b>" . $results . "</b><br><br>";
		    $msg .= "<ul>";
		    $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		    html_titlebar($txt_edit[$lang], "$msg",0);
		    html_end();
		    exit();
		}
	    }

            html_head("$program_name Administration - Edit");
    	    html_titlebar($txt_edit_account[$lang], $txt,1);
	    $userinfo = get_accounts(0,$U);
	    if (isset($show_mb_letter)) { $mb_letter = $show_mb_letter; }
	    $mboxlist = get_accounts(3);
	    html_userform($userinfo[0], "edit", $mboxlist);
	    html_end();
	    exit();

	}


	//
	// DELETE ACCOUNT   (ask for confirmation)
	//

	if ($A == "delete") {

	    if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

		$msg = $txt_error_not_allowed[$lang];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
		html_head("$program_name Administration - Error");
    	        html_titlebar($txt_error[$lang], $msg ,0);
                html_end();
		exit();
	    }

	    html_head("$program_name Administration - Delete Account");	
	    html_titlebar($txt_delete_account[$lang], $txt_delete_account_confirm[$lang],1);
	    $userinfo = get_accounts(0,$U);
	    html_delete_confirm($userinfo[0]);
	    html_end();
	    exit();

	}



	//
	// SETUP/REMOVE CATCHALL ACCOUNT   (ask for confirmation)
	//

	if ($A == "catchall" || $A == "remove_catchall" || $A == "create_catchall") {


	    if ((in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) && $U != "") {

		$msg = $txt_error_not_allowed[$lang];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
		html_head("$program_name Administration - Error");
    	        html_titlebar($txt_error[$lang], $msg ,0);
                html_end();
		exit();

	    }

 	    html_head("$program_name Administration - Catchall");

	    if ($A == "catchall") {
	        html_titlebar($txt_catchall[$lang], $txt_catchall_confirm[$lang],1);
	    } else {
	        html_titlebar($txt_catchall[$lang],"",1);
	    }

	    $tmpinfo = get_accounts(3);

	    // check if there is a "+" account

	    $tmpsize = count($tmpinfo);

	    for ($i=0; $i<=$tmpsize; $i++) {

	        $catchallinfo = $tmpinfo[$i];

	        if ($catchallinfo[0] == "+") {

		    $aliases = $catchallinfo[3];
		    $nb_fwd = count($aliases);

	    	    if (!($catchallinfo[2])) {
		        $msg .= "The Catchall account is an alias with $nb_fwd forwarders.";
		    } else {
		        $msg .= "The Catchall account is a real mailbox with $nb_fwd forwarders.";
		        $msg .= "<br>If you replace it, all the mails of account \"+\" will be deleted";
		    }

		    if ($aliases[0])  {
		        $msg .= "<br>It's currently pointing to : " . $aliases[0];
	    	    	if (!(preg_match("/@/i", $aliases[0]))) {
    			    $msg .= "@" . $domain;
			}
		        if ($nb_fwd > 1) {
			    $msg .= " (and " . ($nb_fwd-1) . " other addresses)";
			}
		    }

		    break;
		}
	    }

	    if (!$msg) {
	        $msg = "There is currently no active Catchall account.";
	    }


	    if ($A == "catchall") {
	        $userinfo = get_accounts(0,$U);
    	        html_catchall_confirm($userinfo[0], $msg);
	    } elseif ($A == "create_catchall") {
    	        html_catchall_create($msg, $tmpinfo);   // tmpinfo = accountslist
	    } else {
	        html_catchall_remove_confirm($msg);
	    }

	    html_end();
	    exit();
	}


	//
	// AUTORESPOND EDIT
	//

	if ($A == "resp") {

		if (!$quota_on || ($quota_on && $quota_data["autoresp_support"]) && !in_array($U, $readonly_accounts_list) && !in_array($U, $system_accounts_list)) {

			html_head("$program_name Administration - Autoresponder");

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
			html_head("$program_name Administration - Error");
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}

	}

	//
	// SPAM SETTINGS EDIT
	//

	if ($A == "spam") {

		if ($use_spamassassin && !$quota_data["spamassassin_use_forbidden"]) {

			html_head("$program_name Administration - SpamAssassin");

		        html_titlebar($txt_edit_account[$lang], $txt,1);
		        $user = get_accounts(0, $U);
			$userinfo = $user[0];


			// default values

			$spamsetup["status"] = "0";
			$spamsetup["delete"] = "0";
			$spamsetup["required_hits"] = "5";
			$spamsetup["spam_target"] = "";
			$spamsetup["whitelist"] = "";
			$spamsetup["blacklist"] = "";
			$spamsetup["report_safe"] = "1";

			// get spaminfo from the sql database, if any

			$data = new table($db_database, $tb_userpref, $db_server, $db_login, $db_passwd);
			$data->query("preference,value", "username LIKE '$userinfo[0]@$domain'");
			if ($data->countQueryRows()) {
				for ($i=0; $i<$data->countQueryRows(); $i++) {
					$tmprow = $data->getQueryRow();

					if ($tmprow["preference"] == "spam_enabled") {
						$spamsetup["status"] = $tmprow["value"];
					}

					if ($tmprow["preference"] == "spam_trash") {
						$spamsetup["delete"] = $tmprow["value"];
					}

					if ($tmprow["preference"] == "required_hits") {
						$spamsetup["required_hits"] = $tmprow["value"];
					}

					if ($tmprow["preference"] == "spam_fwd") {
						$spamsetup["spam_target"] = $tmprow["value"];
					}

					if ($tmprow["preference"] == "whitelist_from") {
						$spamsetup["whitelist"] .= $tmprow["value"] . "\n";
					}

					if ($tmprow["preference"] == "blacklist_from") {
						$spamsetup["blacklist"] .= $tmprow["value"] . "\n";
					}
					
					if ($tmprow["preference"] == "report_safe") { 
						$spamsetup["report_safe"] = $tmprow["value"];
					}

					$data->moveNext();
				}
			}

		        html_spamform($userinfo, $spamsetup);
		        html_end();
		        exit();

		} else {
			$msg = $txt_error_not_allowed[$lang];
	                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
			html_head("$program_name Administration - Error");
        	        html_titlebar($txt_error[$lang], $msg ,0);
	                html_end();
			exit();
		}

	}



	//
	// QUOTAS EDIT
	//

	if ($A == "quota") {

		if ((!$quota_on || ($quota_on && $quota_data["user_quota_support"]) || ($type != "domain")) && !in_array($U, $readonly_accounts_list) && !in_array($U, $system_accounts_list)) {

			html_head("$program_name Administration - Quotas");
		        html_titlebar($txt_quota_account[$lang], $txt,1);
		        $userinfo = get_accounts(0,$U);
		        html_quotaform($userinfo[0], "edit");
		        html_end();
		        exit();


		} else {

			$msg = $txt_error_not_allowed[$lang];
	                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
			html_head("$program_name Administration - Error");
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


		// add new forwareders to $fwd[] if any

		$newfwd = trim($newfwd);
		if ($newfwd) {
			$newarray = explode("\n", $newfwd);
			while(list ($null, $tmpadr) = each($newarray)) {
				$tmpadr = trim($tmpadr);
				if ($tmpadr) {
					$fwd[] = $tmpadr;
				}
			}
		}


	        // "edit"

	        if ($action == "edit") {

	                // check args format... addslashed everywhere, etc...

			if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

		            html_head("$program_name Administration - Error");
    			    $msg = $txt_error_not_allowed[$lang];
            		    $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
            		    $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
    	    		    html_titlebar($txt_error[$lang], $msg ,0);
            		    html_end();
			    exit();

			}


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

			if ($use_ldap) {
			    if ($results=ldap_entry("mod", $U, $firstname, $lastname)) {
				html_head("$program_name Administration - Error");
				$msg = "<b>" . $results . "</b><br><br>";
				$msg .= "<ul>";
				$msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
				html_titlebar($txt_edit[$lang], "$msg",0);
				html_end();
				exit();
			    }
			}

	                if ($passwd1 != "" && ($passwd1 == $passwd2)) {
	                        $results = update_passwd($U, $passwd1);
	                }

	                // update forwarders
                        $results .= "<br>" . update_account($U, $fwd);

			// no forwarders ? check if the account is active, or warn

			if (!$fwd[0] && !$fwd[1] && !$fwd[2] && !$fwd[3] && !$fwd[4] && !$fwd[5]) {
				$userinfo = get_accounts(0,$U);
				if (!$userinfo[0][12]) {
					$results .= "<br><br><b><font color=red>" . $txt_forwarding_off_warning[$lang] . "</font></b><br>";
				}
			} else {

				// yes, we have forwarders!
				if ($turn_off_delivery_on_fwd_setup) {
					$enabled_status = "0";
					$enabled_msg = $txt_turn_off_delivery_expl[$lang];
					$results .= "<br>" . update_userstatus($U, $enabled_status);
				}
			}


	                // update user detail
			if ($userdetail == "" && ($firstname != "" && $lastname != "")) {
			    $userdetail = trim($lastname.", ".$firstname);
			}

			if ($type == "domain") {
                        	$results .= "<br>" . update_userdetail($U, $userdetail);
			}

			// update catchall_account status if necessary
			get_catchall_account();

	                html_head("$program_name Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
			$msg .= "$enabled_msg<br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_edit[$lang], "$msg",0);
	                html_end();
	                exit();
	        }


	        // "newuser"
	        // "newalias"

	        if ($action == "newuser" || $action == "newalias") {

			// update catchall_account status if necessary
			get_catchall_account();

			if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

	                    html_head("$program_name Administration - Error");
    			    $msg = $txt_error_not_allowed[$lang];
            		    $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
            		    $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
    	    		    html_titlebar($txt_error[$lang], $msg ,0);
            		    html_end();
			    exit();

			}

			// check if domain admin is logged in and if quota are ok

			if (($action == "newalias" && $quota_data["new_alias_forbidden"]) ||
			($action == "newuser" && $quota_data["new_mailbox_forbidden"]) ||
			($type != "domain") ||
			($quota_on && $action == "newuser" && (!$quota_data["users_support"] || ($quota_data["nb_users"] >= $quota_data["max_users"]))) ||
			($quota_on && $action == "newalias" && (!$quota_data["alias_support"] || ($quota_data["nb_alias"] >= $quota_data["max_alias"])))) { //xx?

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

	                if (!$fwd[0] && !$fwd[1] && $action == "newalias") {  // alias needs at least one fwd
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
				if ($use_ldap) {
				    $results = ldap_entry ("add", $U, $firstname, $lastname);
				} else {
				    unset ($results) ;
				}
 				if (!$results) {
				    $results = "<br>" . create_account($U, $passwd1, $fwd);
 				    if ( $userdetail == "" && ($firstname != "" && $lastname != "")) {
 					$userdetail=$lastname.", ".$firstname;
 				    }
				    if (strpos($results,"ok")) {
					    update_userdetail($U, $userdetail);
				    }
				}
			}


	                if ($action == "newalias") {
				if ($use_ldap) {
				    $results = ldap_entry ("add", $U, $firstname, $lastname);
				} else {
				    unset ($results) ;
				}
 				if (!$results) {
				    $results = create_alias($U, $passwd1, $fwd);
 				    if ( $userdetail == "" && ($firstname != "" && $lastname != "")) {
 					$userdetail=$lastname.", ".$firstname;
 				    }
				    if (strpos($results,"ok")) {
					    update_userdetail($U, $userdetail);
				    }
				}
			}


			// update catchall_account status if necessary
			get_catchall_account();

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

			if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

  	                    html_head("$program_name Administration - Error");
    			    $msg = $txt_error_not_allowed[$lang];
            		    $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
            		    $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
    	    		    html_titlebar($txt_error[$lang], $msg ,0);
            		    html_end();
			    exit();
			}

			if ($use_ldap ) {
			    if ($results=ldap_entry("del", $U, "", "")) {
				html_head("$program_name Administration - Error");
				$msg = "<b>" . $results . "</b><br><br>";
				$msg .= "<ul>";
				$msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
				html_titlebar($txt_edit[$lang], "$msg",0);
				html_end();
				exit();
			    }
			}

	                // check args format... addslashed everywhere, etc...
	                // update forwarders

			if ($use_spamassassin && !$quota_data["spamassassin_use_forbidden"]) {
				$userinfotmp = get_accounts(0,$U);
				$userinfo = $userinfotmp[0];
				$mailadr = $userinfo[0] . "@" . $domain;

				$data = new table($db_database, $tb_userpref, $db_server, $db_login, $db_passwd);
				$data->query("*", "username LIKE '$mailadr' AND (preference LIKE 'spam_enabled' OR preference LIKE 'spam_trash' OR preference LIKE 'required_hits' OR preference LIKE 'spam_fwd' OR preference LIKE 'blacklist_from' OR preference LIKE 'whitelist_from')");
				$data->deleteRows();
				$results1 = "Spam Settings removed for &lt;$mailadr&gt;<br>";
			}

	                // let vwrap copy the current resp file to a temp file, readable by all

	                $results1 .= delete_account($U);

			// check if we deleted the account on which the checkall (+) account was pointing on.
			// if yes, also remove the "+"

			if ($U == $catchall_active) {
			    $results1 .= "<br>" . delete_account("+");
			}

			get_catchall_account();

        	        html_head("$program_name Administration");
        	        $msg = "<b>" . $results1 . "</b><br>";
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

	                	html_head("$program_name Administration - Error");
				$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}

	                // check args format....

		        if (get_magic_quotes_gpc() == 1) {
                           $body = stripslashes($body);
                           $subject = stripslashes($subject);
                           $from = stripslashes($from);
	                }

			// remove blanks

			$subject = trim($subject);
			$from = trim($from);

			// strip ^M from body text

			$tmpbody = explode("\n",$body);
			$body = "";

			for ( $i = 0 ; $i < count($tmpbody)-1 ; $i++ ) {
			    $body .= chop($tmpbody[$i]) . "\n";
			}
			$body .= $tmpbody[$i];
			$tpmbody = "";

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



	       // "spam"

	        if ($action == "spam") {

			// if spam support is off, show error

			if (!$use_spamassassin && !$quota_data["spamassassin_use_forbidden"]) {

	                	html_head("$program_name Administration - Error");
				$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}

	                // check args format....

		        if (get_magic_quotes_gpc() == 1) {
                           $from = stripslashes($from);
	                }

			// remove blanks

			$from = trim($from);

			// remove any spam infos from userdetail, keep actual infos...

			$userinfotmp = get_accounts(0,$U);
			$userinfo = $userinfotmp[0];
			$mailadr = $userinfo[0] . "@" . $domain;

			$data = new table($db_database, $tb_userpref, $db_server, $db_login, $db_passwd);
			$data->query("*", "username LIKE '$mailadr' AND (preference LIKE 'spam_enabled' OR preference LIKE 'spam_trash' OR preference LIKE 'required_hits' OR preference LIKE 'spam_fwd' OR preference LIKE 'blacklist_from' OR preference LIKE 'whitelist_from' OR preference LIKE 'report_safe')");
			$data->deleteRows();

			$data->newRow();
			$data->setQueryField("username", $mailadr);
			$data->setQueryField("preference", "spam_fwd");
			$data->setQueryField("value", $from);

			$data->newRow();
			$data->setQueryField("username", $mailadr);
			$data->setQueryField("preference", "spam_enabled");
			$data->setQueryField("value", $spam_status);

			$data->newRow();
			$data->setQueryField("username", $mailadr);
			$data->setQueryField("preference", "spam_trash");
			$data->setQueryField("value", $spam_delete);

                        $data->newRow();
                        $data->setQueryField("username", $mailadr);
                        $data->setQueryField("preference", "report_safe");
                        $data->setQueryField("value", $report_safe);

			if ($required_hits) {
				$data->newRow();
				$data->setQueryField("username", $mailadr);
				$data->setQueryField("preference", "required_hits");
				$data->setQueryField("value", $required_hits);
			}


			if ($whitelist) {
				$newarray = explode("\n", $whitelist);
				while(list ($null, $tmpadr) = each($newarray)) {
					$tmpadr = trim($tmpadr);
					if ($tmpadr) {
						$data->newRow();
						$data->setQueryField("username", $mailadr);
						$data->setQueryField("preference", "whitelist_from");
						$data->setQueryField("value", $tmpadr);
					}
				}
			}

			if ($blacklist) {
				$newarray = explode("\n", $blacklist);
				while(list ($null, $tmpadr) = each($newarray)) {
					$tmpadr = trim($tmpadr);
					if ($tmpadr) {
						$data->newRow();
						$data->setQueryField("username", $mailadr);
						$data->setQueryField("preference", "blacklist_from");
						$data->setQueryField("value", $tmpadr);
					}
				}
			}

			// ......

	                html_head("$program_name Administration");
	                $msg = "<b>Anti-Spam setup saved!</b><br><br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_spamsettings[$lang], "$msg",0);
	                html_end();
	                exit();
	        }



	       // "quota"

	        if ($action == "quota") {

			// if quota support is off, show error

			if (($quota_on && !$quota_data["user_quota_support"]) || in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

				$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
				html_head("$program_name Administration - Error");
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}

	                // check args format....

			$form_expiry = "-"; // per default

			if ($form_year != "-" && $form_month != "-" && $form_day != "-") {
				if (checkdate($form_month, $form_day, $form_year)) {
					$form_expiry =  mktime(0,0,0, $form_month, $form_day, $form_year);
				}
			}

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


	       // "user_enable/disable"

	        if ($action == "user_enable" || $action == "user_disable") {

			// if quota & settings support is off, show error

			if (($quota_on && !$quota_data["user_quota_support"]) || in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

				$msg = $txt_error_not_allowed[$lang];
		                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
		                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
				html_head("$program_name Administration - Error");
	        	        html_titlebar($txt_error[$lang], $msg ,0);
		                html_end();
				exit();
			}

	                // update settings

			if ($action == "user_disable") {
			    $enabled_status = "0";
			    $enabled_msg = $txt_turn_off_delivery_expl[$lang];
			} else {
			    $enabled_status = "1";
			    $enabled_msg = $txt_turn_on_delivery_expl[$lang];
			}

	                $results = update_userstatus($U, $enabled_status);

	                html_head("$program_name Administration");
	                $msg = "<b>" . $results . "</b><br><br>";
			$msg .= "$enabled_msg<br>";
	                $msg .= "<ul>";
	                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
	                html_titlebar($txt_delete[$lang], "$msg",0);
	                html_end();
	                exit();
	        }


		// "catchall_ok"

	        if ($action == "catchall_ok") {

			if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

    			    $msg = $txt_error_not_allowed[$lang];
            		    $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
            		    $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
			    html_head("$program_name Administration - Error");
    	    		    html_titlebar($txt_error[$lang], $msg ,0);
            		    html_end();
			    exit();

			}

			// 1. delete "+" if any, 2. create catchall "+" account

	                $results1 = delete_account("+");              // todo: only if exists!

			$fwd[0] = $U;
                        $results2 = create_alias("+", "", $fwd);
	        	$results3 = update_userdetail("+", "Catchall Alias -> $U");
			get_catchall_account();

        	        html_head("$program_name Administration");
        	        $msg = "<b>" . $results1 . "</b><br>";
        	        $msg .= "<b>" . $results2 . "</b><br>";
        	        $msg .= "<b>" . $results3 . "</b><br><br>";
        	        $msg .= "<ul>";
        	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
        	        html_titlebar($txt_catchall[$lang], "$msg",0);
        	        html_end();
        	        exit();
	       	}


	        // "catchall_remove_ok"

	        if ($action == "catchall_remove_ok") {

			if (in_array($U, $readonly_accounts_list) || in_array($U, $system_accounts_list)) {

    			    $msg = $txt_error_not_allowed[$lang];
            		    $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$lang]  .  "</a>\n";
            		    $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$lang] . "</a>\n</ul>";
			    html_head("$program_name Administration - Error");
    	    		    html_titlebar($txt_error[$lang], $msg ,0);
            		    html_end();
			    exit();

			}

	                // check args format... addslashed everywhere, etc...
	                // update forwarders

	                // let vwrap copy the current resp file to a temp file, readable by all

	                $results1 = delete_account("+");
			get_catchall_account();

        	        html_head("$program_name Administration");
        	        $msg = "<b>" . $results1 . "</b><br>";
        	        $msg .= "<ul>";
        	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$lang]  .  "</a>\n";
        	        html_titlebar($txt_remove_catchall[$lang], "$msg",0);
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

		html_head("$program_name Administration - Logout");
	        html_titlebar($txt_logout[$lang], $msg ,0);
	        html_end();
	        exit();
	}


	// fixme : if we're here, $A seems not to exist : should we show something ?

} // end active=1

ob_end_flush();

?>
