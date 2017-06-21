<?

/*
    -----------
    oMail-admin  -  A PHP4 based Vmailmgrd Web interface
    -----------

    * Copyright (C) 2004  Olivier Mueller <om@omnis.ch>
	* Copyright (C) 2000  Martin Bachmann (bachi@insign.ch) & Ueli Leutwyler (ueli@insign.ch)

    $Id: func.php,v 1.38 2004/02/15 18:05:43 swix Exp $
    $Source: /cvsroot/omail/admin2/func.php,v $

    func.php
    --------

    16.jan.2k   om   First version
    01.aug.2k   om   Rewrite for PHP4


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

// Constants (for HTML template replacement arrays)
const actions = "actions";
const alias1 = "alias1";
const aliases = "aliases";
const bla = "bla";
const buttonlabels = "buttonlabels";
const fwdcolor = "fwdcolor";
const get_accounts_sort_by_name = "get_accounts_sort_by_name";
const id = "id";
const obj = "obj";
const onClick = "onClick";
const sel = "sel";
const txt = "txt";
const txt_fwd = "txt_fwd";
const url = "url";

function check_session($arg_ip) {
	global $expire_after;

	// expired?  auto session expiration after N minutes
	if ($_SESSION["expire"] > time()) {
		// ok, we update actual expire time
		$_SESSION["expire"] = time() + $expire_after*60;
	} else {
		// exit
		return 0;
	}

	// ip ? check if the host is the same (in case of url spoofing...)
	if ($arg_ip != $_SESSION["ip"]) {
		// ip doesn't match -> exit
		return 0;
	}

	// if we are here, everything is alright : we can continue
    return 1;
}

function authenticate($arg_login, $arg_passwd, $arg_ip, $tcphostname) {
	global $expire_after;

	// admin or user login?
	if (preg_match("/(.*)\@(.*)/", $arg_login, $parts)) {
		$_SESSION["username"] = $parts[1];
		$_SESSION["domain"] = $parts[2];
		$_SESSION["passwd"] = base64_encode($arg_passwd);
		$_SESSION["type"] = "user";
	} else {
		$_SESSION["username"] = "";
		$_SESSION["domain"] = $arg_login;
		$_SESSION["passwd"] = base64_encode($arg_passwd);
		$_SESSION["type"] = "domain";
	}

	// initalize some variables
	$_SESSION["mb_start"] = 0;
	$_SESSION["al_start"] = 0;

	// authenticate
	if ($_SESSION["type"] == "domain") {
		$test = listdomain($_SESSION["domain"], base64_decode($_SESSION["passwd"]));

		if (is_array($test[0]) || ($test[0] != 2)) {
			SetCookie("cookie_omail_last_login","", Time()+993600);
			SetCookie("cookie_omail_last_domain", $_SESSION["domain"], Time()+993600);
			if ($tcphostname) {
				SetCookie("cookie_omail_last_server", $tcphostname, Time()+993600);
			}
			SetCookie("cookie_omail_lang", $_SESSION["lang"], Time()+993600);
			$_SESSION["expire"] = time() + $expire_after*60;
			$_SESSION["ip"] = $arg_ip;

			load_quota_info($_SESSION["domain"]);
			get_catchall_account();

			return 1;
		} else {
			return 0;
		}
	} elseif ($_SESSION["type"] == "user") {
		$test = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $_SESSION["username"], "PASS", base64_decode($_SESSION["passwd"]));

		if ($test[0] == 0) {
			SetCookie("cookie_omail_last_login", $_SESSION["username"], Time()+993600);
			SetCookie("cookie_omail_last_domain", $_SESSION["domain"], Time()+993600);
			SetCookie("cookie_omail_lang", $_SESSION["lang"], Time()+993600);
			$_SESSION["expire"] = time() + $expire_after*60;
			$_SESSION["ip"] = $arg_ip;

			load_quota_info($_SESSION["domain"]);
			get_catchall_account();

			return 1;
        } else {
			return 0;
		}
	} else {
		return 0;
	}
}

function load_quota_info($domain) {
	global $vmailmgrquota_file;
	$_SESSION["quota_on"] = 0;
	$domain = strtolower($domain);

	if (file_exists($vmailmgrquota_file)) {

		$fp = fopen($vmailmgrquota_file, "r");
		while (!feof($fp)) {
			$buffer = trim(fgets($fp, 4096));
			if (substr($buffer, 1) != "#" && substr($buffer, 1) != "\n" && substr($buffer, 1) != "")
			{
				$entry = explode("|",$buffer);
				$entry[0] = strtolower($entry[0]);

				// catch current domain (also if quota_on is set : could happen if default domain definied at start)
				// catch default domain, but only if quota_on not yet set.

				if (($entry[0] == $domain) || (!$_SESSION["quota_on"] && ($entry[0] == "*" || $entry[0] == "+" || $entry[0] == "default"))) {
					$_SESSION["quota_on"] = 1;
					$_SESSION["quota_data"]["nb_users"] = 0;			// current number of users
					$_SESSION["quota_data"]["nb_alias"] = 0;			// and aliases (will be set later)
					$_SESSION["quota_data"]["max_users"] = $entry[1];
					$_SESSION["quota_data"]["max_alias"] = $entry[2];
					$_SESSION["quota_data"]["users_support"] = $entry[3];
					$_SESSION["quota_data"]["alias_support"] = $entry[4];
					$_SESSION["quota_data"]["user_login_allowed"] = $entry[5];
					$_SESSION["quota_data"]["autoresp_support"] = $entry[6];
					$_SESSION["quota_data"]["user_quota_support"] = $entry[7];
					$_SESSION["quota_data"]["catchall_use_allowed"] = $entry[8];
					$_SESSION["quota_data"]["softquota"] = $entry[9] * 1024;
					$_SESSION["quota_data"]["hardquota"] = $entry[10] * 1024;
					$_SESSION["quota_data"]["msgsize"] = $entry[11] * 1024;
					$_SESSION["quota_data"]["new_mailbox_forbidden"] = $entry[12];
					$_SESSION["quota_data"]["new_alias_forbidden"] = $entry[13];
					$_SESSION["quota_data"]["spamassassin_use_forbidden"] = $entry[14];
					$_SESSION["quota_data"]["spamassassin_default_status"] = $entry[15];
				}
			}
		}
		fclose ($fp);

        // dirty hack, but should be ok for the moment :]  (index.php will be updated soon)
        if (!isset($_SESSION["quota_data"]["max_users"]) || ($_SESSION["quota_data"]["max_users"] == 0)) {
            $_SESSION["quota_data"]["max_users"] = 99999999;
        }
        if (!isset($_SESSION["quota_data"]["max_alias"]) || ($_SESSION["quota_data"]["max_alias"] == 0)) {
            $_SESSION["quota_data"]["max_alias"] = 99999999;
        }
        if (!isset($_SESSION["quota_data"]["softquota"]) || ($_SESSION["quota_data"]["softquota"] == 0)) {
            $_SESSION["quota_data"]["softquota"] = '-';
        }
        if (!isset($_SESSION["quota_data"]["hardquota"]) || ($_SESSION["quota_data"]["hardquota"] == 0)) {
            $_SESSION["quota_data"]["hardquota"] = '-';
        }
        if (!isset($_SESSION["quota_data"]["msgsize"]) || ($_SESSION["quota_data"]["msgsize"] == 0)) {
            $_SESSION["quota_data"]["msgsize"] = '-';
        }
	}
}


function get_accounts_sort_by_name($a, $b) {
	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)=$a;
	list($username2, $password2, $mbox2, $alias2, $PersonalInfo2, $HardQuota2, $SoftQuota2, $SizeLimit2, $CountLimit2, $CreationTime2, $ExpiryTime2, $resp2, $Enabled2, $Visible2)=$b;
	return (strtolower($username) < strtolower($username2)) ? -1 : 1;
}


function get_accounts_sort_by_info($a, $b) {
	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)=$a;
	list($username2, $password2, $mbox2, $alias2, $PersonalInfo2, $HardQuota2, $SoftQuota2, $SizeLimit2, $CountLimit2, $CreationTime2, $ExpiryTime2, $resp2, $Enabled2, $Visible2)=$b;
	return (strtolower($PersonalInfo) < strtolower($PersonalInfo2)) ? -1 : 1;
}


function get_accounts($arg_action, $arg_username = "") {
	global $readonly_accounts_list, $system_accounts_list;
	global $vm_list, $vm_list_loaded, $vm_resp_status;

	$new_list = array();

	// action = 0 : only one mailbox (user mode)
	// action = 1 : all mailboxes, with resp (admin mode) but not "+" if created by omail-admin
	// action = 2 : all aliases, no resp yet (admin mode) but not "+" if created by omail-admin
	// action = 3 : all accounts, without anything else (admin mode)  [for catchall detection]

	if ($arg_action) {
		if (!$vm_list_loaded) {
			$vm_list = listdomain($_SESSION["domain"], base64_decode($_SESSION["passwd"]));
			$vm_list_loaded = 1;
		}

		$list = $vm_list;
		$j = 0;

		if ($_SESSION["quota_on"]) {
			if ($arg_action == 1 || $arg_action == 3) { $_SESSION["quota_data"]["nb_users"] = 0; }
			if ($arg_action == 2 || $arg_action == 3) { $_SESSION["quota_data"]["nb_alias"] = 0; }
		}

        for ($i = 0; $i < sizeof($list); $i++) {
            list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $data11) = $list[$i];
            // set if visible or not (for catchall or "admin" accounts like postmaster, etc...)
            if ($username == "+") {
                $Visible = 0;
            } else {
                $Visible = 1;
            }

            // get enabled/disabled status
            if (isset($data11[8]) && (ord($data11[8]) == 49)) {
                $Enabled = 1;
            } else {
                $Enabled = 0;
            }

			// findout autoresp status (only lookup for mailboxes)
			if ($mbox && $arg_action != 3) {
				if (!isset($vm_resp_status[$username])) {
					$resp = load_resp_status($username);
					$vm_resp_status[$username] = $resp;
				} else {
					$resp = $vm_resp_status[$username];
				}
			}  else {
				$resp = 0;
			}

            if (($arg_action == 1) && $_SESSION["mb_letter"] && !preg_match("/^[".$_SESSION["mb_letter"]."]/i", $username)) {
                if ($mbox) {
                    if (!(in_array($username, $readonly_accounts_list) || in_array($username, $system_accounts_list))) {
                        $_SESSION["quota_data"]["nb_users"]++;
                    }
                }
                continue;
            }

            if ($arg_action == 2 && $_SESSION["al_letter"] && !preg_match("/^[".$_SESSION["al_letter"]."]/i", $username)) {
                if (!$mbox) {
                    if (!(in_array($username, $readonly_accounts_list) || in_array($username, $system_accounts_list))) {
                        $_SESSION["quota_data"]["nb_alias"]++;
                    }
                }
                continue;
            }

            $list[$i] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible);
            if ($mbox && ($arg_action == 1 || $arg_action == 3)) {
                $new_list[$j] = $list[$i];
                $j++;
                if (!(in_array($username, $readonly_accounts_list) || in_array($username, $system_accounts_list))) {
                    $_SESSION["quota_data"]["nb_users"]++;
                }
            }

            if (!$mbox && ($arg_action == 2 || $arg_action == 3)) {
                $new_list[$j] = $list[$i];
                $j++;
                if (!(in_array($username, $readonly_accounts_list) || in_array($username, $system_accounts_list))) {
                    $_SESSION["quota_data"]["nb_alias"]++;
                }
            }

            if (($username == $arg_username) && ($arg_action == 0)) {
                $new_list[$j] = $list[$i];
                $j++;
            }
        }

		if ($_SESSION["sort_order"] == "info") {
            // try to sort on username
			usort($new_list, get_accounts_sort_by_info);
		} else {
			usort($new_list, get_accounts_sort_by_name);
		}

	} else {  // user login

		$lookup_data = lookup($_SESSION["domain"], $arg_username, base64_decode($_SESSION["passwd"]));
		$alias = array();

		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $data11) = $lookup_data;

		// get enabled/disabled status
		if (ord($data11[8]) == 49) {
            $Enabled = 1;
        } else {
            $Enabled = 0;
        }

		if ($mbox) {
            $resp = load_resp_status($username);
        } else {
            $resp = 0;
        } // only lookup for mailboxes

        $new_list[0] = array($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, 1);
	}

	return $new_list;
}

function update_passwd($arg_username, $arg_passwd) {

	if ($_SESSION["type"] == "user") {
        $result = vchpass($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, $arg_passwd);
        // update session password if necessary
        $_SESSION["passwd"] = base64_encode($arg_passwd);
    } else {
        $result = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "PASS", $arg_passwd);
    }

    if (isset($result[1])) {
        $retmsg = $result[1];
    } else {
        $retmsg = "";
    }

    if (!isset($result[0]) || (isset($result[0]) && !$result[0])) {
        return "PASSW ok: " . $retmsg;
    } else {
        return "PASSW error: " . $retmsg;
    }
}

function update_userdetail($arg_username, $arg_detail) {

	$result = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "PERSONAL", $arg_detail);

    if (!$result[0]) {
        return "USERINFO ok : " . $result[1] ;
    } else {
        return "USERINFO error : " . $result[1] ;
    }
}

function update_userquota($arg_username, $arg_softquota, $arg_hardquota, $arg_expiry, $arg_msgcount, $arg_msgsize, $arg_enabled) {

	if ($arg_softquota == "" || $arg_softquota == "-") {
        $arg_softquota = "-";
    } else {
        $arg_softquota = $arg_softquota * 1024;
    }
	if ($arg_hardquota == "" || $arg_hardquota == "-") {
        $arg_hardquota = "-";
    } else {
        $arg_hardquota = $arg_hardquota * 1024;
    }
	if ($arg_msgsize == "" || $arg_msgsize == "-" ) {
        $arg_msgsize = "-";
    } else {
        $arg_msgsize = $arg_msgsize * 1024;
    }
	if ($arg_msgcount == "") {
        $arg_msgcount = "-";
    }

	$result1 = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "HARDQUOTA", $arg_hardquota);
	$result2 = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "SOFTQUOTA", $arg_softquota);
	$result3 = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "MSGSIZE", $arg_msgsize);
	$result4 = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "MSGCOUNT", $arg_msgcount);
	$result5 = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "EXPIRY", $arg_expiry);
	$result6 = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "MAILBOX_ENABLED", $arg_enabled);

    if ((!isset($result1[0]) && !isset($result2[0]) && !isset($result3[0]) && !isset($result4[0]) && !isset($result5[0]) && !isset($result6[0]))
        || (!$result1[0] && !$result2[0] && !$result3[0] && !$result4[0] && !$result5[0] && !$result6[0])) {
        return "QUOTA ok : " . $result6[1] ;
    } else {
        return "QUOTA error : " . $result6[1] ;
    }
}

function update_userstatus($arg_username, $arg_enabled) {
	$result = vchattr($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, "MAILBOX_ENABLED", $arg_enabled);

    if (!$result[0]) {
        return "SETTINGS ok : " . $result[1] ;
    } else {
        return "SETTINGS error : " . $result[1] ;
    }
}

function update_account($arg_username, $arg_fwd) {
	// check forwarders
	$nb_fwd = count($arg_fwd);
    $new_fwd = array ();
    $j = 0;
    if ($nb_fwd) {
        for($i = 0; $i<$nb_fwd; $i++) {
			if ($arg_fwd[$i]) {
				$new_fwd[$j++] = trim($arg_fwd[$i]);
			}
		}
	}

	$result = vchforward($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, $new_fwd);

    if (!$result[0]) {
        return "UPDATE ok : " . $result[1] ;
    } else {
        return "UPDATE error : " . $result[1] ;
    }
}

function create_account($arg_username, $arg_passwd, $arg_fwd) {
	$result = vadduser($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, $arg_passwd, $arg_fwd);

    if (!$result[0]) {
        return "NEWUSER ok : " . $result[1] ;
    } else {
        return "NEWUSER error : " . $result[1] ;
    }
}

function create_alias($arg_username, $arg_passwd, $arg_fwd) {
	$result = vaddalias($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, $arg_passwd, $arg_fwd);

    if (!$result[0]) {
        return "NEWALIAS ok : " . $result[1] ;
    } else {
        return "NEWALIAS error : " . $result[1] ;
    }
}

function delete_account($arg_username) {
	$result = vdeluser($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username);

    if (!$result[0]) {
        return "DELETE ok :  " . $result[1] ;
    } else {
        return "DELETE error : " . $result[1] ;
    }
}

function load_resp_file($arg_username) {
	$return_data = vreadautoresponse($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username);

	return $return_data;
}

function load_resp_status($arg_username) {
	$data = vautoresponsestatus($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username);
	$status = $data[1];

	if ($status == "enabled") {
        return 1;
    } else {
        return 0;
    }
}

function parse_resp_file($arg_text) {

	$text = explode("\n", $arg_text);
	$from = "";
	$subject = "";
	$body = "";

	for ($i = 0; $i < count($text)-1; $i++) {
		if (preg_match("/^From: (.*)$/i", $text[$i], $parts)) {
			$from = $parts[1];
		} elseif (preg_match("/^Subject: (.*)$/i", $text[$i], $parts)) {
			$subject = $parts[1];
		} else {
			$body .= $text[$i] . "\n";
		}
	}
	$body .= $text[$i];

    return array($from, $subject, $body);
}

function save_resp_file($arg_username, $arg_resptext, $arg_status) {

	// activate autoresponder (needed to be able to write to the file...)
	venableautoresponse($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username);

	// write text
	$result = vwriteautoresponse($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username, $arg_resptext);

    if (!$result[0]) {
        $return_msg = "AUTORESP_TXT ok :  " . $result[1] . "<br>";
    } else {
        $return_msg = "AUTORESP_TXT error : " . $result[1] . "<br>";
    }

	if ($arg_status) {
		$stat = "ON";
		$result2 = venableautoresponse($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username);
	} else {
		$stat = "OFF";
		$result2 = vdisableautoresponse($_SESSION["domain"], base64_decode($_SESSION["passwd"]), $arg_username);
	}

	if (!$result2[0]) {
        $return_msg .= "AUTORESP $stat ok :  " . $result2[1] ;
    } else {
        $return_msg .= "AUTORESP $stat error : " . $result2[1] ;
    }

	return $return_msg;
}

function get_catchall_account() {

	$_SESSION["catchall_active"] = "";   // reset

	// will return the name of the actual catchall account, but only if it is an "official"
	// one (created by omail-admin, only one forwarder pointing to an existing account)
	// if it exists and is "official", the "+" account won't be shown as a normal account, but
	// the target account will be highlighted

	$tmpinfo = get_accounts(3);
	$tmpsize = count($tmpinfo);

	for ($i = 0; $i < $tmpsize; $i++) {

	    $catchallinfo = $tmpinfo[$i];

	    if (isset($catchallinfo[0]) && ($catchallinfo[0] == "+")) {
            if (!($catchallinfo[2])) {
                $aliases = $catchallinfo[3];
                $nb_fwd = count($aliases);

                if ($nb_fwd == 1 && $aliases[0] && (!(preg_match("/@/i", $aliases[0]))))  {
                    $_SESSION["catchall_active"] = $aliases[0];
                    break;
                }
            }
	    }
	}
}

// ---------------------------------------------------------------------------------
// Dynamic Token Access
// (c) insign gmbh - www.insign.ch
// Programmiert:	Martin Bachmann (bachi@insign.ch) & Ueli Leutwyler (ueli@insign.ch)
// ---------------------------------------------------------------------------------

function parseTemplate($parseArray, $template, $outputFile = "", $encoding="", $separator="%") {
	return complexParsing($parseArray, $template, $outputFile, $encoding, $separator);
}

function parseContent($parseArray, $content, $encoding = "", $separator = "%") {
    $ar = array();
    while (list($key, $val) = each($parseArray)) {
        if (is_array($val)) {
            $tagStringArray = getContentStrings($content, $key);
            for ($j = 0; $j < count($tagStringArray); $j++) {
               $ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j], $val, $encoding);
            }
        } else {
            $ar[$key] = doEncoding($val, $encoding);
        }
    }
    return parseC($ar, $content, $encoding, $separator);
}

function parseC($parseArray, $content, $encoding, $separator = "%") {
    while (list($key, $val) = @each($parseArray)) {
        if (substr($key, 0, 1) != "<" || substr($key, -1, 1) != ">") {
            $key = $separator.$key.$separator;
        }
        $content = str_replace($key, $val, $content);
    }
    return $content;
}

function parseT ($parseArray, $template, $outputFile = "",$encoding = "", $separator = "%") {
	global $template_name;

	$file = substr($template, 0, strlen($template)-5).".$template_name.temp";
    if (file_exists("$file")) {    // [om] 25sep2k
        $template = "$file";
    }
    if($fp = fopen("$template", "r")) {
        $content = fread($fp, filesize($template));
        fclose($fp);
        $content = parseC($parseArray, $content, $encoding, $separator);
        if ($outputFile != "") {
            if($fp1 = fopen("$outputFile", "w")) {
                if (!fwrite($fp1, $content)) {
                    echo("Konnte File ".$name." nicht beschreiben!<br> Tipp: &Uuml;berür&uuml;fen Sie die Schreibrechte des entsprechenden Verzeichnisses.");
                }
            } else {
                echo("Konnte File ".$name." nicht öffnen!<br>Tipp: &Uuml;berür&uuml;fen Sie die Schreibrechte des entsprechenden Verzeichnisses.");
            }
            fclose($fp1);
        }
        return "\n<!-- --- Template: $template ---- -->\n".$content;
    } else {
        echo("Konnte File ".$HTMLTemplate." nicht öffnen!");
        return false;
    }
}

function getTemplateStrings($template, $tag) {
    global $template_name;

    $file = substr($template, 0, strlen($template) - 5) . ".$template_name.temp";
    if (file_exists("$file")) {    // [om] 25sep2k
        $template = "$file";
    }
    if ($fp=fopen("$template","r")) {
        $content = fread($fp, filesize($template));
        fclose($fp);
        return getContentStrings($content, $tag);
    } else {
        echo "Couldn't open template $template";
        return false;
    }
}

function getContentStrings($content, $tag) {
    $startTag="<$tag>";
    $endTag="</$tag>";
    $pos=0;
    $i=0;
    $templateStrings = array();

    while (is_int(strpos($content, $startTag, $pos)) && is_int(strpos($content, $endTag, $pos))) {
        $startPos = strpos($content, $startTag, $pos);
        $endPos = strpos($content, $endTag, $pos);
        $pos = $endPos + 1;
        $templateStrings[$i] = substr($content, $startPos, ($endPos + strlen($endTag) - $startPos));
        $i++;
    }
    return $templateStrings;
}

function complexHelper($tagContent, $parseSet, $encoding) {
    $parseString = "";

    for ($i = 0; $i <= count($parseSet); $i++) {
        if (!isset($parseSet[$i])) {
            continue;
        }
	    $ar = array();
        $parseArray = $parseSet[$i];
        if (is_array($parseArray)) {
		    while (list($key, $val) = each($parseArray)) {
		        if (is_array($val)) {
		            $tagStringArray = getContentStrings($tagContent, $key);
		            for($j = 0; $j < count($tagStringArray); $j++) {
	 	            	$ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j], $val, $encoding);
	 	            }
		        } else {
				    $ar[$key] = doEncoding($val, $encoding);
		        }
		    }
	    } else {
            $ar[$tagContent] = $parseArray;
	    }
	    $parseString .= parseC($ar, $tagContent, $encoding);
    }
    return $parseString;
}

function complexParsing($parseArray, $template, $outputFile = "", $encoding = "", $separator = "%") {
    $ar = array();

    while (list($key, $val) = each($parseArray)) {
        if (is_array($val)) {
            $tagStringArray = getTemplateStrings($template, $key);
	        for($j = 0; $j < count($tagStringArray); $j++) {
	           $ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j], $val, $encoding);
	        }
        } else {
            $ar[$key]= doEncoding($val, $encoding);
        }
    }
    return parseT($ar, $template, $outputFile, $encoding, $separator);
}

function complexContent($parseArray, $content, $encoding = "", $separator = "%") {
    $ar = array();

    while (list($key, $val) = each($parseArray)) {
        if(is_array($val)) {
            $tagStringArray = getContentStrings($content, $key);
            for($j = 0; $j < count($tagStringArray); $j++) {
               $ar[$tagStringArray[$j]] = complexHelper($tagStringArray[$j], $val, $encoding);
            }
        } else {
            $ar[$key] = $val;
        }
    }
    return parseC($ar, $content, $encoding, $separator);
}

function doEncoding ($val, $encoding = "") {
    switch($encoding) {
        case "html":
            $val = htmlentities($val);
            $val = preg_replace('/&lt;/', "<", $val);
            $val = preg_replace('/&gt;/', ">", $val);
            $val = nl2br($val);
            break;
        case "html_strictly":
            $val = htmlentities($val);
            $val = nl2br($val);
            break;
        default:
    }
    return $val;
}

function get_ou ($domain) {
    // Determine TLD
    $tld = explode(".", $domain);
    $tld_last = count($tld);
    $tld = $tld[$tld_last-1];

    // Now strip it of the domainname
    return (str_replace( "X", "", substr("$domain", 0, -strlen($tld) - 1)));
}

function ldap_entry ($action, $username, $firstname, $lastname) {
    $err=error_reporting();
    error_reporting(0);

    global $ldap_base, $ldap_manager, $ldap_passwd, $ldap_host ;

    // Connect with the server or return error if failed
    $linkid = ldap_connect($ldap_host);
    if (!$linkid) {
        error_reporting($err);
        return "LDAP error : Can't connect to server " . $ldap_host ;
    }

    // Bind with directory or return error if failed
    $bind = ldap_bind($linkid, $ldap_manager.",".$ldap_base, $ldap_passwd);
    if (!$bind) {
        error_reporting($err);
        return "LDAP error : Can't bind with ".$ldap_manager.", ".$ldap_base." on server ".$ldap_host;
    }

    // Setup organizationalunit. OU consists of domainname minus Top Level Domain.
    // Then setup base distinguished name. Needed for search later
    // Then make the distinguished name. It consists of the e-mail addres and
    // base dn. I didn't want to combine the SN and GIVENNAME into the CN
    // as it's always possible to have two people sharing the same name.
    // But an e-mail address has to be unique in a domain so it's perfect
    // to use as CN.
    $ou = get_ou($_SESSION["domain"]);
    $base_dn = "ou=".$ou.", ".$ldap_base;
    $dn = "uid=".$username.", ".$base_dn;

    // Fill info with the entries to be added or modified into the directory
    if ( $username == "root" || $username == "postmaster" || $username == "mailer-daemon" ) {
        $info["cn"]=$username;
    } else {
        $info["cn"]=$firstname." ".$lastname;
    }
    $info["objectclass"][0] = "top";
    $info["objectclass"][1] = "person";
    $info["objectclass"][2] = "organizationalPerson";
    $info["objectclass"][3] = "mailrecipient";
    $info["ou"] = $ou;
    $info["sn"] = $lastname;
    $info["givenname"] = $firstname;
    $info["mail"] = $username."@".$_SESSION["domain"];
    $info["uid"] = $username;

    switch ($action) {
        case "add":
            $add=ldap_add($linkid, $dn, $info);
            if (!$add) {
                error_reporting($err);
                return "LDAP error : Can't add user entry";
            }
            break;
        case "mod":
            $result=ldap_modify($linkid, $dn, $info );
            if (!$result) {
                error_reporting($err);
                return "LDAP error : Can't change user entry";
            }
            break;
        case "del":
            $result=ldap_delete($linkid, $dn);
            if (!$result) {
                error_reporting($err);
                return "LDAP error : Can't delete user entry";
            }
            break;
        case "search":
            $filter = "uid=$username";
            $attr = array("sn", "givenname");
            $search = ldap_search($linkid, $base_dn, $filter, $attr);
            $entry = ldap_get_entries($linkid, $search);
            if ($entry["count"] <> 1) {
                error_reporting($err);
                return "LDAP error : Search action failed";
            }
            $firstname = $entry[0]["givenname"][0];
            $lastname = $entry[0]["sn"][0];
            error_reporting($err);
            return array($firstname, $lastname);
            break;
        default:
            error_reporting($err);
            return "LDAP error : no action given"; 
    }
    ldap_close($linkid);
}


// tcp_host_findout
// ----------------
// used to findout server ip based on domain name.

function tcp_host_findout($domain) {
	global $vmailmgrd_tcp_hosts_dir;

	// reduce to domain
	if (preg_match("/@/i", $domain)) {
		$tmp1 = explode("@", $domain);
		$domain = $tmp1[1];
	}

	// get listing of files
	if (is_dir($vmailmgrd_tcp_hosts_dir)) {
		$tmp_dir = opendir($vmailmgrd_tcp_hosts_dir);

		while (false !== ($file = readdir($tmp_dir))) {
			if ($file != "." && $file != ".." && $file != "CVS") {

				// parse each file and look for domain
				$fp = fopen("$vmailmgrd_tcp_hosts_dir/$file", "r");
				if ($fp) {
					while (!feof ($fp)) {
						$line = trim(fgets($fp, 1024));

						if (preg_match("/:/", $line)) {
							// in case we have virtualdomains-like files
							// (domainname.ext:username)
							$tmp_split_arr = split(":", $line);
							$line = $tmp_split_arr[0];
						}

						if ($line == $domain) {
							// we found the domain! return filename (=host)
							fclose($fp);
							closedir($tmp_dir);
							return $file;
						}
					}
					fclose($fp);
				}
            }
 		}
		closedir($tmp_dir);
		return ""; 		// domain not found

	} else {
		return "";		// $vmailmgrd_tcp_hosts_dir not a directory
	}
}

?>
