<?

#$globar[debug] = 1;
#$debug = 1;

/*
        -----------
        oMail-admin  -  A PHP4 based Vmailmgrd Web interface
        -----------

        * Copyright (C) 2004  Olivier Mueller <om@omnis.ch>

        $Id: index.php,v 1.55 2004/02/15 18:05:43 swix Exp $
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

// Initialize _SESSION variables
require("session_init.php");

// Workaround for missing register_globals in PHP 5.4+
//extract($_REQUEST);
//extract($_SESSION);


/*****************************************************************************/
require("./vmail.inc");
include("config.php");
include("func.php");
include("strings.php");
include("htmlstuff.php");
require("./mysql.inc");
/*****************************************************************************/

// try to improve speed

$vm_list = array();
$vm_list_loaded = 0;
$vm_resp_status = array();

if (!isset($setlang)) {

	// if no language defined yet (cookie or session):
	// try to findout users language by checking it's HTTP_ACCEPT_LANGUAGE variable

    if ($_SERVER["HTTP_ACCEPT_LANGUAGE"]) {
        $langaccept = explode(",", $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
        for ($i = 0; $i < count($langaccept); $i++) {
            $tmplang = trim($langaccept[$i]);
            $tmplang2 = substr($tmplang, 0, 2);
            if (isset($txt_langname[$tmplang])) {   // if the whole string matchs ("de-CH", or "en", etc)
                $setlang = $tmplang;
                break;
            } elseif (isset($txt_langname[$tmplang2])) { // then try only the 2 first chars ("de", "fr"...)
                $setlang = $tmplang2;
                break;
            }
        }
    }

    if (!isset($setlang)) {
        // didn't catch any valid lang : we use the default settings
        $setlang = $default_lang;
    }
}

if (isset($setlang)) {
    $_SESSION["lang"] = $setlang;
}

if (!$_SESSION["active"]) {

    if (!isset($_REQUEST["A"])) {
        // Login screen
		html_head("$program_name Administration - Login");
		html_titlebar($txt_login[$_SESSION["lang"]], $txt_please_login[$_SESSION["lang"]], "");
		html_login();
		html_end();
		exit();
    }

	if ((($sysadmin_mail == "sysadmin@notdefined.yet") && $_REQUEST["A"] != "about") || $_REQUEST["A"] == "splash") {

		html_head("$program_name Administration - Welcome!");
		html_titlebar($txt_welcome[$_SESSION["lang"]], "", "");
		html_splash();
		html_end();
		exit();

	} elseif ($_REQUEST["A"] == "about") {

		html_head("$program_name Administration - about");
		html_titlebar($txt_about[$_SESSION["lang"]], "", "");
		html_about();
		html_end();
		exit();

	} elseif ($_REQUEST["A"] == "help") {

		html_head("$program_name Administration - Help");
		html_titlebar($txt_help[$_SESSION["lang"]], "", "");
		html_help();
		html_end();
		exit();

	} elseif ($_REQUEST["A"] != "checkin") {

		html_head("$program_name Administration - Login");
		html_titlebar($txt_login[$_SESSION["lang"]], $txt_please_login[$_SESSION["lang"]], "");
		html_login();
		html_end();
		exit();

	} else {

		// checkin:

		if (count($domains_list)) {
			if (!$_REQUEST["login_domain"]) {
                $_REQUEST["form_login"] = "";
            }   // -> failure : we need a domain!

			if ($_REQUEST["form_login"]) {
                $_REQUEST["form_login"] .= "@";
            }
			$_REQUEST["form_login"] .= $_REQUEST["login_domain"];
		}

		$form_login = strtolower(trim($_REQUEST["form_login"]));

		// setup tcp host if necessary and if we are using vmailmgrd_tcp

		if ($use_vmailmgrd_tcp) {

			$_SESSION["vm_tcphost"] = "";
			$_SESSION["vm_tcphost_port"] = "";

			switch ($vmailmgrd_tcp_host_method) {

				case "0":  // one host
					$_SESSION["vm_tcphost"] = $vmailmgrd_tcp_host;
					break;

				case "1":  // multi host via select
					$_SESSION["vm_tcphost"] = $vmailmgrd_tcp_hosts_list[$form_tcphost];
					break;

				case "2":  // multi host with transparent host selection
					$_SESSION["vm_tcphost"] = tcp_host_findout($form_login);
					break;

			}
		}

        if (!isset($_REQUEST["form_tcphost"])) {
            $form_tcphost = "";
        } else {
            $form_tcphost = $_REQUEST["form_tcphost"];
        }

        if (!isset($_REQUEST["form_passwd"])) {
            $form_passwd = "";
        } else {
            $form_passwd = $_REQUEST["form_passwd"];
        }

		if ($form_passwd && $form_login && authenticate($form_login, $form_passwd, $_SERVER["REMOTE_ADDR"], $form_tcphost)) {

			// login and password can't be left empty!

			$_SESSION["active"] = 1;
			$_REQUEST["A"] = "menu";

			// if we have vmailstats, load the data into the session

			if ($vmailstats_directory) {

				if (preg_match("/@/", $form_login)) {
					list($tmpuser, $tmpdomain) = explode("@", $form_login);
				} else {
					$tmpdomain = $form_login;
				}

				if (file_exists("$vmailstats_directory/$tmpdomain")) {
					$vmstats = @fopen("$vmailstats_directory/$tmpdomain", "r");
					$firstline = @fgets($vmstats);
					list($tmp1, $tmp2) = explode("\t", $firstline);
					if ($tmp1 == "total_dir_size") {
						$_SESSION["vmailstats"]["active"] = "1";
						$_SESSION["vmailstats"]["global_size"] = $tmp2;
						$tmpstat = fstat($vmstats);
						$_SESSION["vmailstats"]["date"] = $tmpstat["ctime"];
					}

					while($line = fgets($vmstats)) {

						list($tmpuser, $maildirsize, $cursize, $newsize, $curfiles, $newfiles) = explode("\t", $line);
						$_SESSION["vmailstats"][$tmpuser]["size"] = $maildirsize;
						$_SESSION["vmailstats"][$tmpuser]["cursize"] = $cursize;
						$_SESSION["vmailstats"][$tmpuser]["newsize"] = $newsize;
						$_SESSION["vmailstats"][$tmpuser]["curfiles"] = $curfiles;
						$_SESSION["vmailstats"][$tmpuser]["newfiles"] = $newfiles;
					}
				}
			}

		} else {

			$_SESSION["active"] = 0;
	                $msg = $txt_login_failed[$_SESSION["lang"]];
	                $msg .= "<ul><li><a href=\"$script_url?A=login&" . SID . "\">" . $txt_login_again[$_SESSION["lang"]] . "</a>\n";
	                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";

			html_head("$program_name Administration");
        	        html_titlebar($txt_error[$_SESSION["lang"]], $msg ,0);
	                html_end();
			exit();
		}
	}

}

if ($_SESSION["active"] == 1) {    // active=1 -> user logged in

	if (!check_session($_SERVER["REMOTE_ADDR"])) {

		// session expired or bad ip -> exit

		$_SESSION["active"] = 0;
		session_destroy();

	        $msg = $txt_session_expired[$_SESSION["lang"]] . "<br><br>";
                $msg .= "<ul><li><a href=\"$script_url?A=login&" . SID . "\">" . $txt_login_again[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";

		html_head("$program_name Administration");
	        html_titlebar($txt_error[$_SESSION["lang"]], "$msg",0);
	        html_end();
	        exit();
	}

	// spamassassin stuff, in case of multiple hosts ($use_vmailmgrd_tcp = 1)

	if ($use_vmailmgrd_tcp && $_SESSION["vm_tcphost"]) {

		$use_spamassassin = $spamassassin_remote_conf[$_SESSION["vm_tcphost"]]["use_spamassassin"];
		$db_login = $spamassassin_remote_conf[$_SESSION["vm_tcphost"]]["db_login"];
		$db_passwd = $spamassassin_remote_conf[$_SESSION["vm_tcphost"]]["db_passwd"];
		$db_database = $spamassassin_remote_conf[$_SESSION["vm_tcphost"]]["db_database"];
		$db_server = $spamassassin_remote_conf[$_SESSION["vm_tcphost"]]["db_server"];
		$tb_userpref = $spamassassin_remote_conf[$_SESSION["vm_tcphost"]]["tb_userpref"];
	}

	if (!$_REQUEST["A"]) {
        $_REQUEST["A"] = "menu";
    }  // default action
	if ($_REQUEST["A"] == "login") {
        $_REQUEST["A"] = "menu";
    }  // we're already logged in! So we show the menu instead.
	if ($_REQUEST["A"] == "checkin") {
        $_REQUEST["A"] = "menu";
    }  // we're already logged in! So we show the menu instead.

    if (!isset($_REQUEST["form_sort"])) {
        $form_sort = "username";
    } else {
        $form_sort = $_REQUEST["form_sort"];
    }

	//
	// ABOUT
	//

	if ($_REQUEST["A"] == "about") {
		html_head("$program_name Administration - About");
		html_titlebar($txt_about[$_SESSION["lang"]], "", "");
		html_about();
		html_end();
		exit();
	}


	//
	// HELP
	//

	if ($_REQUEST["A"] == "help") {
		html_head("$program_name Administration - Help");
		html_titlebar($txt_help[$_SESSION["lang"]], "", "");
		html_help();
		html_end();
		exit();
	}

	//
	// SPLASH
	//

	if ($_REQUEST["A"] == "splash") {
		html_head("$program_name Administration - Welcome!");
		html_titlebar($txt_welcome[$_SESSION["lang"]], "", "");
		html_splash();
		html_end();
		exit();
	}

	//
	// MENU - ACCOUNTS LISTING
	//

	if ($_REQUEST["A"] == "menu") {
		html_head("$program_name Administration - Menu");
		if ($_SESSION["type"] == "domain") {
			if ($form_sort == "info") {
                $_SESSION["sort_order"] = "info";
            }
			if ($form_sort == "username") {
                $_SESSION["sort_order"] = "username";
            }

			if ($_SESSION["catchall_active"]) {
			    $txt_menu_add = "<br>" . $txt_current_catchall_account_is[$_SESSION["lang"]] . ": <b>" . $_SESSION["catchall_active"] . "@" . $_SESSION["domain"] . "</b>";
			    $txt_menu_add .= ' [ <a href="' . $script_url . '?A=create_catchall&" onClick="oW(this,\'pop\')">' . $txt_edit[$_SESSION["lang"]] . '</a> ]';
			} else {
			    $txt_menu_add = "<br>" . $txt_current_catchall_not_defined[$_SESSION["lang"]] ;
			    $txt_menu_add .= ' [ <a href="'. $script_url . '?A=create_catchall&U=" onClick="oW(this,\'pop\')">' . $txt_edit[$_SESSION["lang"]] . '</a> ]';
			}

			if (isset($_SESSION["vmailstats"]["active"]) && $_SESSION["vmailstats"]["active"]) {
				$txt_menu_add .= "<br>" . $txt_total_size[$_SESSION["lang"]] . ": ";
				if ($_SESSION["vmailstats"]["global_size"] < 1024) {
					$txt_menu_add .= "<b>" . $_SESSION["vmailstats"]["global_size"] . " kB</b>.";
				} else {
					$txt_menu_add .= "<b>" . round($_SESSION["vmailstats"]["global_size"] / 1024, 1) . " MB</b>.";
				}
				$txt_menu_add .= " (" . date("j.m.y H:i:s", $_SESSION["vmailstats"]["date"]) . ") ";
			}

			html_titlebar($txt_menu[$_SESSION["lang"]] . " - ". $_SESSION["domain"], $txt_menu_domain_descr[$_SESSION["lang"]] . $txt_menu_add, 0);

			flush();

			if (!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && $_SESSION["quota_data"]["users_support"])) {
                if (isset($_REQUEST["show_mb_letter"])) {
                    $_SESSION["mb_letter"] = $_REQUEST["show_mb_letter"];
                }
				$mboxes = get_accounts(1);

				if (isset($_REQUEST["new_mb_start"])) {
                    $_SESSION["mb_start"] = $_REQUEST["new_mb_start"];
                }

				if (isset($_SESSION["mb_start"]) && $show_how_many_accounts) {
				    html_display_mailboxes($mboxes, 1, $_SESSION["mb_start"], $show_how_many_accounts);
				} else {
				    html_display_mailboxes($mboxes, 1);
				}
			}

			if (!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && $_SESSION["quota_data"]["alias_support"])) {
                if (isset($_REQUEST["show_al_letter"])) {
                    $_SESSION["al_letter"] = $_REQUEST["show_al_letter"];
                }
				$aliases = get_accounts(2);

				if (isset($_REQUEST["new_al_start"])) {
                    $_SESSION["al_start"] = $_REQUEST["new_al_start"];
                }

				if (isset($_SESSION["al_start"]) && $show_how_many_accounts) {
				    html_display_mailboxes($aliases, 2, $_SESSION["al_start"], $show_how_many_accounts);
				} else {
				    html_display_mailboxes($aliases, 2);
				}
			}

		} else {

			if (!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && $_SESSION["quota_data"]["user_login_allowed"])) {
				html_titlebar($txt_menu[$_SESSION["lang"]] . " - ". $_SESSION["domain"], $txt_menu_account_descr[$_SESSION["lang"]] . $txt_menu_add, 0);
				$testuser = get_accounts(0, $_SESSION["username"]);
				html_display_mailboxes($testuser, 0);

			} else {

				// user logged in correctly, but quota/domain info doesn't allow user login.
               	$msg = $txt_error_not_allowed[$_SESSION["lang"]];
                $msg .= "<ul><li><a href=\"$script_url?A=login&" . SID . "\">" . $txt_login_again[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
				html_head("$program_name Administration");
	        	html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
				$_SESSION["active"] = 0;
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

	if ($_REQUEST["A"] == "spam" || $_REQUEST["A"] == "resp" || $_REQUEST["A"] == "edit" || $_REQUEST["A"] == "read" || $_REQUEST["A"] == "delete" || $_REQUEST["A"] == "parse" || $_REQUEST["A"] == "quota" || $_REQUEST["A"] == "catchall" || $_REQUEST["A"] == "catchall_remove" || $_REQUEST["A"] == "remove_catchall" || $_REQUEST["A"] == "user_enable" || $_REQUEST["A"] == "user_disable") {

        // check if $U ok
		$_REQUEST["U"] = trim($_REQUEST["U"]);  // remove blanks at the beginning and end, if any
        if (!(preg_match("/^[a-zA-Z0-9\_+\.\-]{0,}$/", $_REQUEST["U"]))) {
            html_head("$program_name Administration - Error");
            $msg = "<b>" . $txt_error_invalid_chars_in_username[$_SESSION["lang"]] . "</b><br><br>";
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID. "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
            html_titlebar($txt_error[$_SESSION["lang"]], "$msg", 0);
            html_end();
            exit();
        }
	}

	//
	// NEW ALIAS
	//

	if ($_REQUEST["A"] == "newalias") {

		if ($_SESSION["type"] == "domain" && (!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && ($_SESSION["quota_data"]["alias_support"]  && $_SESSION["quota_data"]["nb_alias"] < $_SESSION["quota_data"]["max_alias"]))) && !$_SESSION["quota_data"]["new_alias_forbidden"]) {
			html_head("$program_name Administration - New Alias");
            html_titlebar($txt_newalias[$_SESSION["lang"]], $txt, 1);
		    $userinfo[2] = "-";
			$_SESSION["quota_data"]["nb_alias"] = 0;
            if (isset($_REQUEST["show_mb_letter"])) {
                $_SESSION["mb_letter"] = $_REQUEST["show_mb_letter"];
            }
			$mboxlist = get_accounts(3);
            html_userform($userinfo, "newalias", $mboxlist);
		    html_end();
		    exit();
		} else {
			if ($_SESSION["type"] != "domain") {
				$msg = $txt_error_not_allowed[$_SESSION["lang"]];
			} else {
                $msg = $txt_error_quota_expired[$_SESSION["lang"]];
			}
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
            html_head("$program_name Administration - Error");
            html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
            exit();
		}
	}


	//
	// NEW USER
	//

	if ($_REQUEST["A"] == "newuser") {

		if ($_SESSION["type"] == "domain" && (!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && ($_SESSION["quota_data"]["users_support"]  && $_SESSION["quota_data"]["nb_users"] < $_SESSION["quota_data"]["max_users"]))) && !$_SESSION["quota_data"]["new_mailbox_forbidden"]) {

			html_head("$program_name Administration - New User");
            html_titlebar($txt_newuser[$_SESSION["lang"]], $txt, 1);
	        $userinfo[2] = "-";
			$_SESSION["quota_data"]["nb_users"] = 0;
            if (isset($_REQUEST["show_mb_letter"])) {
                $_SESSION["mb_letter"] = $_REQUEST["show_mb_letter"];
            }
			$mboxlist = get_accounts(3);
	        html_userform($userinfo, "newuser", $mboxlist);
	        html_end();
	        exit();
		} else {
			if ($_SESSION["type"] != "domain") {
				$msg = $txt_error_not_allowed[$_SESSION["lang"]];
			} else {
               	$msg = $txt_error_quota_expired[$_SESSION["lang"]];
			}
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
			html_head("$program_name Administration - Error");
  	        html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
			exit();
		}
	}

	//
	// ACCOUNT EDIT
	//

	if ($_REQUEST["A"] == "edit") {

	    if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {

            html_head("$program_name Administration - Error");
            $msg = $txt_error_not_allowed[$_SESSION["lang"]];
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
            html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
            exit();
	    }

	    if ($use_ldap) {
            if (!is_array($results = ldap_entry("search", $_REQUEST["U"], "", ""))) {
                html_head("$program_name Administration - Error");
                $msg = "<b>" . $results . "</b><br><br>";
                $msg .= "<ul>";
                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
                html_titlebar($txt_edit[$_SESSION["lang"]], "$msg", 0);
                html_end();
                exit();
            }
	    }

        html_head("$program_name Administration - Edit");
    	html_titlebar($txt_edit_account[$_SESSION["lang"]], $txt_edit_account[$_SESSION["lang"]], 1);
	    $userinfo = get_accounts(0, $_REQUEST["U"]);
	    if (isset($_REQUEST["show_mb_letter"])) {
            $_SESSION["mb_letter"] = $_REQUEST["show_mb_letter"];
        }
	    $mboxlist = get_accounts(3);
	    html_userform($userinfo[0], "edit", $mboxlist);
	    html_end();
	    exit();
	}

	//
	// DELETE ACCOUNT   (ask for confirmation)
	//

	if ($_REQUEST["A"] == "delete") {

	    if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {

            $msg = $txt_error_not_allowed[$_SESSION["lang"]];
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
            html_head("$program_name Administration - Error");
    	    html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
            exit();
	    }

	    html_head("$program_name Administration - Delete Account");	
	    html_titlebar($txt_delete_account[$_SESSION["lang"]], $txt_delete_account_confirm[$_SESSION["lang"]], 1);
	    $userinfo = get_accounts(0, $_REQUEST["U"]);
	    html_delete_confirm($userinfo[0]);
	    html_end();
	    exit();
	}

	//
	// SETUP/REMOVE CATCHALL ACCOUNT   (ask for confirmation)
	//

	if ($_REQUEST["A"] == "catchall" || $_REQUEST["A"] == "remove_catchall" || $_REQUEST["A"] == "create_catchall") {

	    if ((in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) && $_REQUEST["U"] != "") {

            $msg = $txt_error_not_allowed[$_SESSION["lang"]];
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
            html_head("$program_name Administration - Error");
    	    html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
            exit();
	    }

 	    html_head("$program_name Administration - Catchall");
	    if ($_REQUEST["A"] == "catchall") {
	        html_titlebar($txt_catchall[$_SESSION["lang"]], $txt_catchall_confirm[$_SESSION["lang"]], 1);
	    } else {
	        html_titlebar($txt_catchall[$_SESSION["lang"]], "", 1);
	    }

	    $tmpinfo = get_accounts(3);

	    // check if there is a "+" account

	    $tmpsize = count($tmpinfo);

	    for ($i = 0; $i < $tmpsize; $i++) {
	        $catchallinfo = $tmpinfo[$i];
	        if ($catchallinfo[0] == "+") {
                $aliases = $catchallinfo[3];
                $nb_fwd = count($aliases);
                $msg = "";

	    	    if (!($catchallinfo[2])) {
                    $msg .= "The Catchall account is an alias with $nb_fwd forwarders.";
                } else {
                    $msg .= "The Catchall account is a real mailbox with $nb_fwd forwarders.";
                    $msg .= "<br>If you replace it, all the mails of account \"+\" will be deleted";
                }

                if ($aliases[0])  {
                    $msg .= "<br>It's currently pointing to : " . $aliases[0];
	    	    	if (!(preg_match("/@/i", $aliases[0]))) {
                        $msg .= "@" . $_SESSION["domain"];
                    }
                    if ($nb_fwd > 1) {
                        $msg .= " (and " . ($nb_fwd-1) . " other addresses)";
                    }
                }
		    break;
            }
	    }

	    if (!isset($msg)) {
	        $msg = "There is currently no active Catchall account.";
	    }

	    if ($_REQUEST["A"] == "catchall") {
	        $userinfo = get_accounts(0, $_REQUEST["U"]);
   	        html_catchall_confirm($userinfo[0], $msg);
	    } elseif ($_REQUEST["A"] == "create_catchall") {
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

	if ($_REQUEST["A"] == "resp") {

		if (!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && $_SESSION["quota_data"]["autoresp_support"]) && !in_array($_REQUEST["U"], $readonly_accounts_list) && !in_array($_REQUEST["U"], $system_accounts_list)) {

			html_head("$program_name Administration - Autoresponder");
	        html_titlebar($txt_edit_account[$_SESSION["lang"]], $txt,1);
	        $user = get_accounts(0, $_REQUEST["U"]);
			$userinfo = $user[0];
	        $respinfo = load_resp_file($_REQUEST["U"], $userinfo[11]);  // userinfo[11] = responder yes/no

			if ($userinfo[11] || $respinfo[0] == 0) {
				list($respinfo["from"], $respinfo["subject"], $respinfo["body"]) = parse_resp_file($respinfo[1]);
			} else {
				$respinfo["from"] = $_REQUEST["U"] . "@" . $_SESSION["domain"];
				$respinfo["subject"] = $txt_autoresp_subj[$_SESSION["lang"]];
				$respinfo["body"] = $txt_autoresp_body[$_SESSION["lang"]];
			}

            html_respform($userinfo, $respinfo, $userinfo[11]);
            html_end();
		    exit();

		} else {
			$msg = $txt_error_not_allowed[$_SESSION["lang"]];
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
			html_head("$program_name Administration - Error");
  	        html_titlebar($txt_error[$_SESSION["lang"]], $msg ,0);
            html_end();
			exit();
		}
	}

	//
	// SPAM SETTINGS EDIT
	//

	if ($_REQUEST["A"] == "spam") {

		if ($use_spamassassin && !$_SESSION["quota_data"]["spamassassin_use_forbidden"]) {

			html_head("$program_name Administration - SpamAssassin");
	        html_titlebar($txt_edit_account[$_SESSION["lang"]], $txt, 1);
	        $user = get_accounts(0, $_REQUEST["U"]);
			$userinfo = $user[0];

			// default values

			$spamsetup["status"] = "0";
			$spamsetup["delete"] = "0";
			$spamsetup["required_hits"] = "5";
			$spamsetup["spam_target"] = "";
			$spamsetup["whitelist"] = "";
			$spamsetup["blacklist"] = "";

			// get spaminfo from the sql database, if any

			$data = new table($db_database, $tb_userpref, $db_server, $db_login, $db_passwd);
			$data->query("preference,value", "username LIKE '$userinfo[0]@" . $_SESSION["domain"] . "'");
			if ($data->countQueryRows()) {
				for ($i = 0; $i < $data->countQueryRows(); $i++) {
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
					$data->moveNext();
				}
			}

	        html_spamform($userinfo, $spamsetup);
	        html_end();
	        exit();

		} else {
			$msg = $txt_error_not_allowed[$_SESSION["lang"]];
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
			html_head("$program_name Administration - Error");
   	        html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
			exit();
		}

	}

	//
	// QUOTAS EDIT
	//

	if ($_REQUEST["A"] == "quota") {

		if ((!$_SESSION["quota_on"] || ($_SESSION["quota_on"] && $_SESSION["quota_data"]["user_quota_support"]) || ($_SESSION["type"] != "domain")) && !in_array($_REQUEST["U"], $readonly_accounts_list) && !in_array($_REQUEST["U"], $system_accounts_list)) {

			html_head("$program_name Administration - Quotas");
	        html_titlebar($txt_quota_account[$_SESSION["lang"]], $txt, 1);
	        $userinfo = get_accounts(0,$_REQUEST["U"]);
	        html_quotaform($userinfo[0], "edit");
            html_end();
		    exit();

		} else {

			$msg = $txt_error_not_allowed[$_SESSION["lang"]];
            $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
			html_head("$program_name Administration - Error");
  	        html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            html_end();
			exit();
		}
	}


	//
	// PARSE ACTION
	//

	if ($_REQUEST["A"] == "parse") {

        // before any operation check if username is not empty

        if (!$_REQUEST["U"]) {
            html_head("$program_name Administration - Error");
	        $msg = "<b>" . $txt_error_no_username[$_SESSION["lang"]] . "</b><br><br>";
	        $msg .= "<ul>";
	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
			$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
	        html_titlebar($txt_error[$_SESSION["lang"]], "$msg", 0);
	        html_end();
	        exit();
        }

		// add new forwarders to $fwd[] if any
        $fwd = array();
        if (isset($_REQUEST["newfwd"])) {
            $newfwd = trim($_REQUEST["newfwd"]);
        } else {
            $newfwd = "";
        }

		if ($newfwd) {
			$newarray = explode("\n", $newfwd);
			while(list ($null, $tmpadr) = each($newarray)) {
				$tmpadr = trim($tmpadr);
				if ($tmpadr) {
					$fwd[] = $tmpadr;
				}
			}
		}

        // Extract name information
        if (isset($_REQUEST["firstname"])) {
            $firstname = $_REQUEST["firstname"];
        } else {
            $firstname = "";
        }
        if (isset($_REQUEST["lastname"])) {
            $lastname = $_REQUEST["lastname"];
        } else {
            $lastname = "";
        }
        if (isset($_REQUEST["userdetail"])) {
            $userdetail = $_REQUEST["userdetail"];
        } else {
            $userdetail = "";
        }

        // "edit"
        if ($_REQUEST["action"] == "edit") {

            // check args format... addslashed everywhere, etc...
			if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {

                html_head("$program_name Administration - Error");
    			$msg = $txt_error_not_allowed[$_SESSION["lang"]];
            	$msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
            	$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
    	    	html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
            	html_end();
			    exit();
			}

            // if passwd -> change password
            if (!($_REQUEST["passwd1"] == $_REQUEST["passwd2"])) {
                html_head("$program_name Administration - Error");
	            $msg = "<b>" . $txt_error_pw_not_same[$_SESSION["lang"]] . "</b><br><br>";
	            $msg .= "<ul>";
	            $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
				$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
	            html_titlebar($txt_error[$_SESSION["lang"]], "$msg", 0);
                html_end();
	            exit();
            }

			if ($use_ldap) {
			    if ($results=ldap_entry("mod", $_REQUEST["U"], $firstname, $lastname)) {
                    html_head("$program_name Administration - Error");
                    $msg = "<b>" . $results . "</b><br><br>";
                    $msg .= "<ul>";
                    $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                    html_titlebar($txt_edit[$_SESSION["lang"]], "$msg", 0);
                    html_end();
                    exit();
			    }
			}

            if ($_REQUEST["passwd1"] != "" && ($_REQUEST["passwd1"] == $_REQUEST["passwd2"])) {
                $results = update_passwd($_REQUEST["U"], $_REQUEST["passwd1"]);
            }

            // update forwarders
            $results .= "<br>" . update_account($_REQUEST["U"], $fwd);

			if (!$fwd[0] && !$fwd[1] && !$fwd[2] && !$fwd[3] && !$fwd[4] && !$fwd[5]) {
                // no forwarders ? check if the account is active, or warn
				$userinfo = get_accounts(0, $_REQUEST["U"]);
				if (!$userinfo[0][12]) {
					$results .= "<br><br><b><font color=red>" . $txt_forwarding_off_warning[$_SESSION["lang"]] . "</font></b><br>";
				}

			} else {

                // yes, we have forwarders!
				if ($turn_off_delivery_on_fwd_setup) {
					$enabled_status = "0";
					$enabled_msg = $txt_turn_off_delivery_expl[$_SESSION["lang"]];
					$results .= "<br>" . update_userstatus($_REQUEST["U"], $enabled_status);
				}
			}

            // update user detail
			if (($userdetail == "") && ($firstname != "") && ($lastname != "")) {
			    $userdetail = trim($lastname . ", " . $firstname);
			}

			if ($_SESSION["type"] == "domain") {
                $results .= "<br>" . update_userdetail($_REQUEST["U"], $userdetail);
			}

            if (!isset($enabled_msg)) {
                $enabled_msg = "";
            }

			// update catchall_account status if necessary
			get_catchall_account();
            html_head("$program_name Administration");
            $msg = "<b>" . $results . "</b><br><br>";
			$msg .= "$enabled_msg<br>";
            $msg .= "<ul>";
            $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_edit[$_SESSION["lang"]], "$msg", 0);
            html_end();
	        exit();
        }


        // "newuser"
        // "newalias"

	    if ($_REQUEST["action"] == "newuser" || $_REQUEST["action"] == "newalias") {
			// update catchall_account status if necessary
			get_catchall_account();

			if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {
                html_head("$program_name Administration - Error");
    			$msg = $txt_error_not_allowed[$_SESSION["lang"]];
            	$msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            	$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_titlebar($txt_error[$_SESSION["lang"]], $msg ,0);
            	html_end();
			    exit();
			}

			// check if domain admin is logged in and if quota are ok
			if (($_REQUEST["action"] == "newalias" && $_SESSION["quota_data"]["new_alias_forbidden"]) ||
                ($_REQUEST["action"] == "newuser" && $_SESSION["quota_data"]["new_mailbox_forbidden"]) ||
                ($_SESSION["type"] != "domain") ||
                ($_SESSION["quota_on"] && ($_REQUEST["action"] == "newuser") && (!$_SESSION["quota_data"]["users_support"] || ($_SESSION["quota_data"]["nb_users"] >= $_SESSION["quota_data"]["max_users"]))) ||
                ($_SESSION["quota_on"] && ($_REQUEST["action"] == "newalias") && (!$_SESSION["quota_data"]["alias_support"] || ($_SESSION["quota_data"]["nb_alias"] >= $_SESSION["quota_data"]["max_alias"])))) {

                $msg = "Forbidden: " . $_SESSION["quota_data"]["new_alias_forbidden"] . " Support: " . $_SESSION["quota_data"]["alias_support"];
                if ($_SESSION["type"] != "domain") {
                    $msg .= $txt_error_not_allowed[$_SESSION["lang"]];
                } else {
                    $msg .= $txt_error_quota_expired[$_SESSION["lang"]];
                }
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_head("$program_name Administration");
                html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
                exit();
            }

            // check args format... addslashed everywhere, etc...
            if (!($_REQUEST["passwd1"] == $_REQUEST["passwd2"])) {
                html_head("$program_name Administration - Error");
                $msg = "<b>" . $txt_error_pw_not_same[$_SESSION["lang"]] . "</b><br><br>";
                $msg .= "<ul>";
                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_titlebar($txt_error[$_SESSION["lang"]], "$msg", 0);
                html_end();
                exit();
            }

            if (!$_REQUEST["passwd1"] && ($_REQUEST["action"] == "newuser")) {   // mailbox _needs_ a password, alias doesn't.
                html_head("$program_name Administration - Error");
                $msg = "<b>" . $txt_error_pw_needed[$_SESSION["lang"]] . "</b><br><br>";
                $msg .= "<ul>";
                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_titlebar($txt_error[$_SESSION["lang"]], "$msg", 0);
                html_end();
                exit();
            }

            // create empty list of forwarders if necessary
            if (!$fwd[0] && !$fwd[1] && ($_REQUEST["action"] == "newalias")) {  // alias needs at least one fwd
                html_head("$program_name Administration - Error");
                $msg = "<b>" . $txt_error_fwd_needed[$_SESSION["lang"]] . "</b><br><br>";
                $msg .= "<ul>";
                $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" .
                $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_titlebar($txt_error[$_SESSION["lang"]], "$msg", 0);
                html_end();
                exit();
            }

	        if ($_REQUEST["action"] == "newuser") {
				if ($use_ldap) {
				    $results = ldap_entry ("add", $_REQUEST["U"], $firstname, $lastname);
				} else {
				    unset ($results) ;
				}
 				if (!$results) {
				    $results = "<br>" . create_account($_REQUEST["U"], $_REQUEST["passwd1"], $fwd);
 				    if (($userdetail == "") && ($firstname != "") && ($lastname != "")) {
                        $userdetail = $lastname . ", " . $firstname;
 				    }
				    if (strpos($results, "ok")) {
					    update_userdetail($_REQUEST["U"], $userdetail);
				    }
				}
			}

            if ($_REQUEST["action"] == "newalias") {
                if ($use_ldap) {
				    $results = ldap_entry ("add", $_REQUEST["U"], $firstname, $lastname);
				} else {
				    unset ($results) ;
				}
 				if (!isset($results)) {
				    $results = create_alias($_REQUEST["U"], $passwd1, $fwd);
 				    if (($userdetail == "") && ($firstname != "") && ($lastname != "")) {
                        $userdetail = $lastname . ", " . $firstname;
 				    }
				    if (strpos($results,"ok")) {
					    update_userdetail($_REQUEST["U"], $userdetail);
				    }
				}
			}

			// update catchall_account status if necessary
			get_catchall_account();

            html_head("$program_name Administration");
            $msg = "<b>" . $results . "</b><br><br>";
            $msg .= "<ul>";
            $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_edit[$_SESSION["lang"]], "$msg", 0);
            html_end();
            exit();
		}

        // "delete_ok"
        if ($_REQUEST["action"] == "delete_ok") {

			if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {

                html_head("$program_name Administration - Error");
    			$msg = $txt_error_not_allowed[$_SESSION["lang"]];
            	$msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
    	    	html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
			    exit();
			}

			if ($use_ldap ) {
			    if ($results = ldap_entry("del", $_REQUEST["U"], "", "")) {
                    html_head("$program_name Administration - Error");
                    $msg = "<b>" . $results . "</b><br><br>";
                    $msg .= "<ul>";
                    $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]]  .  "</a>\n";
                    html_titlebar($txt_edit[$_SESSION["lang"]], "$msg",0);
                    html_end();
                    exit();
			    }
			}

            // check args format... addslashed everywhere, etc...
	        // update forwarders

			if ($use_spamassassin && !$_SESSION["quota_data"]["spamassassin_use_forbidden"]) {
				$userinfotmp = get_accounts(0, $_REQUEST["U"]);
				$userinfo = $userinfotmp[0];
				$mailadr = $userinfo[0] . "@" . $_SESSION["domain"];

				$data = new table($db_database, $tb_userpref, $db_server, $db_login, $db_passwd);
				$data->query("*", "username LIKE '$mailadr' AND (preference LIKE 'spam_enabled' OR preference LIKE 'spam_trash' OR preference LIKE 'required_hits' OR preference LIKE 'spam_fwd' OR preference LIKE 'blacklist_from' OR preference LIKE 'whitelist_from')");
				$data->deleteRows();
				$results1 = "Spam Settings removed for &lt;$mailadr&gt;<br>";
			}

            if (!isset($results1)) {
                $results1 = "";
            }

            // let vwrap copy the current resp file to a temp file, readable by all
	        $results1 .= delete_account($_REQUEST["U"]);

			// check if we deleted the account on which the checkall (+) account was pointing on.
			// if yes, also remove the "+"

			if ($_REQUEST["U"] == $_SESSION["catchall_active"]) {
			    $results1 .= "<br>" . delete_account("+");
			}

			get_catchall_account();

        	html_head("$program_name Administration");
        	$msg = "<b>" . $results1 . "</b><br>";
        	$msg .= "<ul>";
        	$msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_delete[$_SESSION["lang"]], "$msg", 0);
            html_end();
        	exit();
        }

	    // "responder"
	    if ($_REQUEST["action"] == "responder") {

            // if autoresp support is off, show error
            if ($_SESSION["quota_on"] && !$_SESSION["quota_data"]["autoresp_support"]) {
                html_head("$program_name Administration - Error");
                $msg = $txt_error_not_allowed[$_SESSION["lang"]];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
                exit();
            }

            // check args format....
            if (get_magic_quotes_gpc() == 1) {
                $body = stripslashes($_REQUEST["body"]);
                $subject = stripslashes($_REQUEST["subject"]);
                $from = stripslashes($_REQUEST["from"]);
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
            $results = save_resp_file($_REQUEST["U"], "Subject: $subject\nFrom: $from\n\n$body", $_REQUEST["responder"]);

            html_head("$program_name Administration");
            $msg = "<b>" . $results . "</b><br><br>";
            $msg .= "<ul>";
            $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_delete[$_SESSION["lang"]], "$msg", 0);
            html_end();
            exit();
        }

	    // "spam"
	    if ($_REQUEST["action"] == "spam") {

            // if spam support is off, show error
            if (!$use_spamassassin && !$_SESSION["quota_data"]["spamassassin_use_forbidden"]) {
                html_head("$program_name Administration - Error");
                $msg = $txt_error_not_allowed[$_SESSION["lang"]];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
                html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
                exit();
            }
    
            // check args format....
            if (get_magic_quotes_gpc() == 1) {
                $from = stripslashes($_REQUEST["from"]);
            }

			// remove blanks
			$from = trim($from);

			// remove any spam infos from userdetail, keep actual infos...
			$userinfotmp = get_accounts(0, $_REQUEST["U"]);
			$userinfo = $userinfotmp[0];
			$mailadr = $userinfo[0] . "@" . $_SESSION["domain"];

			$data = new table($db_database, $tb_userpref, $db_server, $db_login, $db_passwd);
			$data->query("*", "username LIKE '$mailadr' AND (preference LIKE 'spam_enabled' OR preference LIKE 'spam_trash' OR preference LIKE 'required_hits' OR preference LIKE 'spam_fwd' OR preference LIKE 'blacklist_from' OR preference LIKE 'whitelist_from')");
			$data->deleteRows();

			$data->newRow();
			$data->setQueryField("username", $mailadr);
			$data->setQueryField("preference", "spam_fwd");
			$data->setQueryField("value", $from);

			$data->newRow();
			$data->setQueryField("username", $mailadr);
			$data->setQueryField("preference", "spam_enabled");
			$data->setQueryField("value", $_REQUEST["spam_status"]);

			$data->newRow();
			$data->setQueryField("username", $mailadr);
			$data->setQueryField("preference", "spam_trash");
			$data->setQueryField("value", $_REQUEST["spam_delete"]);

			if ($required_hits) {
				$data->newRow();
				$data->setQueryField("username", $mailadr);
				$data->setQueryField("preference", "required_hits");
				$data->setQueryField("value", $_REQUEST["required_hits"]);
			}

			if ($whitelist) {
				$newarray = explode("\n", $_REQUEST["whitelist"]);
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
				$newarray = explode("\n", $_REQUEST["blacklist"]);
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
	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_spamsettings[$_SESSION["lang"]], "$msg", 0);
	        html_end();
	        exit();
        }

        // "quota"
        if ($_REQUEST["action"] == "quota") {

			// if quota support is off, show error
			if (($_SESSION["quota_on"] && !$_SESSION["quota_data"]["user_quota_support"]) || in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {
				$msg = $txt_error_not_allowed[$_SESSION["lang"]];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
		        $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
				html_head("$program_name Administration - Error");
                html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
				exit();
			}

	        // check args format....
			$form_expiry = "-"; // per default

			if (($_REQUEST["form_year"] != "-") && ($_REQUEST["form_month"] != "-") && ($_REQUEST["form_day"] != "-")) {
				if (checkdate($_REQUEST["form_month"], $_REQUEST["form_day"], $_REQUEST["form_year"])) {
					$form_expiry =  mktime(0, 0, 0, $_REQUEST["form_month"], $_REQUEST["form_day"], $_REQUEST["form_year"]);
				}
			}

            // update quotas
            $results = update_userquota($_REQUEST["U"], $_REQUEST["form_softquota"], $_REQUEST["form_hardquota"], $_REQUEST["form_expiry"], $_REQUEST["form_msgcount"], $_REQUEST["form_msgsize"], $_REQUEST["form_enabled"]);
            html_head("$program_name Administration");
            $msg = "<b>" . $results . "</b><br><br>";
	        $msg .= "<ul>";
	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_delete[$_SESSION["lang"]], "$msg", 0);
	        html_end();
	        exit();
        }

	    // "user_enable/disable"
        if ($_REQUEST["action"] == "user_enable" || $_REQUEST["action"] == "user_disable") {

			// if quota & settings support is off, show error
			if (($_SESSION["quota_on"] && !$_SESSION["quota_data"]["user_quota_support"]) || in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {
				$msg = $txt_error_not_allowed[$_SESSION["lang"]];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
				html_head("$program_name Administration - Error");
                html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
				exit();
			}

	        // update settings
			if ($_REQUEST["action"] == "user_disable") {
			    $enabled_status = "0";
			    $enabled_msg = $txt_turn_off_delivery_expl[$_SESSION["lang"]];
			} else {
			    $enabled_status = "1";
			    $enabled_msg = $txt_turn_on_delivery_expl[$_SESSION["lang"]];
			}

            $results = update_userstatus($_REQUEST["U"], $enabled_status);

            html_head("$program_name Administration");
            $msg = "<b>" . $results . "</b><br><br>";
			$msg .= "$enabled_msg<br>";
            $msg .= "<ul>";
            $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_delete[$_SESSION["lang"]], "$msg", 0);
	        html_end();
	        exit();
        }

		// "catchall_ok"
        if ($_REQUEST["action"] == "catchall_ok") {
			if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {
   			    $msg = $txt_error_not_allowed[$_SESSION["lang"]];
      		    $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
                $msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
			    html_head("$program_name Administration - Error");
    	    	html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
			    exit();
			}

			// delete "+" if any, 2. create catchall "+" account
            $results1 = delete_account("+");              // todo: only if exists!

			$fwd[0] = $_REQUEST["U"];
            $results2 = create_alias("+", "", $_REQUEST["fwd"]);
            $results3 = update_userdetail("+", "Catchall Alias -> " . $_REQUEST["U"]);
			get_catchall_account();

            html_head("$program_name Administration");
        	$msg = "<b>" . $results1 . "</b><br>";
        	$msg .= "<b>" . $results2 . "</b><br>";
        	$msg .= "<b>" . $results3 . "</b><br><br>";
        	$msg .= "<ul>";
        	$msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_catchall[$_SESSION["lang"]], "$msg", 0);
            html_end();
        	exit();
        }

	    // "catchall_remove_ok"
        if ($action == "catchall_remove_ok") {
			if (in_array($_REQUEST["U"], $readonly_accounts_list) || in_array($_REQUEST["U"], $system_accounts_list)) {
   			    $msg = $txt_error_not_allowed[$_SESSION["lang"]];
                $msg .= "<ul><li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            	$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";
			    html_head("$program_name Administration - Error");
    	    	html_titlebar($txt_error[$_SESSION["lang"]], $msg, 0);
                html_end();
			    exit();
			}

            $results1 = delete_account("+");
			get_catchall_account();

   	        html_head("$program_name Administration");
   	        $msg = "<b>" . $results1 . "</b><br>";
   	        $msg .= "<ul>";
   	        $msg .= "<li><a href=\"$script?A=menu&" . SID . "\" onClick=\"return gO(this,true)\">" . $txt_menu[$_SESSION["lang"]] . "</a>\n";
            html_titlebar($txt_remove_catchall[$_SESSION["lang"]], "$msg",0);
        	html_end();
            exit();
        }
	}

	//
	// LOGOUT
	//
	if ($_REQUEST["A"] == "logout") {
        $msg = $txt_goodbye[$_SESSION["lang"]];
        $msg .= "<ul><li><a href=\"$script_url?A=login&setlang=" . $_SESSION["lang"] . "&" . SID . "\">" . $txt_login_again[$_SESSION["lang"]] . "</a>\n";
		$msg .= "<li><a href=\"mailto:" . $sysadmin_mail. "\">" . $txt_mail_sysadmin[$_SESSION["lang"]] . "</a>\n</ul>";

		$_SESSION["active"] = 0;
		session_destroy();

		html_head("$program_name Administration - Logout");
	    html_titlebar($txt_logout[$_SESSION["lang"]], $msg ,0);
	    html_end();
	    exit();
	}

	// fixme : if we're here, $_REQUEST["A"] seems not to exist: should we show something ?

} // end active=1

ob_end_flush();

?>
