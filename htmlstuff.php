<?

/* 	-----
	Omail  -  A PHP4 based Vmailmgrd Web interface
	-----

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: htmlstuff.php,v 1.34 2000/09/24 14:28:03 swix Exp $
        $Source: /cvsroot/omail/admin2/htmlstuff.php,v $

	htmlstuff.php
	-------------
	some usefull html things...

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


function html_login() {

	global $script_url, $A, $lang, $version, $cookie_omail_last_login, $cookie_omail_last_domain, $domains_list;
	include("strings.php");

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
	$templdata["txt_dom_ident"]=$txt_dom_ident[$lang];
	$templdata["txt_domain_or_email"]=$txt_domain_or_email[$lang];
	$templdata["txt_password_str"]=$txt_password_str[$lang];
	$templdata["txt_login"]=$txt_login[$lang];
	$templdata["lang"]=$lang;

	$ii = 0;
        reset($txt_langname);
        while(list ($id,$tmplang) = each ($txt_langname) ) {
                if ($id != $lang) {
			$templdata[bla][$ii][url] = $script . "?setlang=$id&" . SID;
			$templdata[bla][$ii][txt] = $tmplang;
                } else {
			$templdata[bla][$ii][url] = $script . "?setlang=$id&" . SID;
			$templdata[bla][$ii][txt] = "<font color=\"red\">$tmplang</font>";
                }
		$ii++;
        }

	$templdata["domain_value"]= "";
	if (!count($domains_list) && $cookie_omail_last_domain && !$cookie_omail_last_login) { 
		$templdata["domain_value"]=htmlentities($cookie_omail_last_domain); 
	} elseif (!count($domains_list) && $cookie_omail_last_login && $cookie_omail_last_domain) { 
	        $templdata["domain_value"]= htmlentities($cookie_omail_last_login) . "@" . htmlentities($cookie_omail_last_domain); 
	} elseif (count($domains_list) && $cookie_omail_last_login) { 
		$templdata["domain_value"] = htmlentities($cookie_omail_last_login); 
	}

	$templdata["domain_select"]="";


        if (count($domains_list)) {
                $templdata["domain_select"] .= "@ <select name=\"login_domain\">";
                reset($domains_list);
                while(list ($id,$tmp) = each ($domains_list) ) {

                        if ($cookie_omail_last_domain == $tmp) {
                                $templdata["domain_select"] .= "<option selected>$tmp</option>";
                        } else {
                                $templdata["domain_select"] .= "<option>$tmp</option>";
                        }

                }
                $templdata["domain_select"] .= "</select>";
        }

        print parseTemplate($templdata, "templates/login.temp");

}


function html_head($title) {

	global $quota_on, $quota_data, $A, $domain, $cvs_version, $version, $lang, $setlang;
	include("strings.php");

	// needed for 'ru' (at least with no-russian browsers)	
	if ($txt_charset[$lang]) { 
		Header("Content-Type: text/html; charset=" . $txt_charset[$lang] . "\n");
	} elseif ($txt_charset[$setlang]) { 
		Header("Content-Type: text/html; charset=" . $txt_charset[$setlang] . "\n");
	}

	$templdata["version"]=$version;
	$templdata["cvs_version"]=$cvs_version;
	$templdata["lang"]=$lang;
	$templdata["title"]=$title;

	if ($A == "menu") {  
		print parseTemplate($templdata, "templates/html_header_menu.temp");
	} else if ($A != "login" || $A != "" || $A != "checkin") {
		print parseTemplate($templdata, "templates/html_header_standard.temp");
	} 
}


function html_titlebar($title,$msg,$popup) {
	
	global $quota_on, $quota_data, $script, $A, $lang, $version;
	include("strings.php");

	$array["version"] = $version;
	$array["title"] = $title;
	$array["msg"] = $msg;

	if ($popup) { 
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_close[$lang];
		$array[buttonlabels][0][onClick] = 'onClick="return gO(this,true,true)"';
		$array[buttonlabels][1][url] = $script . "?A=logout&" . SID;
		$array[buttonlabels][1][txt] = $txt_logout[$lang];
		$array[buttonlabels][1][onClick] = 'onClick="return gO(this,true,true)"';
	} elseif ($A == "menu") { 	
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_refresh_menu[$lang];
		$array[buttonlabels][0][onClick] = '';
		$array[buttonlabels][1][url] = $script . "?A=logout&" . SID;
		$array[buttonlabels][1][txt] = $txt_logout[$lang];
		$array[buttonlabels][1][onClick] = '';
		$array[buttonlabels][2][url] = $script . "?A=about&" . SID;
		$array[buttonlabels][2][txt] = $txt_about[$lang];
		$array[buttonlabels][2][onClick] = '';
	} elseif ($A == "login" || $A == "" || $A == "splash") {
		$array[buttonlabels][0][url] = $script . "?A=about&" . SID;
		$array[buttonlabels][0][txt] = $txt_about[$lang];
		$array[buttonlabels][0][onClick] = '';
	} elseif ($A == "about") { 
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_back[$lang];
		$array[buttonlabels][0][onClick] = '';
	} else {
		$array[buttonlabels][0]='';
	}

	print parseTemplate($array, "templates/titlebar.temp");
}



function html_end() {

	$templdata[""]="";
	print parseTemplate($templdata, "templates/html_end.temp");

}


function html_userform($userinfo, $action) {

	global $quota_on, $quota_data, $session, $script, $lang, $domain, $type;
	include("strings.php");
	$fwd = 0;

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["userinfo0"]=$userinfo[0];
        $templdata["domain"]=$domain;
        $templdata["txt_details"]=$txt_details[$lang];
        $templdata["userinfo4"]=$userinfo[4];
        $templdata["txt_date_of_creation"]=$txt_date_of_creation[$lang];

	if ($action == "edit") {
		// find how many forwarders there are
		$aliases = $userinfo[3];
		$nb_fwd = count($aliases);
	}

	if ($action == "edit") {
		$templdata["usernamefield"] = $userinfo[0] . "<input type=\"hidden\" name=\"U\" value=\"" . $userinfo[0] . "\">";
	} else {
		$templdata["usernamefield"] = "<input type=\"text\" name=\"U\" value=\"" . $userinfo[0]. "\" size=\"15\">";
	}

	if ($type == "user") {
	  $templdata["userdetailfield"] = $userinfo[4];
	} else {
	  $templdata["userdetailfield"] = "<input type=\"text\" name=\"userdetail\" value=\"" . $userinfo[4]. "\" size=\"23\">";
	}

        $templdata["userinfo2"]=$userinfo[2]; if (!($templdata["userinfo2"])) { $templdata["userinfo2"]= "-"; }
        $templdata["userinfo0"]=$userinfo[0];

        $templdata["txt_directory"]=$txt_directory[$lang];
        $templdata["txt_passwd"]=$txt_passwd[$lang];

	if ($action == "newalias") { $templdata["txt_facultatif"]= " (" . $txt_facultatif[$lang] . ") "; }
	else {  $templdata["txt_facultatif"] = " "; }

	for ($i = 0; $i < ($nb_fwd + 5); $i++) {
	
		$templdata[alias1][$i][txt_fwd] = $txt_fwd[$lang] . " " . ($i + 1);	
		$templdata[alias1][$i][aliases] = $aliases[$i];	

		if ($i/2 == floor($i/2)) { $templdata[alias1][$i][fwdcolor] = "#DDDDDD"; }
				else { $templdata[alias1][$i][fwdcolor] = "#CCCCCC"; }
	}	

        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];
        $templdata["action"]=$action;

	if ($i/2 == floor($i/2)) { $templdata["sub_color"]="#DDDDDD"; }
		else { $templdata["sub_color"]="#CCCCCC"; }

	print parseTemplate($templdata, "templates/userform.temp");
}



function html_quotaform($userinfo, $action) {

	global $quota_on, $quota_data, $session, $script, $lang, $domain, $type;
	include("strings.php");

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled)= $userinfo;

	// template = quotaform.temp - 23sep2k [om]

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["userinfo0"]=$userinfo[0];
        $templdata["domain"]=$domain;
        $templdata["txt_details"]=$txt_details[$lang];
        $templdata["userinfo4"]=$userinfo[4];
        $templdata["txt_date_of_creation"]=$txt_date_of_creation[$lang];
        $templdata["CreationTime"]=date("d.m.Y H\hi",$CreationTime);
        $templdata["txt_status"]=$txt_status[$lang];

	if ($Enabled == 1) { $templdata["checked_yes"] = "SELECTED"; $templdata["checked_no"] = ""; }
		else { $templdata["checked_no"] = "SELECTED"; $templdata["checked_yes"] = ""; }

        $templdata["txt_activated"]=$txt_activated[$lang];
        $templdata["txt_inactived"]=$txt_inactived[$lang];
        $templdata["txt_hardquota"]=$txt_hardquota[$lang];
        $templdata["HardQuota"]=$HardQuota;
        $templdata["txt_softquota"]=$txt_softquota[$lang];
        $templdata["SoftQuota"]=$SoftQuota;
        $templdata["txt_msgcount"]=$txt_msgcount[$lang];
        $templdata["CountLimit"]=$CountLimit;
        $templdata["txt_msgsize"]=$txt_msgsize[$lang];
        $templdata["SizeLimit"]=$SizeLimit;
        $templdata["txt_expiry"]=$txt_expiry[$lang];
        $templdata["ExpiryTimeString"]="";

	if ($ExpiryTime && $ExpiryTime != "-") { $templdata["ExpiryTimeString"] = date("d.m.Y H\hi",$ExpiryTime) . "<br>"; }

        $templdata["ExpiryTime"]=$ExpiryTime;
        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["username"]=$username;
        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];

        print parseTemplate($templdata, "templates/quotaform.temp");

}



function html_respform($userinfo, $respinfo, $status) {

	global $session, $script, $lang, $domain;
	include("strings.php");

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["userinfo0"]=$userinfo[0];
        $templdata["domain"]=$domain;

	if ($status == 1) { $templdata["checked_yes"] = "SELECTED"; $templdata["checked_no"] = ""; }
		else { $templdata["checked_no"] = "SELECTED"; $templdata["checked_yes"] = ""; }

        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];

        $templdata["txt_responder"]=$txt_responder[$lang];
        $templdata["txt_activated"]=$txt_activated[$lang];
        $templdata["txt_inactived"]=$txt_inactived[$lang];
        $templdata["txt_autoanswertext"]=$txt_autoanswertext[$lang];
        $templdata["txt_from"]=$txt_from[$lang];
        $templdata["txt_subject"]=$txt_subject[$lang];
        $templdata["txt_text"]=$txt_text[$lang];

        $templdata["respinfofrom"]=$respinfo["from"];
        $templdata["respinfosubject"]=$respinfo["subject"];
        $templdata["respinfobody"]=$respinfo["body"];

        print parseTemplate($templdata, "templates/respform.temp");

}




function html_delete_confirm($userinfo) {

	global $session, $script, $lang, $domain;
	include("strings.php");

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["userinfo0"]=$userinfo[0];
        $templdata["domain"]=$domain;

        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];
        $templdata["txt_action"]=$txt_action[$lang];
        $templdata["txt_delete"]=$txt_delete[$lang];

        print parseTemplate($templdata, "templates/delete_confirm.temp");
}


function html_error($title, $msg) {

        global $script, $lang, $domain;
        include("strings.php");

}


function html_display_mailboxes($mboxlist, $arg_action) {

	// action :  	1 = mailbox
	//		2 = alias
	//		0 = user   (no new user line, no delete)

	// if autoresp_support = 0 -> don't show autorespond button... and check if colspan are ok...



	global $quota_on, $quota_data, $session, $script, $lang, $domain;
	include("strings.php");

	switch ($arg_action) {
		case 1:
			print "<h1>" . $txt_mailboxes_title[$lang] . "</h1>";
			break;
		case 2:
			print "<h1>" . $txt_aliases_title[$lang] . "</h1>";
			break;
		case 0:
			print "<h1>" . $txt_user_title[$lang] . "</h1>";
			$tmp_user = $mboxlist[0];
			if ($tmp_user[2]) { $mtype = "mbox"; } else { $mtype = "alias"; }
			break;
	}

	print "<table border=0><TR><TH>N°</TH>";
	print "<TH>" . $txt_email[$lang] . "</TH>" .
		"<TH>" . $txt_info[$lang] . "</TH>" .
		"<TH>" . $txt_fwd[$lang] . "1</TH>" .
		"<TH>" . $txt_fwd[$lang] . "2</TH>" .
		"<TH>" . $txt_fwd[$lang] . "3</TH>" .
		"<TH>" . $txt_more_fwd[$lang] . "?</TH>";

	if ($arg_action != 2 && !(!$arg_action && $mtype == "alias")  && !($quota_on && !$quota_data["autoresp_support"])) {
		print "<TH>" . $txt_responder[$lang] . "?</TH>";
	}

	print "<TH>" . $txt_action[$lang] . "</TH></TR>";
			
	$yes = "<font color=\"green\">" . $txt_yes[$lang] . "</font>";
	$no = "<font color=\"red\">" . $txt_no[$lang] . "</font>";


	$activated = "<font color=\"green\">" . $txt_activated[$lang] . "</font>";
	$inactived = "<font color=\"red\">" . $txt_inactived[$lang] . "</font>";


	$total_size = 0;

	for ($i = 0; $i <  sizeof($mboxlist); $i++) {

		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled)=$mboxlist[$i];

		if ($i/2 == floor($i/2)) { 
			print "<tr bgcolor=\"#DDDDDD\">"; 
		} else { 
			print "<tr bgcolor=\"#CCCCCC\">"; 
		}			

		print "<TD>" . ($i+1)  . "&nbsp;</TD>"; // num

		if ($Enabled) {
			print "<TD><B><FONT COLOR=\"green\">" . $username  . "</FONT></B>&nbsp;</TD>"; // namae
		} else {
			print "<TD><B><FONT COLOR=\"red\">" . $username  . "</FONT></B>&nbsp;</TD>"; // namae
		}

		print "<TD><nobr>" . $PersonalInfo  . "</nobr>&nbsp;</TD>"; // namae
		print "<TD>" . $alias[0]  . "&nbsp;</TD>"; // fwd1
		print "<TD>" . $alias[1] . "&nbsp;</TD>"; // fwd2
		print "<TD>" . $alias[2] . "&nbsp;</TD>"; // fwd3

		print "<TD>";
		if ($alias[3]) { print $yes; } else { print $no; } 
		print "&nbsp;</TD>"; // alias?

		if ($arg_action != 2 && !(!$arg_action && $mtype == "alias") && !($quota_on && !$quota_data["autoresp_support"])) {
			print "<TD>";
			if ($resp) { print $activated; } else { print $inactived; } 
			print "&nbsp;</TD>"; // responder?
		}

		// convert the username to an html escaped string (because of user "+") 

		$username = urlencode($username);

		// actions
	
		print "<TD align=\"center\">";
		
		print "&nbsp;&nbsp;<A HREF=\"$script?A=edit&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  . 
			$txt_edit[$lang]  . "</a>&nbsp;"; // action

		if ($arg_action != 2 && !(!$arg_action && $mtype == "alias") && !($quota_on && !$quota_data["autoresp_support"])) {
			print "&nbsp;&nbsp;<A HREF=\"$script?A=resp&U=" . $username . "&" . SID . "\" onClick=\"oW2(this,'pop')\">"  . 
				$txt_responder[$lang] . "</a>&nbsp;"; // action
		}	

		if ((($arg_action == 2 && $config_use_settings_with_quota) || $arg_action == 1) && !($quota_on && !$quota_data["user_quota_support"])) {
			print "&nbsp;&nbsp;<A HREF=\"$script?A=quota&U=" . $username . "&" . SID . "\" onClick=\"oW2(this,'pop')\">"  . 
				$txt_settings[$lang] . "</a>&nbsp;"; // action
		}	

		if ($arg_action) {
			print "&nbsp;&nbsp;<A HREF=\"$script?A=delete&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  . 
				$txt_delete[$lang]  . "</a>&nbsp;"; // action
		}
		print "</TD></TR>";

	}
			

	switch ($arg_action) {
		case 1:
			$tmp_label = $txt_newuser[$lang];
			$tmp_action = "newuser";
			break;
		case 2:
			$tmp_label = $txt_newalias[$lang];
			$tmp_action = "newalias";
			break;
	}


	if ($arg_action != 0) {

		// prepare quota string
	
		$quota_string = "";

		if ($quota_on) {

			if ($arg_action == 1) {			
				if ($quota_data["max_users"] && $quota_data["max_users"] != 99999999) {
					$percent = round((100*$quota_data["nb_users"])/$quota_data["max_users"]);
					if ($percent == 100) { 	
						$percent = '<font color="red">' . $percent . '%</font>';
					} else {
						$percent = '<font color="green">' . $percent . '%</font>';
					}
					$quota_string = $txt_quota[$lang] . ": " . $txt_maximum[$lang] . " = " . $quota_data["max_users"] . " " . $txt_smallmailboxes[$lang] . " &nbsp; &nbsp; ($percent " . $txt_used[$lang] . ")" ;
				}
			}
			if ($arg_action == 2) {			
				if ($quota_data["max_alias"] && $quota_data["max_alias"] != 99999999) {
					$percent = round((100*$quota_data["nb_alias"])/$quota_data["max_alias"]);
					if ($percent == 100) { 	
						$percent = '<font color="red">' . $percent . '%</font>';
					} else {
						$percent = '<font color="green">' . $percent . '%</font>';
					}
					$quota_string = $txt_quota[$lang] . ": " . $txt_maximum[$lang] . " = " . $quota_data["max_alias"] . " " . $txt_smallaliases[$lang] . " &nbsp; &nbsp; ($percent " . $txt_used[$lang] . ")" ;
				
				}
			}

		} // if quota_on
	
		if ($arg_action != 2 && !($quota_on && !$quota_data["autoresp_support"])) {
			print "<tr><th COLSPAN=8 ALIGN=left><font size=-1>&nbsp;$quota_string &nbsp;</font></th>";
			print "<TH ALIGN=center>";
		} else { 
			print "<tr><th COLSPAN=7 ALIGN=left><font size=-1>&nbsp;$quota_string &nbsp;</font></th>";
			print "<TH ALIGN=center>";
		}
	
		print "<A HREF=\"$script?A=$tmp_action&" . SID . "\" onClick=\"oW(this,'pop')\">"  . $tmp_label  . "</a>&nbsp;</TH></TR>";
	}

	print "</table><br>"; 

}



function html_about() {

	global $A, $domain, $cvs_version, $version, $lang, $HTTP_HOST, $REQUEST_URI, $REMOTE_ADDR, $HTTP_ACCEPT_LANGUAGE;
	include("strings.php");

	$templdata["version"]=$version;
	$templdata["cvs_version"]=$cvs_version;

	reset($txt_langname);
	while(list ($id,$tmplang) = each ($txt_langname) ) {
		$templdata["languages"] .= ($tmplang) . " ";
	}

	$templdata["HTTP_HOST"]=$HTTP_HOST;
	$templdata["REQUEST_URI"]=$REQUEST_URI;
	$templdata["REMOTE_ADDR"]=$REMOTE_ADDR;
	$templdata["HTTP_ACCEPT_LANGUAGE"]=$HTTP_ACCEPT_LANGUAGE;
	$templdata["domain"]=$domain;

	print parseTemplate($templdata, "templates/about.temp");
}



function html_splash() {

	global $A, $domain, $cvs_version, $version, $lang, $sysadmin_mail, $splash_screen, $splash_ok, $HTTP_HOST, $REQUEST_URI, $REMOTE_ADDR, $HTTP_ACCEPT_LANGUAGE;
	include("strings.php");

	if ($splash_screen) { 
		$templdata["splash"] = '<font color="red">nok</font>'; 
	} else { 
		$templdata["splash"] = '<font color="green">ok</font>'; 
	}
	if ($sysadmin_mail == "sysadmin@notdefined.yet") { 
		$templdata["smail"] = '<font color="red">nok</font>'; } else { $templdata["smail"] = '<font color="green">ok</font>'; 
	}
	$templdata["version"]=$version;
	$templdata["cvs_version"]=$cvs_version;

	reset($txt_langname);
	while(list ($id,$tmplang) = each ($txt_langname) ) {
		$templdata["languages"] .= ($tmplang) . " ";
	}

	$templdata["HTTP_HOST"]=$HTTP_HOST;
	$templdata["REQUEST_URI"]=$REQUEST_URI;
	$templdata["REMOTE_ADDR"]=$REMOTE_ADDR;
	$templdata["HTTP_ACCEPT_LANGUAGE"]=$HTTP_ACCEPT_LANGUAGE . " [ $lang ]";
	$templdata["domain"]=$domain;

	if ($splash_ok) {
		print parseTemplate($templdata, "templates/welcome_screen_thanks.temp");
	} else {
		print parseTemplate($templdata, "templates/welcome_screen.temp");
	}
}


?>
