<?

/* 	-----------
	oMail-admin  -  A PHP4 based Vmailmgrd Web interface
	-----------

	* Copyright (C) 2000  Olivier Mueller <om@omnis.ch>

        $Id: htmlstuff.php,v 1.64 2001/03/06 17:30:45 swix Exp $
        $Source: /cvsroot/omail/admin2/htmlstuff.php,v $

	htmlstuff.php
	-------------
	some usefull html things...

	16.jan.2k   om   First version
        01.aug.2k   om   Rewrite for PHP4
	25.sep.2k   om   Full templates support
	
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
	global $use_vmailmgrd_tcp, $vmailmgrd_tcp_host_method, $vmailmgrd_tcp_hosts_list;
	global $cookie_omail_last_server;
	include("strings.php");

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
	$templdata["txt_dom_ident"]=$txt_dom_ident[$lang];
	$templdata["txt_domain_or_email"]=$txt_domain_or_email[$lang];
	$templdata["txt_password_str"]=$txt_password_str[$lang];
	$templdata["txt_mailhost_str"]=$txt_mailhost_str[$lang];
	$templdata["txt_login"]=$txt_login[$lang];
	$templdata["lang"]=$lang;

	$ii = 0;
        reset($txt_langname);
        while(list ($id,$tmplang) = each ($txt_langname) ) {
                if ($id != $lang) {
			$templdata[bla][$ii][id] = $id;
			$templdata[bla][$ii][url] = $script . "?setlang=$id&" . SID;
			$templdata[bla][$ii][txt] = $tmplang;
			$templdata[bla][$ii][sel] = "";
                } else {
			$templdata[bla][$ii][id] = $id;
			$templdata[bla][$ii][url] = $script . "?setlang=$id&" . SID;
			$templdata[bla][$ii][txt] = "<font color=\"red\">$tmplang</font>";
			$templdata[bla][$ii][sel] = "SELECTEd";
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

	if ($use_vmailmgrd_tcp && $vmailmgrd_tcp_host_method == 1) {

		// prepare hosts list
		
		$templdata["tcphost_select_list"] = "";	
		reset($vmailmgrd_tcp_hosts_list);
		while(list ($id,$tmp) = each ($vmailmgrd_tcp_hosts_list)) {

			if ($cookie_omail_last_server == $id) {
				$templdata["tcphost_select_list"] .= "<option selected>$id</option>";
			} else {
				$templdata["tcphost_select_list"] .= "<option>$id</option>";
			}
		}

	        print parseTemplate($templdata, "templates/login_with_host.temp");
	} else {
	        print parseTemplate($templdata, "templates/login.temp");
	}
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

	print parseTemplate($templdata, "templates/html_header_standard.temp");
}


function html_titlebar($title,$msg,$popup) {
	
	global $quota_on, $quota_data, $script, $A, $lang, $version, $hide_about_button, $program_name;
	include("strings.php");

	$array["program_name"] = $program_name;
	$array["version"] = $version;
	$array["title"] = $title;
	$array["msg"] = $msg;

	if ($popup) { 
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_close[$lang];
		$array[buttonlabels][0][onClick] = 'onClick="return gO(this,true,true)"';
		$array[buttonlabels][1][url] = $script . "?A=logout&" . SID;
		$array[buttonlabels][1][txt] = $txt_logout[$lang];
		$array[buttonlabels][1][onClick] = 'onClick="return gO(this,true)"';
		$array[buttonlabels][2][url] = $script . "?A=help&" . SID;
		$array[buttonlabels][2][txt] = $txt_help[$lang];
		$array[buttonlabels][2][onClick] = "onClick=\"oW(this,'pop2')\"";
	} elseif ($A == "menu") { 	
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_refresh_menu[$lang];
		$array[buttonlabels][0][onClick] = '';
		$array[buttonlabels][1][url] = $script . "?A=logout&" . SID;
		$array[buttonlabels][1][txt] = $txt_logout[$lang];
		$array[buttonlabels][1][onClick] = '';
		$array[buttonlabels][2][url] = $script . "?A=help&" . SID;
		$array[buttonlabels][2][txt] = $txt_help[$lang];
		$array[buttonlabels][2][onClick] = "onClick=\"oW(this,'pop2')\"";
		if (!$hide_about_button) {
			$array[buttonlabels][3][url] = $script . "?A=about&" . SID;
			$array[buttonlabels][3][txt] = $txt_about[$lang];
			$array[buttonlabels][3][onClick] = "onClick=\"oW3(this,'pop2')\"";
		}
	} elseif (($A == "login" || $A == "" || $A == "splash") && !$hide_about_button) {
		$array[buttonlabels][0][url] = $script . "?A=about&" . SID;
		$array[buttonlabels][0][txt] = $txt_about[$lang];
		$array[buttonlabels][0][onClick] = "onClick=\"oW3(this,'pop2')\"";
		$array[buttonlabels][1][url] = $script . "?A=help&" . SID;
		$array[buttonlabels][1][txt] = $txt_help[$lang];
		$array[buttonlabels][1][onClick] = "onClick=\"oW(this,'pop2')\"";
	} elseif ($A == "about" || $A == "help") { 
		$array[buttonlabels][0][url] = $script . "?" . SID;
		$array[buttonlabels][0][txt] = $txt_close[$lang];
		$array[buttonlabels][0][onClick] = 'onClick="return gO(this,true,true)"';
	} else {
		$array[buttonlabels][0]='';
	}

	print parseTemplate($array, "templates/titlebar.temp");
}



function html_end() {

	$templdata[""]="";
	print parseTemplate($templdata, "templates/html_end.temp");

}


function html_userform($userinfo, $action, $mboxlist) {

	global $use_ldap, $quota_on, $quota_data, $session, $script, $lang, $domain, $type;
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
	$templdata["txt_firstname"]=$txt_firstname[$lang];
	$templdata["txt_lastname"]=$txt_lastname[$lang];

	if ($action == "edit") {
		// find how many forwarders there are
		$aliases = $userinfo[3];
		$nb_fwd = count($aliases);
		if ($use_ldap) {
		    $ldap=ldap_entry("search",$userinfo[0],"","");
		    $ldap_entry["firstname"]=$ldap[0];
		    $ldap_entry["lastname"]=$ldap[1];
		}
	}

	if ($action == "edit") {
		$templdata["usernamefield"] = $userinfo[0] . "<input type=\"hidden\" name=\"U\" value=\"" . $userinfo[0] . "\">";
	} else {
		$templdata["usernamefield"] = "<input type=\"text\" name=\"U\" value=\"" . $userinfo[0]. "\" size=\"15\">";
	}

	if ($type == "user") {
	    $templdata["userdetailfield"] = $userinfo[4];
	    if ($use_ldap) {
		$templdata["firstname"] = $ldap_entry["firstname"];
		$templdata["lastname"] = $ldap_entry["lastname"];
	    }
	} else {
	    $templdata["userdetailfield"] = "<input type=\"text\" name=\"userdetail\" value=\"" . $userinfo[4]. "\" size=\"23\">";
	    if ($use_ldap) {
		$templdata["firstname"] = "<input type=\"text\" name=\"firstname\" value=\"" . $ldap_entry["firstname"] . "\" size= \"23\">";
		$templdata["lastname"] = "<input type=\"text\" name=\"lastname\" value=\"" . $ldap_entry["lastname"] . "\" size= \"23\">";
	    }
	}

        $templdata["userinfo2"]=$userinfo[2]; if (!($templdata["userinfo2"])) { $templdata["userinfo2"]= "-"; }
        $templdata["userinfo0"]=$userinfo[0];

        $templdata["txt_directory"]=$txt_directory[$lang];
        $templdata["txt_passwd"]=$txt_passwd[$lang];

	if ($action == "newalias") { $templdata["txt_facultatif"]= " (" . $txt_facultatif[$lang] . ") "; }
	else {  $templdata["txt_facultatif"] = " "; }

	for ($i = 0; $i < ($nb_fwd + 5); $i++) {
	
		if ($type == "user") {
			$templdata[alias1][$i][txt_fwd] = $txt_fwd[$lang] . " " . ($i + 1);   // no select list...	
		} else {
			$templdata[alias1][$i][txt_fwd] = $txt_fwd[$lang] . " " . ($i + 2);	
		}

		$templdata[alias1][$i][aliases] = $aliases[$i];	

		if ($i/2 == floor($i/2)) { $templdata[alias1][$i][fwdcolor] = "#DDDDDD"; }
				else { $templdata[alias1][$i][fwdcolor] = "#CCCCCC"; }
	}	

        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];
        $templdata["action"]=$action;

	if ($i/2 == floor($i/2)) { $templdata["sub_color"]="#DDDDDD"; }
		else { $templdata["sub_color"]="#CCCCCC"; }

	$templdata["txt_fwd1"] =  $txt_fwd[$lang];
	$templdata["select_account_contents"] = '<option value=""> - </option>';

	for ($i=0; $i<sizeof($mboxlist);$i++) {
                $tmp_account = $mboxlist[$i];
		if ($tmp_account[0] != "+") {
	                $templdata["select_account_contents"] .= '<option>' . $tmp_account[0] . '</option>';
		}
	}

	if ($use_ldap) {
	    if ($type == "user") {
		    print parseTemplate($templdata, "templates/userform_userlogin_ldap.temp");
	    } else {
		    print parseTemplate($templdata, "templates/userform_ldap.temp");
	    }
	} else {
	    if ($type == "user") {
		    print parseTemplate($templdata, "templates/userform_userlogin.temp");
	    } else {
		    print parseTemplate($templdata, "templates/userform.temp");
	    }
	}
}



function html_quotaform($userinfo, $action) {

	global $quota_on, $quota_data, $session, $script, $lang, $domain, $type;
	include("strings.php");

	list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)= $userinfo;

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
	if ( $HardQuota == '-' ) { $templdata["HardQuota"]=$HardQuota; }
		else { $templdata["HardQuota"]=$HardQuota/1024; }
        $templdata["txt_softquota"]=$txt_softquota[$lang];
	if ( $SoftQuota == '-' ) { $templdata["SoftQuota"]=$SoftQuota; }
		else { $templdata["SoftQuota"]=$SoftQuota/1024; }
        $templdata["txt_msgcount"]=$txt_msgcount[$lang];
        $templdata["CountLimit"]=$CountLimit;
        $templdata["txt_msgsize"]=$txt_msgsize[$lang];
	if ($SizeLimit == '-') { $templdata["SizeLimit"]=$SizeLimit; }
		else { $templdata["SizeLimit"]=$SizeLimit/1024; }
        $templdata["txt_expiry"]=$txt_expiry[$lang];
        $templdata["ExpiryTimeString"]="";

	$templdata["yearx"]="";
	for ($i=0;$i<=9;$i++) { $templdata["year200$i"]=""; }
	for ($i=0;$i<=9;$i++) { $templdata["month0$i"]=""; }
	for ($i=10;$i<=12;$i++) { $templdata["month$i"]=""; }
	for ($i=0;$i<=9;$i++) { $templdata["day0$i"]=""; }
	for ($i=10;$i<=31;$i++) { $templdata["day$i"]=""; }

	if ($ExpiryTime && $ExpiryTime != "-") { 
		$templdata["ExpiryTimeString"] = date("d.m.Y",$ExpiryTime) . "<br>"; 
		$Ey=date("Y",$ExpiryTime); $templdata["year$Ey"]=" SELECTED";
 		$Em=date("m",$ExpiryTime); $templdata["month$Em"]=" SELECTED";
		$Ed=date("d",$ExpiryTime); $templdata["day$Ed"]=" SELECTED";
	}

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



function html_catchall_confirm($userinfo, $msg) {

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
        $templdata["txt_catchall"]=$txt_catchall[$lang];
        $templdata["txt_setup_catchall"]=$txt_setup_catchall[$lang];

        $templdata["msg"]=$msg;

        print parseTemplate($templdata, "templates/catchall_confirm.temp");
}


function html_catchall_create($msg, $mboxlist) {

	global $session, $script, $lang, $domain;
	include("strings.php");

        for ($i=0; $i<sizeof($mboxlist);$i++) {
                $tmp_account = $mboxlist[$i];
		if ($tmp_account[0] != "+") {
	                $templdata["select_account_contents"] .= '<option>' . $tmp_account[0] . '</option>';
		}
        }

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["userinfo0"]=$userinfo[0];
        $templdata["domain"]=$domain;

        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];
        $templdata["txt_action"]=$txt_action[$lang];
        $templdata["txt_catchall"]=$txt_catchall[$lang];
        $templdata["txt_setup_catchall"]=$txt_setup_catchall[$lang];
        $templdata["txt_remove_catchall"]=$txt_remove_catchall[$lang];

        $templdata["msg"]=$msg;

        print parseTemplate($templdata, "templates/catchall_create.temp");
}


function html_catchall_remove_confirm($msg) {

	global $session, $script, $lang, $domain;
	include("strings.php");

        $templdata["script"]=$script;
        $templdata["SID"]=SID;
        $templdata["txt_username"]=$txt_username[$lang];
        $templdata["domain"]=$domain;

        $templdata["txt_domain"]=$txt_domain[$lang];
        $templdata["txt_submit"]=$txt_submit[$lang];
        $templdata["txt_cancel"]=$txt_cancel[$lang];
        $templdata["txt_action"]=$txt_action[$lang];
        $templdata["txt_remove_catchall"]=$txt_remove_catchall[$lang];

        $templdata["msg"]=$msg;

        print parseTemplate($templdata, "templates/catchall_remove_confirm.temp");
}


function html_error($title, $msg) {

        global $script, $lang, $domain;
        include("strings.php");

}


function html_display_mailboxes($mboxlist, $arg_action, $arg_start=-1, $arg_howmany=-1) {

	// action :  	1 = mailbox
	//		2 = alias
	//		0 = user   (no new user line, no delete)

	// if autoresp_support = 0 -> don't show autorespond button... and check if colspan are ok...



	global $quota_on, $quota_data, $session, $script, $lang, $domain, $catchall_active, $system_accounts_list, $readonly_accounts_list, $show_how_many_accounts, $mb_start, $al_start;
	global $mb_letter, $al_letter;
	include("strings.php");

	switch ($arg_action) {
		case 1:
			$listtype = "mailboxes";
			$templdata["title"]=$txt_mailboxes_title[$lang];
			break;
		case 2:
			$listtype = "aliases";
			$templdata["title"]=$txt_aliases_title[$lang];
			break;

		case 0:
			$tmp_user = $mboxlist[0];
			$listtype = "account";
			$templdata["title"]=$txt_user_title[$lang];
			if ($tmp_user[2]) { $mtype = "mbox"; } else { $mtype = "alias"; }
			break;
	}


	$templdata["txt_email"] = $txt_email[$lang];
	$templdata["txt_info"] = $txt_info[$lang];
	$templdata["txt_fwd"] = $txt_fwd[$lang];
	$templdata["txt_responder"] = $txt_responder[$lang];
	$templdata["txt_more_fwd"] = $txt_more_fwd[$lang];
	$templdata["txt_action"] = $txt_action[$lang];
	$templdata["txt_any"] = $txt_any[$lang];

	if ( $mb_letter ) {
	    $templdata["mb_letter"] = $mb_letter;
	} else {
	    $templdata["mb_letter"] = $txt_any[$lang];
	}

	if ( $al_letter ) {
	    $templdata["al_letter"] = $al_letter;
	} else {
	    $templdata["al_letter"] = $txt_any[$lang];
	}

	$templdata["url_email"] = $script . "?A=menu&form_sort=username&" . SID;
	$templdata["url_info"] = $script . "?A=menu&form_sort=info&" . SID;
	$templdata["url_show_mb_letter"] = $script . "?A=menu&" . SID . "&new_mb_start=1&show_mb_letter=";
	$templdata["url_show_al_letter"] = $script . "?A=menu&" . SID . "&new_al_start=1&show_al_letter=";

	if ($arg_action != 2 && !(!$arg_action && $mtype == "alias")  && !($quota_on && !$quota_data["autoresp_support"])) {
		$templdata["ifdef_txt_responder"] = "<TH>" . $txt_responder[$lang] . "?</TH>"; 
	} else {
		$templdata["ifdef_txt_responder"] = "";
	}

	$yes = "<font color=\"green\">" . $txt_yes[$lang] . "</font>";
	$no = "<font color=\"red\">" . $txt_no[$lang] . "</font>";

	$activated = "<font color=\"green\">" . $txt_activated[$lang] . "</font>";
	$inactived = "<font color=\"red\">" . $txt_inactived[$lang] . "</font>";

	$total_size = 0;
	$hidden = 0;

	// loop init : if we have start and end data, use them :)
	// defaults:
	$loop_start = 0;
	$loop_end = sizeof($mboxlist);
	$offset = 0;
    
	// otherwise
	if ($arg_start != -1) { 
	    if ($arg_start <= 0) { $arg_start = 1; }
            $loop_start = ($arg_start-1); 
        }

	if ($arg_howmany != -1) { 
	    $loop_end = $loop_start + $arg_howmany ; 
	    if ($loop_end > sizeof($mboxlist)) {
		$loop_end = sizeof($mboxlist);
	    }
	    $offset = $arg_start-1;
	}
	

	if ($show_how_many_accounts) {

		// define <<<  <-   ->  and >>> links

		if ($mb_start == 0) { $mb_start = 1; }
		if ($al_start == 0) { $al_start = 1; }

		if ($arg_action == 1) {
			$cur_start = $mb_start;
			$cur_letter = "mb";
		} else {
			$cur_start = $al_start;
			$cur_letter = "al";
		}

		$cur_next = $cur_start+$show_how_many_accounts;
		$cur_prev = $cur_start-$show_how_many_accounts;
		$cur_last = sizeof($mboxlist)-$show_how_many_accounts+1;

		if ($cur_next > $cur_last) { $cur_next = $cur_last; }
		if ($cur_prev <= 0) { $cur_prev = 1; }

                $templdata["txt_first"] = $txt_first[$lang];
                $templdata["txt_prev"] = $txt_prev[$lang];
                $templdata["txt_next"] = $txt_next[$lang];
                $templdata["txt_last"] = $txt_last[$lang];
  
                $templdata["txt_first_off"] = $txt_first_off[$lang];
                $templdata["txt_prev_off"] = $txt_prev_off[$lang];
                $templdata["txt_next_off"] = $txt_next_off[$lang];
                $templdata["txt_last_off"] = $txt_last_off[$lang];
  
                $templdata["url_first"] = $script . "?A=menu&new_" . $cur_letter . "_start=1&" . SID; 
                $templdata["url_prev"] = $script . "?A=menu&new_" . $cur_letter . "_start=$cur_prev&" . SID;
                $templdata["url_next"] = $script . "?A=menu&new_" . $cur_letter . "_start=$cur_next&" . SID;
                $templdata["url_last"] = $script . "?A=menu&new_" . $cur_letter . "_start=$cur_last&" . SID;

		// hide buttons if necessary

		$all_hidden = 0;

		if ($cur_start == 0 || $cur_start == 1) { 
			$templdata["txt_first"] = ""; 
			$templdata["txt_prev"] = "";
			$all_hidden++;
		} else {
			$templdata["txt_first_off"] = ""; 
			$templdata["txt_prev_off"] = "";
		}

		if ($cur_start >= $cur_last) { 
			$templdata["txt_next"] = ""; 
			$templdata["txt_last"] = "";
			$all_hidden++;
		} else {
			$templdata["txt_next_off"] = ""; 
			$templdata["txt_last_off"] = "";
		}

	}	

    
	// print "Start: $loop_start - End: $loop_end - Offset: $offset <br>\n";   //debug
        
	for ($i = $loop_start; $i <= $loop_end; $i++) {

		list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)=$mboxlist[$i];

		// print "$i $username<br>";  //debug

		while ($username && (!$Visible || in_array($username, $system_accounts_list))) {
    		    $hidden++; 
		    $i++; 
		    list($username, $password, $mbox, $alias, $PersonalInfo, $HardQuota, $SoftQuota, $SizeLimit, $CountLimit, $CreationTime, $ExpiryTime, $resp, $Enabled, $Visible)=$mboxlist[$i];

		//	print "   $i $username<br>"; //debug

		}

		$ii = (($i-$hidden)-$offset)+1;  // neded for the <template>

		$templdata[obj][$ii]["nb"] = ($ii + $offset);

		if (($i-$hidden)/2 == floor(($i-$hidden)/2)) { 
			$templdata[obj][$ii]["rowcolor"] = "#DDDDDD"; 
		} else { 
			$templdata[obj][$ii]["rowcolor"] = "#CCCCCC";
		}			

		if ($Enabled) {
			$templdata[obj][$ii]["colorUsername"] = "green";
		} else {
			$templdata[obj][$ii]["colorUsername"] = "red";
		}

		if ($ExpiryTime && $ExpiryTime != "-") { 
			if ($ExpiryTime < time()) {
				$templdata[obj][$ii]["colorUsername"] = "red";
			}
		}
		
		$templdata[obj][$ii]["username"] = $username;
		$templdata[obj][$ii]["PersonalInfo"] = $PersonalInfo;

		if (in_array($username, $readonly_accounts_list)) {
		     $templdata[obj][$ii]["PersonalInfo"] = "<I>" . $txt_system_account[$lang] . "</I>"; 
			$templdata[obj][$ii]["colorUsername"] = "black";
		}


		$templdata[obj][$ii]["alias0"] = $alias[0];
		$templdata[obj][$ii]["alias1"] = $alias[1];
		$templdata[obj][$ii]["alias2"] = $alias[2];


		if (sizeof($alias) > 0) { $templdata[obj][$ii]["more_alias"] = $yes . "  (" . trim(sizeof($alias)) . ")"; } 
		    else { $templdata[obj][$ii]["more_alias"] = $no; } 

		if ($arg_action != 2 && !(!$arg_action && $mtype == "alias") && !($quota_on && !$quota_data["autoresp_support"])) {
			$templdata[obj][$ii]["ifdef_autoresponder_status"] = "<TD>";
			if ($resp) { 
			    $templdata[obj][$ii]["ifdef_autoresponder_status"] .= $activated;
			} else { 
			    $templdata[obj][$ii]["ifdef_autoresponder_status"] .= $inactived;
			} 
			$templdata[obj][$ii]["ifdef_autoresponder_status"] .= "&nbsp;</TD>";
		} else {
			$templdata[obj][$ii]["ifdef_autoresponder_status"] = "";
		}

		// convert the username to an html escaped string (because of user "+") 

		$username = urlencode($username);

		if (in_array($username, $readonly_accounts_list)) {

		$templdata[obj][$ii]["actions"] = "&nbsp;&nbsp;-";
	        
		} else {

		$templdata[obj][$ii]["actions"] .= "&nbsp;&nbsp;<A HREF=\"$script?A=edit&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  .
				$txt_edit[$lang]  . "</a>&nbsp;"; // action

  		if ($arg_action != 2 && !(!$arg_action && $mtype == "alias") && !($quota_on && !$quota_data["autoresp_support"])) {
 			$templdata[obj][$ii]["actions"] .= "&nbsp;&nbsp;<A HREF=\"$script?A=resp&U=" . $username . "&" . SID . "\" onClick=\"oW2(this,'pop')\">"  . 
				$txt_responder[$lang] . "</a>&nbsp;"; // action
		}	

		if ((($arg_action == 2 && $config_use_settings_with_quota) || $arg_action == 1) && !($quota_on && !$quota_data["user_quota_support"])) {
			$templdata[obj][$ii]["actions"] .=  "&nbsp;&nbsp;<A HREF=\"$script?A=quota&U=" . $username . "&" . SID . "\" onClick=\"oW2(this,'pop')\">"  . 
				$txt_settings[$lang] . "</a>&nbsp;"; // action
		}

		    
		if ($arg_action) {


/*
			if ($quota_data["catchall_use_allowed"] == "1" || $quota_data["catchall_use_allowed"] == "") {

			    // check status : catchall or not ?
			
			    if ($username == $catchall_active) {
			        $templdata[obj][$ii]["actions"] .=  "&nbsp;&nbsp;<A HREF=\"$script?A=remove_catchall&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\"><font color=\"red\">"  . 
    				    $txt_remove_catchall[$lang]  . "</font></a>&nbsp;"; // action
			    } else {
				$templdata[obj][$ii]["actions"] .=  "&nbsp;&nbsp;<A HREF=\"$script?A=catchall&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  . 
    				    $txt_catchall[$lang]  . "</a>&nbsp;"; // action
			    }
			}
*/


			$templdata[obj][$ii]["actions"] .=  "&nbsp;&nbsp;<A HREF=\"$script?A=delete&U=" . $username . "&" . SID . "\" onClick=\"oW(this,'pop')\">"  . 
				$txt_delete[$lang]  . "</a>&nbsp;"; // action


		}
	    }

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
						$tmp_label = $tmp_action = "";	// hide the "new account" button
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
						$tmp_label = $tmp_action = "";	// hide the "new account" button
					} else {
						$percent = '<font color="green">' . $percent . '%</font>';
					}
					$quota_string = $txt_quota[$lang] . ": " . $txt_maximum[$lang] . " = " . $quota_data["max_alias"] . " " . $txt_smallaliases[$lang] . " &nbsp; &nbsp; ($percent " . $txt_used[$lang] . ")" ;
				
				}
			}

		} // if quota_on
	
		if ($arg_action != 2 && !($quota_on && !$quota_data["autoresp_support"])) {
			$templdata["nbcols"] .= "5";
		} else { 
			$templdata["nbcols"] .= "4"; 
		}
		
		$templdata["quota_string"] .= $quota_string;
		$templdata["global_action_and_url"] .= "<A HREF=\"$script?A=$tmp_action&" . SID . "\" onClick=\"oW(this,'pop')\">"  . $tmp_label  . "</a>&nbsp;</TH></TR>";
	}

	
	// new_account_forbidden's support

        if ($arg_action != 0 && $quota_data["new_account_forbidden"]) {
		$templdata["quota_string"] = "&nbsp;";
		$templdata["global_action_and_url"] = "&nbsp;";
		
	}
	

	if (($show_how_many_accounts && $all_hidden != 2) || !$arg_action) {   // !$arg_action  -> type=user login
		$template_name = "templates/display_$listtype.temp";
	} else {
		$template_name = "templates/display_" . $listtype . "_nolimit.temp";
	}

        print parseTemplate($templdata, $template_name);
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


	// get 3 random users of omail-admin
	
	$templdata[user_label1] = "Omnis Internet Services, Switzerland";  
	$templdata[user_url1] = "http://www.omnis.ch";
	$templdata[user_label2] = "webstyle gmbh, Switzerland";  
	$templdata[user_url2] = "http://www.webstyle.ch";
	$templdata[user_label3] = "insign gmbh, Switzerland";  
	$templdata[user_url3] = "http://www.insign.ch";

	$companies = array();
	$fp = fopen("USERS", "r");
	if ($fp) {
		while (!feof ($fp)) {
			$line = trim(fgets ($fp, 1024));
			if ($line) { 
				array_push($companies, $line);
			}
		}
	}
	fclose($fp);
	$nb_cp = count($companies) - 1;
	srand ((double) microtime() * 1000000);
	if ($nb_cp > 0) {
		for ($i = 1; $i<4; $i++) {
			$random = rand(0,$nb_cp);
			$label1 = "user_url" . $i;		
			$label2 = "user_label" . $i;		
			$expl_tmp = explode("\t", $companies[$random]);
			$templdata[$label1] = $expl_tmp[1];
			$templdata[$label2] = $expl_tmp[0];
			if ($expl_tmp[2]) { 
				$templdata[$label2] .= ", " . $expl_tmp[2];
			}			
		}
	}	
	


	$templdata["HTTP_HOST"]=$HTTP_HOST;
	$templdata["REQUEST_URI"]=$REQUEST_URI;
	$templdata["REMOTE_ADDR"]=$REMOTE_ADDR;
	$templdata["HTTP_ACCEPT_LANGUAGE"]=$HTTP_ACCEPT_LANGUAGE;
	$templdata["domain"]=$domain;

	print parseTemplate($templdata, "templates/about.temp");
}

function html_help() {

	global $A, $domain, $cvs_version, $version, $lang;
	include("strings.php");

	$templdata["domain"]=$domain;

	print parseTemplate($templdata, "templates/help.temp");
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
